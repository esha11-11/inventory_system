 @extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Customer Wise Report</h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
<!--                     <a href="{{route('stock.report.pdf')}}" target="_blank" class="btn btn-dark btn-rounded waves-effect waves-effect waves-light" style="float:right;"><i class="fas fa-print">Stock Report Print</i></a>
 -->             

                    
<div class="row">
    <div class="col-md-12 text-center">
        <strong> Customer Wise Credit Report </strong>
        <input type="radio" name="customer_wise_report" value="customer_wise_credit" class="search_value">&nbsp;&nbsp;
       
        <strong> Product Wise Paid Report </strong>
        <input type="radio" name="customer_wise_report" value="customer_wise_paid" class="search_value">
 

    </div>
</div><!-- //endrow -->
       
                    <div class="show_credit" style="display:none">
                         <form method="GET"  action="{{route('customer.wise.credit.report')}}"  id="myForm" target="_blank">
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label> Customer Name </label>
                                        <select class="form-select select2" aria-label="Default select example" name="customer_id" >
                                        <option selected="">Open this select menu</option>
                                   @foreach($customers as $cus)
                                        <option value="{{$cus->id}}">{{$cus->name}}</option>
                                    @endforeach
                                       
                                        </select>
                                </div>
                                <div class="col-sm-4" style="padding-top: 28px; ">
                                    <button type="sumbit" class="btn btn-primary">search</button>
                                </div>
                            </div>
                        </form>
                    </div>

<!-- end customer credit wise -->
<!-- show paid wise start -->


                    <div class="show_paid" style="display:none">
                         <form method="GET"  action="{{route('customer.wise.paid.report')}}"  id="myForm" target="_blank">
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label> Customer Name </label>
                                        <select class="form-select select2" aria-label="Default select example" name="customer_id" >
                                        <option selected="">Open this paid Customer select menu</option>
                                   @foreach($customers as $cus)
                                        <option value="{{$cus->id}}">{{$cus->name}}</option>
                                    @endforeach
                                       
                                        </select>
                                </div>
                                <div class="col-sm-4" style="padding-top: 28px; ">
                                    <button type="sumbit" class="btn btn-primary">search</button>
                                </div>
                            </div>
                        </form>
                    </div>

<!-- end show paid wise -->




                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                     
                        
                    </div> <!-- container-fluid -->
                </div>
 




 


<script type="text/javascript">
    $(document).on('change', '.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'customer_wise_credit') {
            $('.show_credit').show();

        }
        else{
            $('.show_credit').hide();

        }
    });
</script>

<script type="text/javascript">
    $(document).on('change', '.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'customer_wise_paid') {
            $('.show_paid').show();

        }
        else{
            $('.show_paid').hide();

        }
    });
</script>


@endsection





