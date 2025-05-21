    <?php include 'config/guard.php'; ?>
    <?php include 'partials/header.php'; ?>
    <?php include 'partials/sidebar.php'; ?>

    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
    <div class="content">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h2>Change Password</h2>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <form name="formChangePassword" id="formChangePassword" method="POST" action="update_password.php">
        <div class="col-md-14">
            <div class="grid simple">
                <div class="grid-body no-border">
                    <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
              &nbsp;
            </div>
            <div class="grid-body no-border">
              <div class="row column-seperation">
                <div class="col-md-6">
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Old Password">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="password" name="retype_password" id="retype_password" class="form-control" placeholder="Again Password">
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Update Password </button>
          <a href="member.php" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
        </div>
        </div>
      </div>
                </div>
            </div>
        </div>
        </form>
        <script type="text/javascript">
          var frmvalidator = new Validator("formChangePassword");
          function password_matched() {
            var formChangePassword = document.forms["formChangePassword"];
            if(formChangePassword.new_password.value != formChangePassword.retype_password.value)
            {
              sfm_show_error_msg('The Password and Retype password does not match!',formChangePassword.new_password);
              return false;
            }
            else
            {
              return true;
            }
          }

          frmvalidator.setAddnlValidationFunction(password_matched);
          frmvalidator.addValidation("old_password", "req","Old Password shouldnt be empty!");
          frmvalidator.addValidation("new_password", "req","New Password shouldnt be empty!");
          frmvalidator.addValidation("retype_password", "req","Retype Password shouldnt be empty!");
        </script>
        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
</div>

     <!-- END PAGE CONTAINER -->
</div>
<!-- END CONTENT --> 
</body>
</html>

