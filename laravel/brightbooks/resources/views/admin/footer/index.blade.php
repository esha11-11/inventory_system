@extends('admin/layout/master')
@section('page-title')
    Manage Footer
@endsection
@section('main-content')
    <section class="content">
                    <!-- /.row -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <a id="activeAllStatus" class="btn btn-danger btn-xm"><i class="fa fa-eye"></i></a>
                <a id="deactiveAllStatus" class="btn btn-danger btn-xm"><i class="fa fa-eye-slash"></i></a>
                <a id="deleteAll" class="btn btn-danger btn-xm"><i class="fa fa-trash"></i></a>
               
            </h3>
            <div class="box-tools">
                <form method="get" action="/admin/footer">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="s" class="form-control pull-right" placeholder="Search" value="{{ ( request()->get('s') ) ? request()->get('s') : null }}">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- /.box-header -->
            @if($footers)
            <form method="post" id="formView" name="formView" action="" >
        <div class="box-body">
            <table class="table table-bordered">
                <thead style="background-color: #F8F8F8;">
                    <tr>
                        <th width="4%"><input type="checkbox" name="" id="checkAll"></th>
                        <th width="15%">Address</th>
                        <th width="15%">Phone_no</th>
                        <th width="15%">E-mail </th>
                        <th width="8%">Facebook</th>
                        <th width="8%">Twitter</th>
                        <th width="8%">Youtube</th>
                        <th width="8%">Pintrust</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                @foreach($footers as $footer)
                <tr>
                    <td><input type="checkbox" name="" value="" class="checkSingle"></td>
                    <td>{{ $footer->address }}</td>
                    <td>{{ $footer->phone_no }}</td>
                    <td>{{ $footer->email }}</td>
                    <td>{{ $footer->facebook_id }}</td>
                    <td>{{ $footer->twitter_id }}</td>
                    <td>{{ $footer->youtube_id }}</td>
                    <td>{{ $footer->pintrust_id }}</td>
                  
                 
                    <td>
                        <a href="{{ route('footer.edit', $footer->id) }}" class="btn btn-info btn-flat btn-sm"> <i class="fa fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </table>
            </form>
        </div>
        <!-- /.box-body -->
       <div class="box-footer clearfix">
                <div class="row">
                  <div class="col-sm-6">
                      <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
                          Showing 100 to 500 of 1000 entries</span>
                  </div>
                  <div class="col-sm-6 text-right">
                    <ul class="pagination">
                      <li class="paginate_button previous"><a href="#" >Previous</a></li>
                      <li class="paginate_button active"><a href="#" >1</a></li>
                      <li class="paginate_button "><a href="#">2</a></li>
                      <li class="paginate_button "><a href="#" >3</a></li>
                      <li class="paginate_button "><a href="#">4</a></li>
                      <li class="paginate_button "><a href="#">5</a></li>
                      <li class="paginate_button "><a href="#">6</a></li>
                      <li class="paginate_button next"><a href="#" >Next</a></li>
                    </ul>
                  </div>
                </div>
            </div>
            @else
              <div class="alert alert-danger">No record found!</div>
            @endif
        </div>

    </div>
            <!-- /.box-body -->
    </div>
</section>
@endsection
