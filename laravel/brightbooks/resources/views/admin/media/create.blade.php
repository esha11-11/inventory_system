@extends('admin/layout/master')
@section('page-title')
  Create Media
@endsection
@section('main-content')
<section class="content">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style> 
  span1,
  .is-invalid{
      color: #FF0000;
      border-color: #FF0000;
  }
</style>
      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
     <form method="POST" action="{{ route('media.store') }}" enctype="multipart/form-data" id="myForm">
      @csrf
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <!-- row start -->
          <div class="row"> 
                <div class="col-xs-6">
                 
                  
                  <div class="form-group">
                    <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title" unselected="">
                    </div>
 
                    <div class="form-group">
                    <label for="slug">Slug</label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug">
                    </div>
                    <div class="form-group">
                      <label>Media Type <span class="text text-red">*</span></label>
                      <select name="media_type" id="media_type" class="form-control" style="width: 100%;">
                     
                        <option value="0">Select Media Type</option>
                        <option value="slider">Slider</option>
                        <option value="gallery">Gallery</option>
                  
                      </select>
                    </div>
                  </div>
                 
                <div class="col-xs-6">
                   <div class="form-group">
                      <label for="media_img">Media Image <span class="text text-red">*</span></label>
                      <input type="file" name="media_img" class="form-control" id="media_img">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                     </div>
                  </div>
            </div>

              <!-- row end -->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
          </div>
      </div>
      <!-- /.box -->
</form>
      <!-- form end -->
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                title: {
                    required : true,
                },

                slug: {
                    required : true,
                }, 

                media_type: {
                    required :,
                }, 

                media_img: {
                    required : true,
                },
                description: {
                    required : true,
                },

            },
            messages :{
                title: {
                    required : 'Please Enter Your Name',
                },

                 slug: {
                    required : 'Please Enter Your Mobile no',
                },
                 Select Media Type: {
                    elect Media Type : 'Please Enter Your media_type',
                },

                  media_img: {
                    required : 'Please Enter Your Address',
                },
                  description: {
                    required : 'Please Enter Your Address',
                },
            },
            errorElement : 'span1', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
    </section>
@endsection