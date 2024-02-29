@extends('dashboard.app')
@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Products</h3>
        
        <a href="{{route("product.create")}}"  class="btn btn-success float-right">Add New</a>
        {{-- @if (count($information) === 3)
        <a href="{{route("information.create")}}" style="display: none" class="btn btn-success float-right">Add New</a>
          @elseif (count($information) === 0)
            <a href="{{route("information.create")}}"  class="btn btn-success float-right">Add New</a>
          
       @endif
        --}}
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
              <th>Title (uz)</th>
              <th>Title (ru)</th>
              <th>Title (en)</th>
              <th>Category id</th>
              <th> Action</th>
            </tr>
          </thead>
          <tbody>
            
                @foreach ($products as $product)
                    <tr>
                    <td>{{$product->id}}</td>
                    <td><img style="max-width: 55px; max-hight:55px" src="/storage/product/{{$product->image}}" alt=""></td>
                    <td>{{$product->title_uz}}</td>
                    <td>{{$product->title_ru}}</td>
                    <td>{{$product->title_en}}</td>
                    <td>{{$product->category->title_uz}} | {{$product->category->title_ru}} |{{$product->category->title_en}}</td>
                    <td>
                    <div class="btn-group">
                    <a href="{{route("product.edit",$product->id)}}" class="btn btn-primary">
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
