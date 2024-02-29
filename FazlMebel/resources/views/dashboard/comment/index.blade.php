@extends('dashboard.app')
@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Comments</h3>
        
        {{-- <a href="{{route("comment.create")}}"  class="btn btn-success float-right">Add New</a> --}}
        @if (count($comments) === 4)
        <a href="{{route("comment.create")}}" style="display: none" class="btn btn-success float-right">Add New</a>
          @elseif (count($comments) === 0)
            <a href="{{route("comment.create")}}"  class="btn btn-success float-right">Add New</a>
          
       @endif
       
      </div>
     


      @if(session('message'))
      <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
        <strong>{{ session('message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif


      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered table-primary">
          <thead>
            <tr>
              <th>TR</th>
              <th>Name</th>
              <th>Title (uz)</th>
              <th>Title (ru)</th>
              <th>Title (en)</th>
              <th>Text (uz)</th>
              <th>Text (ru)</th>
              <th>Text (en)</th>
              <th> Action</th>
            </tr>
          </thead>
          <tbody>
            
                @foreach ($comments as $comment)
                    <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->name}}</td>
                    <td>{{$comment->title_uz}}</td>
                    <td>{{$comment->title_ru}}</td>
                    <td>{{$comment->title_en}}</td>
                    <td>{{$comment->text_uz}}</td>
                    <td>{{$comment->text_ru}}</td>
                    <td>{{$comment->text_en}}</td>
                    <td>
                    <div class="btn-group">
                    <a href="{{route("comment.edit",$comment->id)}}" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                    </div>
                    </td>
                    </tr>
                @endforeach
      
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <div class="d-flex justify-content-center my-5">
          {{-- {{ $settings->onEachSide(1)->links() }} --}}
        </div>
      </div>
    </div>
  </div>
@endsection
