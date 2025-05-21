@extends('admin/layout/master')
@section('page-title')
  Create Team
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
                <form method="POST"  action="{{route('team.store')}}" enctype="multipart/form-data" id="myForm">
                    @csrf
                <!-- form start -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- row start -->
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="fullname">Fullname <span class="text text-red">*</span></label>
                                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Fullname">
                                </div>
                                <div class="form-group">
                                    <label for="designation">Designation <span class="text text-red">*</span></label>
                                    <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation">
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Telephone</label>
                                    <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Telephone">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email <span class="text text-red">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="team_img">Team Image <span class="text text-red">*</span></label>
                                    <input type="file" name="team_img" class="form-control" id="team_img">
                                </div>
                                <div class="form-group">
                                    <label for="facebook_id">Facebook ID <span class="text text-red">*</span></label>
                                    <input type="text" name="facebook_id" class="form-control" id="facebook_id" placeholder="Facebook ID">
                                </div>
                                <div class="form-group">
                                    <label for="twitter_id">Twitter ID <span class="text text-red">*</span></label>
                                    <input type="text" name="twitter_id" class="form-control" id="twitter_id" placeholder="Twitter ID">
                                </div>
                                <div class="form-group">
                                    <label for="pinterest_id">Pinterest ID <span class="text text-red">*</span></label>
                                    <input type="text" name="pinterest_id" class="form-control" id="pinterest_id" placeholder="Pinterest ID">
                                </div>
                                
                            </div>
                        </div>
                        <!-- row end -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Sumbit</button>
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
                fullname: {
                    required : true,
                },

                designation: {
                    required : true,
                }, 

                telephone: {
                    required : true,
                }, 

                mobile:  {
                  required : true,
                },

                email: {
                    required : true,
                },
                description : {
                 required : true,
                },
                team_img: {
                 required : true,
                },
                facebook_id: {
                 required : true,
                },
                twitter_id: {
                 required : true,
                },
                pinterest_id: {
                 required : true,
                },

            },
            messages :{

                 fullname: {
                      required : 'Please Enter Your Fullname',
                },

                designation: {
                      required : 'Please Enter Your Designation',
                }, 

                telephone: {
                     required : 'Please Enter Your Telephone',
                }, 

                mobile:  {
                    required : 'Please Enter Your Mobile',
                },

                email: {
                     required : 'Please Enter Your Email',
                },
                description : {
                    required : 'Please Enter Your Description',
                },
                team_img: {
                     required : 'Please Enter Your Team Img',
                },
                facebook_id: {
                    required : 'Please Enter Your Facebook Id',
                },
                twitter_id: {
                     required : 'Please Enter Your Twitter Id',
                },
                pinterest_id: {
                   required : 'Please Enter Your Pinterest Id',
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
