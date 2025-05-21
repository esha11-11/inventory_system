@extends('admin/layout/master')
@section('page-title')
  Create Book
@endsection
@section('main-content')  

    <!-- Main content -->
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
      <form name="formCreate" id="myForm" method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <!-- row start -->
          <div class="row"> 
                <div class="col-xs-6">
                  
                 <div class="form-group">
                    <label for="title">Title <span class="text text-red">*</span></label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
               
                    </div>
 
                    <div class="form-group">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug">
                  
                    </div>
             

                         <div class="form-group">
                      <label>Category <span class="text text-red">*</span></label>
                      <select class="form-control" name="category_id" id="category_id" style="width: 100%;">
                        <option value="none">-- Select Category --</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Author <span class="text text-red">*</span></label>
                      <select class="form-control" name="author_id" id="author_id" style="width: 100%;">
                        <option value="none">-- Select Author --</option>
                        @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->title }}</option>
                        @endforeach
                      </select>
               
                    </div>

                    <div class="form-group">
                      <label for="availability">Availability <span class="text text-red">*</span></label>
                      <input type="text" class="form-control" name="availability" id="availability" placeholder="Availability">
                  
                    </div>
                    <div class="form-group">
                  <label for="price">Price: <span class="text text-red">*</span></label> 
                  <input type="text" class="form-control" name="price" id="price" placeholder="Price">
             
                 </div>
                  <div class="form-group">
                    <label for="publisher">Publisher</label>
                    <input type="text" class="form-control" name="publisher" id="publisher" placeholder="Publisher">
              
                  </div>

                  
                     <div class="form-group @error('country') has-erroe @enderror">
                      <label>Country of Publisher <span class="text text-red">*</span></label>
                      <select name="country_of_publisher" id="country_of_publisher" class="form-control select2" style="width: 100%;">
                        <option value="none">-- Select Country --</option>
                          @foreach($countries as $country)
                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                        @endforeach
                     
                         
                     </select>
                    </div>


                       


        
                  <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN">
                  </div>

                    <div class="form-group">
                      <label for="isbn_10">ISBN-10</label>
                      <input type="text" class="form-control" name="isbn_10" id="isbn_10" placeholder="ISBN-10">
                    </div>
                </div>
                 
                <div class="col-xs-6">
                    <div class="form-group">
                      <label for="book_img">Book Image</label>
                      <input type="file" class="form-control" name="book_img" id="book_img" >
                      <small class="label label-warning">Cover Photo will be uploaded</small>
                    </div>
                    <div class="form-group">
                      <label for="book_upload">Book Upload</label>
                      <input type="file" class="form-control" name="book_upload" id="book_upload" >
                      <small class="label label-warning">Book (PDF) will be uploaded </small>
                    </div>
                  <div class="form-group">
                      <label for="audience">Audience</label>
                      <input type="text" class="form-control" name="audience" id="audience" placeholder="Audience">
                    </div>

                    <div class="form-group">
                      <label for="format">Format</label>
                      <input type="text" class="form-control" name="format" id="format" placeholder="Format">
                    </div>

                    <div class="form-group">
                      <label for="language">Language</label>
                      <input type="text" class="form-control" name="language" id="language" placeholder="Language">
                    </div>
                    <div class="form-group">
                      <label for="total_pages">Total Pages</label>
                      <input type="text" class="form-control" name="total_pages" id="total_pages" placeholder="Total Pages">
                    </div>
                    <div class="form-group">
                      <label for="edition_number">Edition Number</label>
                      <input type="text" class="form-control" name="edition_number" id="edition_number" placeholder="Edition Number">
                    </div>

                    <div class="form-group">
                      <label>Recomended</label>
                      <select class="form-control" name="recomended" id="recomended" style="width: 100%;">
                        <option value="none">-- Select Recomended --</option>
                        <option value="yes">Recomended</option>
                        <option value="no">Not Recomended</option>
                      </select>
                   </div>

                    <div class="form-group">
                      <label for="description">Description <span class="text text-red">*</span></label>
                      <textarea class="form-control" name="description" rows="5" id="description" placeholder="Description"></textarea>
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
    </form>
      <!-- /.box -->
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

                category_id: {
                    required: true,
                }, 

                author_id: {
                    required : true,
                },
                availability: {
                    required : true,
                },
                  publisher: {
                    required : true,
                },
                country_of_publisher: {
                    required : true,
                },
                  isbn: {
                    required : true,
                },
                isbn_10: {
                    required : true,
                },
                   book_img: {
                    required : true,
                },
               book_upload: {
                    required : true,
                },
                   audience: {
                    required : true,
                },
                format: {
                    required : true,
                },
                edition_number: {
                    required : true,
                },
                   total_pages: {
                    required : true,
                },
                recomended: {
                    required : true,
                },
                  description: {
                    required : true,
                },
              
            },
            messages :{
                title: {
                    required : 'Please Enter Your Title',
                },

                 slug: {
                    required : 'Please Enter Your Slug',
                },
                  category_id: {
                  required : 'Please Enter Your Category Id',
                },

                author_id: {
                   required : 'Please Enter Your Author Id',
                },
                availability: {
                   required : 'Please Enter Your Availability',
                },
                  publisher: {
                     required : 'Please Enter Your Publisher',
                },
                country_of_publisher: {
                     required : 'Please Enter Your Country Of Publisher',
                },
                  isbn: {
                    required : 'Please Enter Your Isbn',
                },
                isbn_10: {
                    required : 'Please Enter Your Isbn 10',
                },
                   book_img: {
                     required : 'Please Enter Your Book Img',
                },
               book_upload: {
                     required : 'Please Enter Your Book Upload',
                },
                   audience: {
                    required : 'Please Enter Your Audience',
                },
                format: {
                     required : 'Please Enter Your Format',
                },
                edition_number: {
                    required : 'Please Enter Your Edition Number',
                },
                   total_pages: {
                    required : 'Please Enter Your Total Pages',
                },
                recomended: {
                     required : 'Please Enter Your Recomended',
                },
                  description: {
                     required : 'Please Enter Your Description',
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