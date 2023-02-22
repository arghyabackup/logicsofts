<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'includes/header.php';
?>
<div class="container mt-2">
   <div class="row">
      <div class="col-md-12 mt-1 mb-4 text-center">
         <h2 class="text-white bg-dark p-3">Login</h2>
      </div>
      <div class="col-md-6 offset-md-3">
        <?php require_once 'includes/message.php'; ?>
         <form action="<?php echo base_url('/page/login_submit'); ?>" id="postForm" class="form-horizontal" method="POST">
           <div class="form-group">
                 <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="">
           </div>
           <div class="form-group">
                 <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="">
           </div>
           <div class="text-center">
              <button type="submit" class="btn btn-primary" id="btn-save">Login</button>
           </div>
          </form>
          <p class="mt-4 text-center">Don't Have An Account? <a href="<?php echo base_url('/signup'); ?>">Signup</a></p>
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
      username: {
        required: true,
      },
      password: {
        required: true,
      }
    },
    messages: {
    },
    submitHandler: function(form) {
      form.submit();
    }
  });

});
</script>