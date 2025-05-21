@extends('admin/layout/master')
@section('page-title')
  Edit Category
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



<form method="POST" action="{{ route('category.update') }}">
  @csrf
  <input type="hidden" name="id" value="{{ $categories->id }}">
  
      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <!-- row start -->
          <div class="row"> 
                <div class="col-xs-6">
                  
                  <div class="form-group">
                    <label for="title">Title <span class="text text-red">*</span></label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $categories->title }}">
                    </div>

                    <div class="form-group">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" value="{{ $categories->slug }}">
                    </div>
                    <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ..." >{{ $categories->description }}</textarea>
                  </div>
                </div>
            </div>
              <!-- row end -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-danger"> <a href="{{route('category.all')}}" style="color:#FFF" >Cancel</a></button>
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
                title: {
                    required : true,
                },

                slug: {
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
@endsection