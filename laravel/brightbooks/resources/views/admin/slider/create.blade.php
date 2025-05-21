@extends('admin/layout/master')
@section('page-title')
  Create Slider
@endsection
@section('main-content')
<section class="content">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
      <form name="" id="" method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
      @csrf
       @method('put')
      <div class="box box-primary">
        <!-- /.box-header -->
        {{-- @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>

        @endif --}}
    


        <div class="box-body">
          <!-- row start -->
          <div class="row">  
                <div class="col-xs-6">
                   <div class="form-group @error('slider_img') has-error @enderror">
                      <label for="slider_img">Slider Image <span class="text text-red">*</span></label>
                      <input type="file" name="slider_img" class="form-control" id="slider_img">
                          @error('slider_img')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div> 
                </div>
            </div>
              <!-- row end -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
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
              
                
                 phone: {
                    required : true,
                },
                   description: {
                    required : true,
                },
                   author_feature: {
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
                    pinterest_id: {
                    required : true,
                },
                    author_img: {
                    required : true,
                },
            },
            messages :{
       
                 phone: {
                    required : 'Please Enter Your Phone',
                },

                  description: {
                    required : 'Please Enter Your Description',
                },
                     author_feature: {
                    required : 'Please Enter Your Author Feature',
                },

                 facebook_id: {
                    required : 'Please Enter Your Facebook',
                },
                 twitter_id: {
                    required : 'Please Enter Your Twitter',
                },

                  youtube_id: {
                    required : 'Please Enter Your Youtube',
                },
                 pinterest_id: {
                    required : 'Please Enter Your Pinterest',
                },
                 author_img: {
                    required : 'Please Enter Your Author Image',
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
@endsection
