
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require 'config/dbc.php';

  $date = $_POST['create_date'];
  $fullname = $_POST['fullname'];
  $city = $_POST['city'];
  $email = $_POST['email'];
  $member_img = $_POST['member_img'];
  $id = $_POST['id'];

    $img_url = $_POST['img_url'];
  $fileName = $img_url;

  if ($_FILES['member_img']['error'] == '0') 
  {
    $name = uniqid(time());
    $extension = pathinfo($_FILES['member_img']['name'], PATHINFO_EXTENSION);
    $fileName = $name . "." . $extension;
    $hasFileUploaded = move_uploaded_file($_FILES['member_img']['tmp_name'], '../uploads/' . $fileName);
  }

  $affected = mysqli_query($connection, "UPDATE member SET create_date='$date', fullname='$fullname', city='$city', email='$email',  member_img='$fileName' WHERE id=$id") or die(mysqli_error($connection));

  if ($affected) {
    if ($hasFileUploaded) 
      unlink('../uploads/' . $img_url);
    
    header("Location:member.php");
}}
?>




<?php
  require 'config/dbc.php';
  $id = $_GET['id'];
  $query = mysqli_query($connection, "SELECT * FROM member WHERE id=$id") or die(mysqli_error());
  $row = mysqli_fetch_array($query);

?>




    <?php include 'config/guard.php'; ?>
    <?php include 'partials/header.php'; ?>
    <?php include 'partials/sidebar.php'; ?>

    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
    <div class="content">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h2>Edit Member</h2>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <div class="col-md-14">
            <div class="grid simple">
                <div class="grid-body no-border">

    <form id="formEdit" name="formEdit" method="POST"  action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                  <input type="hidden" name="id"  value="<?php echo $id; ?>">
                  <input type="hidden" name="img_url" id="img_url" value="<?php echo $row['member_img']; ?>">
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
                        <input name="create_date" id="create_date" type="text"  class="form-control" placeholder="Create Date" value="<?php echo $row['create_date']?>">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="fullname" id="fullname" type="text"  class="form-control" placeholder="Fullname" value="<?php echo $row['fullname']?>">
                      </div>
                    </div>
                    </div>
                <div class="col-md-6">
        
                  <h4>Meta Information</h4>
                      <div class="row form-row">
                      <div class="col-md-12">
                       <input type="file" name="member_img" id="member_img"> 
                      </div>
                  </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="city" name="city" id="city" class="form-control "   value="<?php echo $row['city']?>">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="email" name="email" id="email" class="form-control "   value="<?php echo $row['email']?>">
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Update </button>
          <a href="member.php" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
        </div>
        </div>
      </div>
  </form>
                </div>
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

