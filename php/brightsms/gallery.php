<!-- begin header here -->
<?php include 'partials/header.php'; ?>
<!-- end header here -->

    <div id="body">
        <section id="content">
        <article>
            <h2>Gallery</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Commodi inventore necessitatibus distinctio dolore placeat sunt, eaque animi beatae minus odio eveniet ipsa suscipit nemo magni magnam excepturi minima assumenda odit repellendus aliquam, id? Doloremque consequatur rem eum sequi officiis aspernatur voluptatibus eius sunt vel possimus, </p>        
        </article>
       <article>
        <ul class="list_unstyled">
            <?php 
            require_once 'config/dbc.php';
            $getallgalleries = mysqli_query($connection, "SELECT * FROM media WHERE status='ACTIVE' AND media_type='gallery'")or die(mysqli_error($connection));
            while ($viewallgalleries= mysqli_fetch_array($getallgalleries)){
            ?>
              <li class="list-inline_item"><img src="uploads/<?php echo $viewallgalleries['media_img'] ?>"  width="100"height="100" class="img-thumbnail"  alt="<?php echo $viewallgalleries['title']; ?>"></li>
          <?php } ?>
        </ul>
        <ul class="list_unstyled">
            <?php 
            require_once 'config/dbc.php';
            $getallgalleries = mysqli_query($connection, "SELECT * FROM media WHERE status='ACTIVE' AND media_type='slideshow'")or die(mysqli_error($connection));
            while ($viewallgalleries= mysqli_fetch_array($getallgalleries)){
            ?>
              <li class="list-inline_item"><img src="uploads/<?php echo $viewallgalleries['media_img'] ?>"  width="100"height="100" class="img-thumbnail"  alt="<?php echo $viewallgalleries['title']; ?>"></li>
             
            <?php } ?>
        </ul>

       </article>
        </section>
        
        <!-- begin sidebar here -->
        <?php include 'partials/sidebar.php'; ?>
        <!-- end sidebar here -->
    </div>
    <!-- begin footer here -->
    <?php include 'partials/footer.php'; ?>
    <!-- end footer here -->
