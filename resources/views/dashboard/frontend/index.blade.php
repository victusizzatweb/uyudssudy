@extends('dashboard.app')
@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Savollar</h3>
        {{-- <a href="{{route("gallery.create")}}"  class="btn btn-success float-right">Add New</a> --}}
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
              <th>Purpose</th>
              <th>Name</th>
              <th>Phone</th>
              
            </tr>
          </thead>
          <tbody>

@foreach ($frontend as $item)

<tr>
  <td>{{$item->id}}</td>
  <td>{{$item->status}}</td>
  <td>{{$item->name}}</td>
  <td>{{$item->phone}}</td>
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
