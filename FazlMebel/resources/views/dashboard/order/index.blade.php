@extends('dashboard.app')
@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Orders</h3>
        <a href="{{route("order.create")}}"  class="btn btn-success float-right">Add New</a>
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
              <th>Text (uz)</th>
              <th>Text (ru)</th>
              <th>Text (en)</th>
              <th>Text2 (uz)</th>
              <th>Text2 (ru)</th>
              <th>Text2 (en)</th>
              <th>Image</th>
              <th> Action</th>
            </tr>
          </thead>
          <tbody>

@foreach ($orders as $order)

<tr>
  <td>{{$order->id}}</td>
  <td>{{$order->title_uz}}</td>
  <td>{{$order->title_ru}}</td>
  <td>{{$order->title_en}}</td>
  <td>{{$order->text_uz}}</td>
  <td>{{$order->text_ru}}</td>
  <td>{{$order->text_en}}</td>
  <td>{{$order->text2_uz}}</td>
  <td>{{$order->text2_ru}}</td>
  <td>{{$order->text2_en}}</td>
  <td><img style="max-width:40px " src="/storage/order/{{$order->image}}" alt="afsasdfasf"></td>
  <td>
 <div class="btn-group">
   <a href="{{route("order.edit", $order->id )}}" class="btn btn-primary">
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
