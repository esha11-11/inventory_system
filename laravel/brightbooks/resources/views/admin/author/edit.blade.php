@extends('admin/layout/master')
@section('page-title')
  Edit Author
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
      <form name="formEdit"  id="myForm" method="POST" action="{{ route('author.update', $author->id) }}" enctype="multipart/form-data">
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
                
                      <input type="text" name="title" class="form-control" class="form-group" id="title" placeholder="Title" value="{{ $author->title }}">
                    </div>
 
                    <div class="form-group">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" value="{{ $author->slug }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="designation">Designation <span class="text text-red">*</span></label>
                      <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation" value="{{ $author->designation }}">
                    </div>
                    <div class="form-group">
                  <label for="dob">Date of birth: <span class="text text-red">*</span></label> 
                  <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth" value="{{ $author->dob }}">
                 </div>
 
                    <div class="form-group">
                      <label for="email">Email <span class="text text-red">*</span></label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $author->email }}">
                    </div>
                    <div class="form-group">
                      <label>Country <span class="text text-red">*</span></label>
                      <select name="country" id="country" class="form-control select2" style="width: 100%;">
                        <option value="none">-- Select Country --</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->name }}" {{ ($country->name == $author->country) ? 'selected' : null }}>{{ $country->name }}</option>
                        @endforeach
                      </select>
                    </div>
 
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{ $author->phone }}">
                    </div>
 
                    <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ...">{{ $author->description }}</textarea>
                  </div>
                </div>
                  
                <div class="col-xs-6">
                   <div class="form-group">
                      <label for="author_img">Author Image <span class="text text-red">*</span></label>
                      <input type="file" name="author_img" class="form-control" id="image">
                    </div>

                    <div class="form-group">
                                    <label for="author_img"></label>
                                    <img id="showImage" src="{{ asset('uploads/'.$author->author_img) }}" alt="" title="" / height="100px" width="100px"> 
                                </div>



                  <div class="form-group">
                      <label for="facebook_id">Facebook ID</label>
                      <input type="text" name="facebook_id" class="form-control" id="facebook_id" placeholder="Facebook ID" value="{{ $author->facebook_id }}">
                    </div>
 
                    <div class="form-group">
                      <label for="twitter_id">Twitter ID</label>
                      <input type="text" name="twitter_id" class="form-control" id="twitter_id" placeholder="Twitter ID" value="{{ $author->twitter_id }}">
                    </div>
 
                    <div class="form-group">
                      <label for="youtube_id">YouTube ID</label>
                      <input type="text" name="youtube_id" class="form-control" id="youtube_id" placeholder="YouTube ID" value="{{ $author->youtube_id }}">
                    </div>
                    <div class="form-group">
                      <label for="pinterest_id">Pinterest ID</label>
                      <input type="text" name="pinterest_id" class="form-control" id="pinterest_id" placeholder="Pinterest ID" value="{{ $author->pinterest_id }}">
                    </div>
                    <div class="form-group">
                    <label>Author Feature</label>
                    <select name="author_feature" id="author_feature" class="form-control select2" style="width: 100%;">
                      <option value="no" {{ ($author->author_feature == 'no') ? 'selected' : null }}>NO</option>
                      <option value="yes" {{ ($author->author_feature == 'yes') ? 'selected' : null }}>Yes</option>
                    </select>
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
                title: {
                    required : true,
                },

                slug: {
                    required : true,
                }, 

                designation: {
                    required : true,
                }, 

                dob: {
                    required : true,
                },
                 country: {
                    required : true,
                },
                 email: {
                    required : true,
                },
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
            
            },
            messages :{
                title: {
                    required : 'Please Enter Your Title',
                },

                 slug: {
                    required : 'Please Enter Your Slug ',
                },
                 designation: {
                    required : 'Please Enter Your Designation',
                },

                  dob: {
                    required : 'Please Enter Your Date Of Birth',
                },

                     country: {
                    required : 'Please Enter Your Country',
                },

                 email: {
                    required : 'Please Enter Your Email',
                },
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
