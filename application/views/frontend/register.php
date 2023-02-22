<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'includes/header.php';
?>
<div class="container mt-2">
   <div class="row">
      <div class="col-md-12 mt-1 mb-4 text-center">
         <h2 class="text-white bg-dark p-3">Registration</h2>
      </div>
      <div class="col-md-6 offset-md-3">
        <?php require_once 'includes/message.php';?>
         <form action="<?php echo base_url('/page/register_submit'); ?>" id="postForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="">
             </div>
            <div class="form-group">
                 <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="">
           </div>
           <div class="form-group">
                 <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="">
           </div>
           <div class="form-group">
                 <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="">
           </div>
           <div class="form-group">
              <input class="form-control" type="password" name="cpassword" id="cpassword" placeholder="Enter Confirm Password" />
            </div>
            <div class="form-group">
              <label>Image Gallery</label>
              <input type="file" name="file[]" class="form-control" multiple>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" id="btn-save">Register</button>
            </div>
          </form>
          <p class="mt-4 text-center">Already Have An Account? <a href="<?php echo base_url('/login'); ?>">Login</a></p>
      </div>
   </div>
</div>
<?php
require_once 'includes/footer.php';
?>
<script>
$(document).ready(function(){
  $("#postForm").validate({
    rules: {
      name: {
        required: true,
      },
      username: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        minlength: 6,
        required: true,
      },
      cpassword: {
        required: true,
        minlength: 6,
        equalTo: '#password'
      },
    },
    messages: {
    },
    submitHandler: function(form) {
      form.submit();
    }
  });

});
</script>