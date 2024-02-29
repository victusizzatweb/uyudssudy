@extends('dashboard.app')
@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Gallery</h3>
        <a href="{{route("gallery.create")}}"  class="btn btn-success float-right">Add New</a>
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
              <th>Image</th>
              <th> Action</th>
            </tr>
          </thead>
          <tbody>

@foreach ($gallery as $item)

<tr>
  <td>{{$item->id}}</td>
  <td><img style="width:200px hight:200px" src="/storage/gallery/{{$item->image}}" alt="afsasdfasf"></td>
  <td>
 <div class="btn-group">
   <a href="{{route("gallery.edit", $item->id )}}" class="btn btn-primary">
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
