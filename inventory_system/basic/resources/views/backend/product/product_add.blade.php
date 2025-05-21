@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
 <div class="container-fluid">
   <div class="row">
                            <div class="col-12"> 
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Add product page</h4><br><br>
                                         
                                          <form method="post" action="{{ route('product.store') }}" id="myForm" >
                                           @csrf
                                        <div class="row mb-3">

                                            <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
                                            <div class="col-sm-10 form-group">
                                                <input name="name"  class="form-control" type="text" >
                                            </div>
                                        </div>     


                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Supplier Name</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" aria-label="Default select example" name="supplier_id" >
                                                    <option selected="">Open this select menu</option>
                                                  @foreach($supplier as $supp)
                                                    <option value="{{$supp->id}}">{{$supp->name}}</option>
                                                    @endforeach
                                                   
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Unit</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" aria-label="Default select example" name="unit_id" >
                                                    <option selected="">Open this select menu</option>
                                                  @foreach($unit as $unit)
                                                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                    @endforeach
                                                   
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Category</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" aria-label="Default select example" name="category_id" >
                                                    <option selected="">Open this select menu</option>
                                                  @foreach($category as $cate)
                                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                    @endforeach
                                                   
                                                    </select>
                                            </div>
                                        </div>
                                        

                    

                                        
                                    

                                                                  
                                        <!-- end row -->                                        
                                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Product">                                                                       
                                          </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>         
   </div><!-- end col -->
</div>



<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },

                supplier_id: {
                    required : true,
                }, 

                unit_id: {
                    required : true,
                }, 

                category_id: {
                    required : true,
                },

            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
                },

                 supplier_id: {
                    required : 'Please Enter Your supplier id no',
                },
                 unit_id: {
                    required : 'Please Enter Your unit id',
                },

                  category_id: {
                    required : 'Please Enter Your category id',
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


