@extends('admin/layout/master')
@section('page-title')
  Create Author
@endsection
@section('main-content')
<section class="content">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
      <form name="" id="" method="POST" action="{{ route('author.store') }}" enctype="multipart/form-data">
      @csrf
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
                  <div class="form-group @error('title') has-error @enderror">
                    <label for="title">Title <span class="text text-red">*</span></label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                      @error('title')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
 
                    <div class="form-group @error('slug') has-error @enderror">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" readonly>
                      @error('slug')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group @error('designation') has-error @enderror">
                      <label for="designation">Designation <span class="text text-red">*</span></label>
                      <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation">
                      @error('designation')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group @error('dob') has-error @enderror">
                      <label for="dob">Date of birth: <span class="text text-red">*</span></label> 
                      <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth">
                      @error('dob')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
 
                    <div class="form-group @error('email') has-error @enderror">
                      <label for="email">Email <span class="text text-red">*</span></label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                      @error('email')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group @error('country') has-error @enderror">
                      <label>Country <span class="text text-red">*</span></label>
                      <select name="country" id="country" class="form-control select2" style="width: 100%;">
                        <option value="none">-- Select Country --</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                        @endforeach
                      </select>
                      @error('country')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
 
                    <div class="form-group @error('phone') has-error @enderror">
                      <label for="phone">Phone <span class="text text-red">*</span></label>
                      <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
                        @error('phone')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
 
                    <div class="form-group @error('description') has-error @enderror">
                    <label>Description<span class="text text-red">*</span></label>
                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                      @error('description')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                  
                <div class="col-xs-6">
                   <div class="form-group @error('author_img') has-error @enderror">
                      <label for="author_img">Author Image <span class="text text-red">*</span></label>
                      <input type="file" name="author_img" class="form-control" id="author_img">
                          @error('author_img')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  <div class="form-group @error('facebook_id') has-error @enderror">
                      <label for="facebook_id">Facebook ID<span class="text text-red">*</span></label>
                      <input type="text" name="facebook_id" class="form-control" id="facebook_id" placeholder="Facebook ID">
                          @error('facebook_id')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
 
                    <div class="form-group @error('twitter_id') has-error @enderror">
                      <label for="twitter_id">Twitter ID<span class="text text-red">*</span></label>
                      <input type="text" name="twitter_id" class="form-control" id="twitter_id" placeholder="Twitter ID">
                          @error('twitter_id')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
 
                    <div class="form-group @error('youtube_id') has-error @enderror">
                      <label for="youtube_id">YouTube ID<span class="text text-red">*</span></label>
                      <input type="text" name="youtube_id" class="form-control" id="youtube_id" placeholder="YouTube ID">
                        @error('youtube_id')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group @error('pinterest_id') has-error @enderror">
                      <label for="pinterest_id">Pinterest ID<span class="text text-red">*</span></label>
                      <input type="text" name="pinterest_id" class="form-control" id="pinterest_id" placeholder="Pinterest ID">
                         @error('pinterest_id')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group @error('author_feature') has-error @enderror">
                    <label>Author Feature <span class="text text-red">*</span></label>
                    <select name="author_feature" id="author_feature" class="form-control select2" style="width: 100%;">
                       <option value="none">-- Author Feature --</option>
                      <option value="no">NO</option>
                      <option value="yes">Yes</option>
                    
                       
                    </select>
                       @error('author_feature')
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
