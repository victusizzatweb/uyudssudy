@extends('dashboard.app')
@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">InformationAboutUs</h3>
        
        <a href="{{route("informationAboutUs.create")}}"  class="btn btn-success float-right">Add New</a>
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
              <th>Text (uz)</th>
              <th>Text (ru)</th>
              <th>Text (en)</th>
              <th> Action</th>
            </tr>
          </thead>
          <tbody>
          
                @foreach ($informationAboutU as $information)
                    <tr>
                    <td>{{$information->id}}</td>
                    <td><img style="max-width: 55px; max-hight:55px" src="/storage/informationAboutUs/{{$information->image}}" alt=""></td>
                    <td>{{$information->title_uz}}</td>
                    <td>{{$information->title_ru}}</td>
                    <td>{{$information->title_en}}</td>
                    <td>{{$information->text_uz}}</td>
                    <td>{{$information->text_ru}}</td>
                    <td>{{$information->text_en}}</td>
                    <td>
                    <div class="btn-group">
                      
                    <a href="{{route("informationAboutUs.edit",$information->id)}}" class="btn btn-primary">
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
