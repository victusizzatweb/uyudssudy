@extends('dashboard.app')
@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Abouts</h3>
        
        
        @if (count($boxes) === 3)
        <a href="{{route("boxs.create")}}" style="display: none" class="btn btn-success float-right">Add New</a>
          @elseif (count($boxes) === 0)
            <a href="{{route("boxs.create")}}"  class="btn btn-success float-right">Add New</a>
          
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
              <th>Value</th>
              <th>Text (uz)</th>
              <th>Text (ru)</th>
              <th>Text (en)</th>
              <th> Action</th>
            </tr>
          </thead>
          <tbody>
            
                @foreach ($boxes as $box)
                    <tr>
                    <td>{{$box->id}}</td>
                    <td>{{$box->value}}</td>
                    <td>{{$box->text_uz}}</td>
                    <td>{{$box->text_ru}}</td>
                    <td>{{$box->text_en}}</td>
                    <td>
                    <div class="btn-group">
                    <a href="{{route("boxs.edit", $box->id )}}" class="btn btn-primary">
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
