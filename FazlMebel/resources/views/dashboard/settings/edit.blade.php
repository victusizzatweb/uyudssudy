@extends('dashboard.app')
@section('content')


<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Add New</h3>
       
      </div>
      <div class="card-body">
        <form action="{{route('settings.update',$setting->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <input  name='location_uz'  type="text" class="form-control @error('location_uz') is-invalid @enderror" placeholder="Location_uz" value="{{ $setting->location_uz}}" required>
                @error('location_uz')
              <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
              </div>

              <div class="form-group">
                <input name='location_ru' type="text" class="form-control @error('location_ru') is-invalid @enderror" placeholder="Location_ru" value="{{  $setting->location_ru }}" required>
                @error('location_ru')
              <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input name='location_en' type="text" class="form-control @error('location_en') is-invalid @enderror" placeholder="Location_en" value="{{  $setting->location_en}}" required>
                @error('location_en')
              <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Logo Image</label>
                <input name='header_logo' type="file"  class="form-control @error('header_logo') is-invalid @enderror" accept="header_logo/*"  >
                @error('header_logo')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              </div>
             
              <div class="form-group">
                <label for=""> Location Image</label>
                <input name='location_image'  type="file" class="form-control @error('location_image') is-invalid @enderror" accept="location_image/*" >
                @error('location_image')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              </div>
              <div class="form-group">
                <input name='working_time' type="text" class="form-control @error('working_time') is-invalid @enderror" placeholder="Working_time" value="{{ $setting->working_time }}" required>
                @error('working_time')
              <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for=""> Working time icon</label>
                <input name='working_t_image' type="file" class="form-control @error('working_t_image') is-invalid @enderror" accept="working_t_image/*" >
                @error('working_t_image')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              </div>
              <div class="form-group">
                <input name='phone' type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" value="{{ $setting->phone}}" required>
                @error('phone')
              <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for=""> Phone icon</label>
                <input name='phone_image' type="file" class="form-control @error('phone_image') is-invalid @enderror" accept="phone_image/*">
                @error('phone_image')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              </div>
              <div class="form-group">
                <input name='map' type="text" class="form-control @error('map') is-invalid @enderror" placeholder="Map" value="{{ $setting->map }}" required>
                @error('map')
              <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="card-group  ">
                <button type="submit" class="btn btn-primary">Add Post</button>
              </div>
            </div>
           
          </form>
      
      </div>
      <div class="card-footer clearfix">
     
      </div>
    </div>
  </div>
@endsection