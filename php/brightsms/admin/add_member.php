<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
    require 'config/dbc.php';

  $create_date = $_POST['create_date'];
  $fullname = $_POST['fullname'];
  $city = $_POST['city'];
  $email = $_POST['email'];
  $status = 'DEACTIVE';
  $member_img = $_POST['member_img'];
  $password = $_POST['password'];

  if (isset($_FILES['member_img'])) 
  {
    $name = uniqid(time());
    $extension = pathinfo($_FILES['member_img']['name'], PATHINFO_EXTENSION);
    $fileName = $name . "." . $extension;
    $hasFileUploaded = move_uploaded_file($_FILES['member_img']['tmp_name'], '../uploads/' . $fileName);
  }

  if ($hasFileUploaded) {
    mysqli_query($connection, "INSERT INTO member(create_date, fullname, city, email,  status, member_img,password)
        VALUES('$create_date', '$fullname', '$city', '$email',  '$status','$fileName', '$password')") or die(mysqli_error($connection));

    header("Location:member.php");
  }}
    ?>



    <?php include 'partials/header.php'; ?>
    <?php include 'partials/sidebar.php'; ?>

    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
    <div class="content">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h2>Add Member</h2>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <form  name="formCreate" id="formCreate" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
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
                  <h4>Basic Information</h4>            
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="create_date" id="create_date" type="text"  class="form-control" placeholder="Create Date">
                      </div>
                    </div>
                    
                    

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="fullname" id="fullname" type="text"  class="form-control" placeholder="null">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="city" id="city" type="text"  class="form-control" placeholder="city">
                      </div>
                    </div>

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="email" id="email" type="emailpassword"  class="form-control" placeholder="email">
                      </div>
                    </div>
                    
                </div>
                <div class="col-md-6">
        
                  <h4>Media Img</h4>
                  <div class="row form-row">
                      <div class="col-md-12">
                       <input type="file" name="member_img" id="member_img"> 
                      </div>
                  </div>
                    
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="password" name="password" id="password" class="form-control " type="password">
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="media.php" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
        </div>
        </div>
      </div>
                </div>
            </div>
        </div>
        </form>
             
        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
</div>

        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
</div>
     <!-- END PAGE CONTAINER -->
</div>
<!-- END CONTENT --> 
</body>
</html>

