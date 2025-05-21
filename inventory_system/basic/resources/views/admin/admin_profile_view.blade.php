@extends('admin.admin_master')
@section('admin')

<div class="page-content">
 <div class="container-fluid">
   <div class="row">      
    <div class="col-md-6 col-xl-6">

		<div class="card">
			<center> <br><br>
		        <img class="rounded-circle avatar-xl" src="{{ (!empty($admindata->profile_image)) ? url('upload/admin_images/'.$admindata->profile_image) :  url('upload/no_image.jpg') }}" alt="Card image cap">
			</center>
			    <div class="card-body">
			        <h4 class="card-title">Name : {{ $admindata->name }}</h4>
			        <hr>
                    <h4 class="card-title">Email : {{ $admindata->email }}</h4>
			        <hr>
                    <h4 class="card-title">UserName : {{ $admindata->username }}</h4>
			        <hr>
                    <a href="{{ route('edit.profile') }}"  class="btn btn-info btn-rounded waves-effect waves-light" >Edit Profile</a>
			    </div>
			    
			    
		    </div>
         </div><!-- end col -->                                    
      </div>        
   </div><!-- end col -->
</div>



@endsection 