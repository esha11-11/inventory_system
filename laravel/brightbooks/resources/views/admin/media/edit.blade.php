@extends('admin/layout/master')
@section('page-title')
  Edit Media
@endsection
@section('main-content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="content">

      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
  <form method="POST" action="{{ route('media.update',$media->id) }}" enctype="multipart/form-data">
      @csrf
       @method('put')
    
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <!-- row start -->
          <div class="row"> 
                <div class="col-xs-6">
                  
                  <div class="form-group">
                    <label for="title">Title <span class="text text-red">*</span></label>
                      <input type="text" name="title" class="form-control" value="{{$media->title}}" id="title" placeholder="Title">
                    </div>
 
                    <div class="form-group">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" value="{{$media->slug}}"  class="form-control" id="slug" placeholder="Slug">
                    </div>
                    <div class="form-group">
                      <label>Media Type <span class="text text-red">*</span></label>
                      <select name="media_type" id="media_type" class="form-control" style="width: 100%;">
                        <option value="none" value="{{$media->id}}">{{$media->media_type}}</option>
                        <option value="slider" >Slider</option>
                        <option value="gallery" >Gallery</option>
                      </select>
                    </div>
                  </div>
                 
                <div class="col-xs-6">
                   <div class="form-group">
                      <label for="media_img">Media Image <span class="text text-red">*</span></label>
                      <input type="file" name="media_img" value="{{$media->media_img}}"  class="form-control" id="image">
                    </div>
                  <div class="form-group">
                                    <label for="team_img"></label>
                                    <img id="showImage" src="{{ asset('admin_imgs/media/'.$media->media_img) }}" alt="" title="" / height="100px" width="100px"> 
                                </div>




                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" value=""  id="description" class="form-control" rows="5" placeholder="Enter ...">{{$media->description}}</textarea>
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

    </section>




    <script type="text/javascript">
  $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },

                mobile_no: {
                    required : true,
                }, 

                email: {
                    required : true,
                }, 

                address: {
                    required : true,
                },

            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
                },

                 mobile_no: {
                    required : 'Please Enter Your Mobile no',
                },
                 email: {
                    required : 'Please Enter Your Email',
                },

                  address: {
                    required : 'Please Enter Your Address',
                },
                  
            },
            errorElement : 'span', 
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
  

<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection