  <?php include 'config/guard.php'; ?>
  <?php  
    require 'config/dbc.php';
    $id = $_GET['id'];
    $query = mysqli_query($connection, "SELECT * FROM message WHERE id=$id") or die(mysqli_error($connection));
    $row = mysqli_fetch_array($query);
  ?>

  <?php include 'partials/header.php'; ?>
  <?php include 'partials/sidebar.php'; ?>

    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
    <div class="content">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h2>Edit SMS</h2>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <form name="formEdit" id="formEdit" method="POST" action="update_sms.php">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
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
                        <input name="create_date" id="create_date" type="text"  class="form-control" placeholder="Create Date" value="<?php echo $row['create_date']; ?>">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <select name="category_id" id="category_id" class="form-control">
                          <option value="0">-- Select Category --</option>
                          <?php  
                            require 'config/dbc.php';
                            $getAllCategories = mysqli_query($connection, "SELECT * FROM category") or die(mysqli_error($connection));
                            while ($viewAllCategories = mysqli_fetch_array($getAllCategories)) {
                          ?>
                          <option value="<?php echo $viewAllCategories['id']; ?>" <?php echo ($viewAllCategories['id'] == $row['category_id']) ? 'selected' : null; ?>><?php echo $viewAllCategories['title']; ?></option>
                        <?php } ?>
                        </select>
                        
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="title" id="title" type="text"  class="form-control" placeholder="Title" value="<?php echo $row['title']; ?>">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="slug" id="slug" type="text"  class="form-control" placeholder="Slug" readonly  value="<?php echo $row['slug']; ?>">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="content" id="content" rows="8" class="form-control" placeholder="SMS"><?php echo $row['content']; ?></textarea>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
        
                  <h4>Meta Information</h4>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="meta_description" id="meta_description" rows="8" class="form-control" placeholder="Meta Descriptions"><?php echo $row['meta_description']; ?></textarea>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="text" name="mata_keyword" id="mata_keyword" class="form-control tagsinput" data-a-sign="$" data-role="tagsinput" value="<?php echo $row['meta_keyword']; ?>">
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Update</button>
          <a href="sms.php" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
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

     <!-- END PAGE CONTAINER -->
</div>
<!-- END CONTENT --> 
</body>
</html>

