@extends('admin.layout.master')
@section('page-title')
  {{ Auth::user()->name }}
@endsection
@section('main-content')

<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/uploads/{{ Auth::user()->user_img }}" width="128" height="128" alt="{{ Auth::user()->name }}">
              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
              <p class="text-muted text-center">{{ Auth::user()->designation }}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">Edit your Profile</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="{{ $errors->has('update.password') || $errors->has('current_password') || $errors->has('new_password') || $errors->has('new_confirm_password') ? '' : 'active' }}"><a href="#activity" data-toggle="tab">Bio</a></li>
              <li class="{{ $errors->has('update.password') || $errors->has('current_password') || $errors->has('new_password') || $errors->has('new_confirm_password') ? 'active' : '' }}"><a href="#settings" data-toggle="tab">Change Password</a></li>
            </ul>
            <div class="tab-content">
              <div class="{{ $errors->has('update.password') || $errors->has('current_password') || $errors->has('new_password') || $errors->has('new_confirm_password') ? '' : 'active' }} tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <p>{{ Auth::user()->bio }}</p>
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->

              <div class="{{ $errors->has('update.password') || $errors->has('current_password') || $errors->has('new_password') || $errors->has('new_confirm_password') ? 'active' : '' }} tab-pane" id="settings">

              

                <form method="POST" action="{{ route('update.password') }}" class="form-horizontal">
 
                @csrf 
             <div class="form-group @error('current_password') has-error @enderror">
                    <label for="inputName" class="col-sm-2 control-label">Old Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Old Password">
                      @error('current_password')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group @error('new_password') has-error @enderror">
                    <label for="inputName" class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">
                      @error('new_password')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group @error('new_confirm_password') has-error @enderror">
                    <label for="inputName" class="col-sm-2 control-label">Retype Please</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="new_confirm_password" id="new_confirm_password" placeholder="Retype Please">
                      @error('new_confirm_password')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger reset_password">Change Password</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ Auth::user()->name }}</h4>
            </div>
            <div class="modal-body">
                <form name="profileForm" id="profileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="form-horizontal">
                @csrf


                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="designation" class="col-sm-2 control-label">Designation</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="designation" id="designation" placeholder="Designation" value="{{ Auth::user()->designation }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bio" class="col-sm-2 control-label">Bio</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="bio" id="bio" rows="6" placeholder="Enter ...">{{ Auth::user()->bio }}</textarea>
                        </div>
                    </div>
               

                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image </label>
                                            <div class="col-sm-10">
                                                 <input name="user_img" class="form-control" type="file"  id="image">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
		                                     <img class="rounded avatar-lg"  id="showImage" src="{{ (!empty(Auth::user()->user_img)) ? url('uploads/'.Auth::user()->user_img) :  url('uploads/no-img.jpg') }}" alt="Card image cap">
                                        </div>
                                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@section('scripts')
 

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





<!--  <script>
    $(document).ready(function() {
      $('body').on('click', '.reset_password', function(event) {
        event.preventDefault();
        
        var self = $(this);
        var data = self.closest('form');

        $.ajax({
          url: data.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data.serialize(),
        })
        .done(function(data) {
          if (data.status) {
            $('.msg-pass').html('<div class="alert alert-success">'+data.msg+'</div>');
            self.closest('form')[0].reset();
          }
          setTimeout(function() { 
            $('.msg-pass').html('');
          }, 3000);


        })
        .fail(function(data) {
          $('.msg-pass').html('<div class="alert alert-danger">'+data.responseJSON.message+'</div>');
          $.each(data.responseJSON.errors, function(key, val) {
            var input = $('input[name='+key+']');
            input.closest('.form-group').addClass('has-error');
            input.next().html(val);
          });
        })
        .always(function() {
          console.log("complete");
        });
      });  
    });
  </script> -->

 
@endsection