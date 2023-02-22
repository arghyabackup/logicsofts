<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('frontend_model');
        $this->load->database();
    }
    public function index() {
      isLogin();

      $user_id = $this->session->userdata('user_id');

      $returns = $this->frontend_model->listing_table_data_not_allow($user_id, 'users');

      $data = array(
          'returns'  => $returns
      );
      $this->load->view('frontend/index', $data);
    }
    public function login() {
        $this->load->view('frontend/login');
    }
    private function hashPassword($pass, $salt=FALSE) {
        //  The following will put the $salt at the begining, middle, and end of the password.
        //  A little extra salt never hurt.
        if (!empty($salt)) $pass = $salt . implode($salt, str_split($pass, floor(strlen($pass)/2))) . $salt;
        return md5( $pass );
    }
    public function login_submit() {
        $response_arr = array();
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response_arr['msg'] = validation_errors();
            $response_arr['flag'] = 2;
            $msg = message($response_arr);
            $this->session->set_flashdata( 'message', $msg );
            redirect( '/login' );
            
        }else{
            $data = array(
                'username'  => $this->input->post('username'),
                'password'  => $this->hashPassword($this->input->post('password'), 'arghya')
            );
            $return  = $this->frontend_model->get_table_data_by_values($data,'users');
    
            if($return) {
                if($return['status'] == '1'){
                  $this->session->set_userdata('user_id',$return['id']);
                  $this->session->set_userdata('logged_in','1');
                  $this->session->set_userdata('user_name',$return['name']);
                  $this->session->set_userdata('user_email',$return['email']);

                  redirect( '/' );
                    
                }else{
                    $response_arr['msg'] = "Your Account does not active";
                    $response_arr['flag'] = 2;
                    $msg = message($response_arr);
                    $this->session->set_flashdata( 'message', $msg );
                    redirect( '/login' );
                    
                }
                
            }else{
                $response_arr['msg'] = "Access denied. Incorrect login or password!";
                $response_arr['flag'] = 2;
                $msg = message($response_arr);
                $this->session->set_flashdata( 'message', $msg );
                redirect( '/login' );
                
            }
        }
    }
    public function register() {
      $this->load->view('frontend/register');
    }
    public function register_submit(){
        $response_arr = array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');
        
        if ($this->form_validation->run() == FALSE) {
            $response_arr['msg'] = validation_errors();
            $response_arr['flag'] = 2;
            $msg = message($response_arr);
            $this->session->set_flashdata( 'message', $msg );

        }else{
            //print_r($_POST);exit;
            
            $data = array(
                'name'   => $this->input->post( 'name' ),
                'username'   => $this->input->post( 'username' ),
                'email'   => $this->input->post( 'email' ),
                'password'   => $this->hashPassword($this->input->post('password'), 'arghya')
           );
            
            $result =$this->frontend_model->add_table_data($data, 'users');

            if($result) {

              if($_FILES['file']){
                $total = count($_FILES['file']['name']);
                
                $files = $_FILES;
                for($i=0; $i< $total; $i++){           
                  $_FILES['file']['name']= $files['file']['name'][$i];
                  $_FILES['file']['type']= $files['file']['type'][$i];
                  $_FILES['file']['tmp_name']= $files['file']['tmp_name'][$i];
                  $_FILES['file']['error']= $files['file']['error'][$i];
                  $_FILES['file']['size']= $files['file']['size'][$i];    

                  $allowed_types = 'jpg|png|jpeg';
                  $file_path=image_upload($_FILES,'file','uploads/users', $allowed_types);
                  if($file_path){
                    $data2['file_name']=$file_path;
                    $data2['user_id']=$result;
                    $this->frontend_model->add_table_data($data2, 'user_gallery');
                  }
                }
              }

                $response_arr['msg'] = 'Registration has been successfully complete.please login account.';
                $response_arr['flag'] = 1;

                $msg = message($response_arr);
                $this->session->set_flashdata( 'message', $msg );

            }else{
                $response_arr['msg'] = 'Registration has been not complete successfully.';
                $response_arr['flag'] = 2;

                $msg = message($response_arr);
                $this->session->set_flashdata( 'message', $msg );
            }
        }
        redirect( 'signup' ); 
    }
    public function logout() {
        isLogin();
        $this->session->sess_destroy();
        redirect('login');
    }
    public function delete_data(){
        isLogin();

        $id=$_POST['id'];
        $check_field=$_POST['check_field'];
        $table_name=$_POST['table_name'];

        $result = $this->frontend_model->deleted_table_data($check_field,$id,$table_name);
        if($result){
            $msg = message( 
                    array(
                        'msg' => "Deleted Successfully ...", 
                        'flag' => 1
                    )
                );
            $this->session->set_flashdata( 'message', $msg );

            $response['status']  = 'success';
            $response['message'] = 'Deleted Successfully ...';
        }else{
            $msg = message( 
                    array(
                        'msg' => "Unable to delete ...", 
                        'flag' => 2
                    )
                );
            $this->session->set_flashdata( 'message', $msg );

            $response['status']  = 'error';
            $response['message'] = 'Unable to delete ...';
        }
        echo json_encode($response);
    }
    public function gallery_view(){
        isLogin();
        $id = $_POST['id']; 

        $data2 = array('user_id' => $id);
        $returns = $this->frontend_model->list_table_data_by_values($data2, 'user_gallery');

        $data = array(
            'returns'  => $returns
        );
        
        $content = $this->load->view('frontend/gallery_parts', $data, true); 

        echo $content;
        exit(0);
    }  
}
