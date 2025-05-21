@extends('admin/layout/master')
@section('page-title')
  Update Slider
@endsection
@section('main-content')
<section class="content">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
      <form name="" id="" method="POST" action="{{ route('slider.update') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $slider->id }}">
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
            
                                 <div class="form-group">
                                     <label for="slider_img">Slider Image <span class="text text-red">*</span></label>
                                    <input type="file" id="image" name="slider_img" value="{{$slider->slider_img}}" class="form-control" id="slider_img">
                                   
                                </div>
                                <div class="form-group">
                                    <label for="slider_img"></label>
                                    <img id="showImage" src="{{ asset( $slider->slider_img) }}" height="100px" width="i00px" alt=""> 
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
