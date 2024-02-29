@extends('dashboard.app')
@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Categories</h3>
        <a href="{{route("category.create")}}"  class="btn btn-success float-right">Add New</a>

        {{-- @if (count($abouts) === 1)
          <a href="{{route("abouts.create")}}" style="display: none" class="btn btn-success float-right">Add New</a>
            @elseif (count($abouts) === 0)
              <a href="{{route("abouts.create")}}"  class="btn btn-success float-right">Add New</a>
            
        @endif --}}
       
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
              <th>Title (uz)</th>
              <th>Title (ru)</th>
              <th>Title (en)</th>
              <th> Action</th>
            </tr>
          </thead>
          <tbody>

@foreach ($categories as $catigory)

<tr>
  <td>{{$catigory->id}}</td>
  <td>{{$catigory->title_uz}}</td>
  <td>{{$catigory->title_ru}}</td>
  <td>{{$catigory->title_en}}</td>
  <td>
    <form action="{{route("category.edit", $catigory->id)}}" method="POST">
      @method('GET')
      <button class="btn btn-primary" type="submit"><i class="fa fa-edit"></i></button>
    </form>
 <form action="{{route("category.destroy", $catigory->id )}}" method="POST">
  @csrf
  @method('delete')
  <button onclick="return confirm('Are you sure you want  to delete? ')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
</form>
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
