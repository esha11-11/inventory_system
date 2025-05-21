@extends('admin/layout/master')
@section('page-title')
  Create Category
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
                  <form method="post" action="{{route('category.store')}}" id="myForm">
                    @csrf
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <!-- row start -->
          <div class="row"> 
                <div class="col-xs-6">
                  	@csrf
                  <div class="form-group">
                    <label for="title">Title <span class="text text-red">*</span></label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                    </div>

                    <div class="form-group">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug">
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
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger"> <a href="{{route('category.all')}}" style="color:#FFF" >Cancel</a></button>
            
          </div>
      </div>
        </form>
      <!-- /.box -->

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