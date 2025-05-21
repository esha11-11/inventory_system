@extends('admin/layout/master')
@section('page-title')
  Manage Books
@endsection
@section('main-content')

    <!-- Main content -->
    <section class="content">
      
      <!-- /.row -->
     <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> 
                   <a id="activeAllStatus" class="btn btn-danger btn-xm"><i class="fa fa-eye"></i></a>
                <a id="deactiveAllStatus" class="btn btn-danger btn-xm"><i class="fa fa-eye-slash"></i></a>
                <a id="deleteAll" class="btn btn-danger btn-xm"><i class="fa fa-trash"></i></a>
                    <a href="{{ route('book.create')}}" class="btn btn-default btn-xm"><i class="fa fa-plus"></i></a>
              </h3>
              <div class="box-tools">
                <form method="get" action="/admin/book">
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
            <div class="box-body">

              @if($books)
		<form method="post" id="formView" name="formView" action="" >
              <table class="table table-bordered">
                <thead style="background-color: #F8F8F8;">
                  <tr>
                    <th width="4%"><input type="checkbox" name="" id="checkAll"></th>
                    <th width="25%">Title</th>
                    <th width="15%">Author</th>
                    <th width="15%">Category</th>
                    <th width="20%">Book Image</th>
                    <th width="10%">Status</th>
                    <th width="10%">Manage</th>
                  </tr>
                </thead>
                @foreach($books as $book)
                <tr>
                  <td><input type="checkbox" name="checkAll[]" value="{{$book->id}}" class="checkSingle"></td>
                  <td>{{ $book->title }}</td>
                  <td>{{ $book->author->title ?? 'no author!' }}</td>
                
                <td> {{ $book->category->title ?? 'no category!' }}</td>  
                 

                  <td>
                     @if($book->book_img == 'No image found')
                            <img src="/admin_imgs/no_img.png" width="100" height="100" class="img-thumbnail" alt="No image found">
                        @else
                            <img src="/admin_imgs/books/{{ $book->book_img }}" width="100" height="100" class="img-thumbnail" alt="{{ $book->title }}">
                        @endif

                  </td>
                  <td>
                    @if($book->status == 'DEACTIVE')
                    <a href="{{ route('book.status', $book->id) }}" class="btn btn-danger btn-sm singleStatus"><i class="fa fa-thumbs-down"></i></a>
                    @else
                    <a href="{{ route('book.status', $book->id) }}" class="btn btn-info btn-sm singleStatus"><i class="fa fa-thumbs-up"></i></a>
                 @endif
                  </td>
                  <td>
                      <a href="{{  route('book.edit' , $book->id)}}" class="btn btn-info btn-flat btn-sm"> <i class="fa fa-edit"></i></a>
                      <a href="{{ route('book.delete' , $book->id) }}"  class="btn btn-danger btn-flat btn-sm singleDelete"> <i class="fa fa-trash-o"></i></a >
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
                                    Showing {{($books->currentpage()-1)*$books->perpage()+1}} to {{$books->currentpage()*$books->perpage()}}
                                    of {{$books->total()}} entries
                                  </span>
                            </div>
                          <div class="col-sm-6 text-right">
                              {!! $books->links() !!}
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

@section('scripts')
  <script>
    $(document).ready(function() {
      // SINGLE STATUS AJAX.
      $(".singleStatus").on('click', function(event) {
        event.preventDefault(); //disable link functionality.
        
        var self = $(this);
        var href = self.attr('href');

        self.html('<img src="/assets/admin/dist/img/ajax-loader.gif">');
        
        $.get(href, function(data) {
          if (data == 'ACTIVE') 
          {
            self.closest('a').removeClass('btn btn-danger btn-sm');
            self.closest('a').addClass('btn btn-info btn-sm');
            self.html('<i class="fa fa-thumbs-up"></i>');
          }
          else
          {
            self.closest('a').removeClass('btn btn-info btn-sm');
            self.closest('a').addClass('btn btn-danger btn-sm');
            self.html('<i class="fa fa-thumbs-down"></i>'); 
          }
        }); 
      });

      // SINGLE DELETE RECORD AJAX.
      $(".singleDelete").on('click', function(event) {
        event.preventDefault();
        
        if (confirm('Are you sure you want to delete this?')) 
        {
          var self = $(this);
          var href = self.attr('href');

          $.get(href, function(data) {
            if (data == 'true') {
              self.closest('tr').css('background-color', 'red').fadeOut(1000);
              self.remove();
            }
          });
        }
        else 
          return false;
      });

      // ACTIVE ALL STATUS AJAX.
      $("#activeAllStatus").on('click',  function(event) {
        event.preventDefault();

        if ($(".checkSingle:checked").length > 0 ) 
        {
          var formSerials = $("#formView").serialize();
          $.get('{{ route('book.status.active') }}', formSerials, function(data) {
            if (data > 0) 
            {
              window.location.href = '/admin/book';
            }
          });
        }
        else
          alert("Select atleast one!");
      });

      // DEACTIVE ALL STATUS AJAX.
      $("#deactiveAllStatus").on('click',  function(event) {
        event.preventDefault();

        if ($(".checkSingle:checked").length > 0 ) 
        {
          var formSerials = $("#formView").serialize();
          $.get('{{ route('book.status.deactive') }}', formSerials, function(data) {
            if (data > 0) 
              window.location.href = '/admin/book';
          });
        }
        else
          alert("Select atleast one!");
      });

      // DELETE ALL AJAX.
      $("#deleteAll").on('click',  function(event) {
        event.preventDefault();

        if ($(".checkSingle:checked").length > 0 ) 
        {
          if (confirm('Are you sure you want to delete this? ')) 
          {
            var formSerials = $("#formView").serialize();
            $.get('{{ route('book.delete.all') }}', formSerials, function(data) {
            if (data > 0) 
              window.location.href = '/admin/book';
            });
          }
          else
            return false;
        }
        else
          alert("Select atleast one!");
      });

    });
  </script>
@endsection