@extends('admin/layout/master')
@section('page-title')
  Edit Footer
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



<form method="POST" action="{{ route('footer.update') }}" id="myForm">
  @csrf
  <input type="hidden" name="id" value="{{ $footer->id }}">
  
      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <!-- row start -->
          <div class="row"> 
                <div class="col-xs-6">
                  
                  <div class="form-group">
                    <label for="address">Address <span class="text text-red">*</span></label>
                      <input type="text" name="address" class="form-control" id="address" placeholder="Title" value="{{ $footer->address }}">
                    </div>

                    <div class="form-group">
                    <label for="phone_no">phone_no <span class="text text-red">*</span></label>
                      <input type="text" name="phone_no" class="form-control" id="phone_no" placeholder="phone_no" value="{{ $footer->phone_no }}">
                    </div>
                    <div class="form-group">
                    <label for="email">email <span class="text text-red">*</span></label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="email" value="{{ $footer->email }}">
                    </div>
                      <div class="form-group">
                    <label for="facebook_id">Facebook <span class="text text-red">*</span></label>
                      <input type="text" name="facebook_id" class="form-control" id="facebook_id" placeholder="facebook_id" value="{{ $footer->facebook_id }}">
                    </div>
                  </div>
                      <div class="col-xs-6">
               
                        <div class="form-group">
                    <label for="twitter_id">Twitter <span class="text text-red">*</span></label>
                      <input type="text" name="twitter_id" class="form-control" id="twitter_id" placeholder="twitter_id" value="{{ $footer->twitter_id }}">
                    </div>
                        <div class="form-group">
                    <label for="youtube_id">Youtube <span class="text text-red">*</span></label>
                      <input type="text" name="youtube_id" class="form-control" id="youtube_id" placeholder="youtube_id" value="{{ $footer->youtube_id }}">
                    </div>
                        <div class="form-group">
                    <label for="pintrust_id">Pintrust<span class="text text-red">*</span></label>
                      <input type="text" name="pintrust_id" class="form-control" id="pintrust_id" placeholder="pintrust_id" value="{{ $footer->pintrust_id }}">
                    </div>

                </div>
            </div>
              <!-- row end -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-danger"> <a href="{{route('footer.all')}}" style="color:#FFF" >Cancel</a></button>
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
                address: {
                    required : true,
                },

                email: {
                    required : true,
                }, 

      
                phone_no: {
                    required : true,
                },

                facebook_id: {
                    required : true,
                },

                twitter_id: {
                    required : true,
                },
                  youtube_id: {
                    required : true,
                },
                  pintrust_id: {
                    required : true,
                },

            },
            messages :{
               address: {
                    required : 'Please Enter Your Address',
                },
               email: {
                    required : 'Please Enter Your Email',
                },
                phone_no: {
                    required : 'Please Enter Your Phone No',
                },
                facebook_id: {
                    required : 'Please Enter Your Facebook id',
                },
                twitter_id: {
                    required : 'Please Enter Your Twitter id',
                },

                 youtube_id: {
                    required : 'Please Enter Your Youtube id',
                },
            
                  pintrust_id: {
                    required : 'Please Enter Your Pintrust id',
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