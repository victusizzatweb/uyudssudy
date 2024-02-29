@extends('dashboard.app')
@section('content')



<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Settings</h3>
        @if (count($settings) === 1)
            <a href="{{route("settings.create")}}" style="display: none" class="btn btn-success float-right">Add New</a>
            @elseif (count($settings) === 0)
            <a href="{{route("settings.create")}}"  class="btn btn-success float-right">Add New</a>
            @else
          
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
              <th>Location (uz)</th>
              <th>Location (ru)</th>
              <th>Location (en)</th>
              <th>Logo</th>
              <th>Location image</th>
              <th>Workin time</th>
              <th>Workin time icon</th>
              <th>Phone</th>
              <th>Phone image</th>
              {{-- <th>Map</th> --}}
              <th> Action</th>
            </tr>
          </thead>
          <tbody>

@foreach ($settings as $setting)

<tr>
  <td>{{$setting->id}}</td>
  <td>{{$setting->location_uz}}</td>
  <td>{{$setting->location_ru}}</td>
  <td>{{$setting->location_en}}</td>
  <td><img style="max-width: 210px, max-hight:70px" src="{{$setting->header_logo}}" alt=""></td>
  <td><img style="max-width: 44px ;max-hight:44px" src="{{$setting->location_image}}" alt=""></td>
  <td>{{$setting->working_time}}</td>
  <td><img style="max-width: 24px;max-hight:24px" src="{{$setting->working_t_image}}" alt=""></td>
  <td>{{$setting->phone}}</td>
  <td><img style="max-width: 24px;max-hight:24px" src="{{$setting->phone_image}}" alt=""></td>
  {{-- <td class="align-top">{{$setting->map}}</td> --}}
  <td>
 <div class="btn-group">
   <a href="{{route("settings.edit", $setting->id )}}" class="btn btn-primary">
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
    <!-- /.card -->

   
  </div>
@endsection
