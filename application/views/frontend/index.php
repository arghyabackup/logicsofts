<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'includes/header.php';
?>
<div class="container mt-2">
   <div class="row">
      <div class="col-md-12 mt-1 mb-4 text-center">
         <h2 class="text-white bg-dark p-3">User Listing</h2>
      </div>
      <div class="col-md-12 mt-1 mb-4 text-right">
        <a href="<?php echo base_url('/page/logout'); ?>" class="btn btn-success">Logout</a>
      </div>
      <div class="col-md-12">
        <?php require_once 'includes/message.php'; ?>
         <table class="table table-striped table-bordered" style="width:100%">
            <thead>
               <tr>
                  <th scope="col" width="5%">#</th>
                  <th scope="col" width="13%">Name</th>
                  <th scope="col" width="13%">User Name</th>
                  <th scope="col" width="20%">Email</th>
                  <th scope="col" width="13%">Register Date</th>
                  <th scope="col" width="30%" align="center">Action</th>
               </tr>
            </thead>
            <tbody class="list_data">
               <?php 
               if($returns){
               $i = 1;   
               foreach($returns as $return){ ?>
               <tr class="row_<?php echo $return['id'];?> post" data-id="<?php echo $return['id'];?>">
                  <td><?php echo $i;?></td>
                  <td><?php echo $return['name'];?></td>
                  <td><?php echo $return['username'];?></td>
                  <td><?php echo $return['email'];?></td>
                  <td><?php echo get_date_yr($return['createdAt']);?></td>
                  <td> 
                     <a href="javascript:void(0)" class="btn btn-info edit" data-id="<?php echo $return['id'];?>">Gallery</a>
                     <a href="javascript:void(0)" onclick="delete_data(<?=$return['id']; ?>,'id','users');" class="btn btn-danger delete" data-id="<?php echo $return['id'];?>">Delete</a>
               </tr>
               <?php $i++; } }else{ ?>
               <tr class="no_data">
                  <td colspan="3" rowspan="1" headers="">No Data Found</td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<!-- boostrap model -->
<div class="modal fade" id="user-model" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
          <h4 class="modal-title" id="userModel">Gallery</h4>
          <a type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </a>
       </div>
       <div class="modal-body">
          
       </div>
       <div class="modal-footer"></div>
    </div>
 </div>
</div>

<?php
require_once 'includes/footer.php';
?>
