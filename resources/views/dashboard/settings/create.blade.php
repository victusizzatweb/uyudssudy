@extends('dashboard.app')
@section('content')


<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Add New</h3>
       
      </div>
      <div class="card-body">
        <form action="{{route("settings.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card-body">
              <div class="form-group">
                <input  name='location_uz'  type="text" class="form-control @error('location_uz') is-invalid @enderror" placeholder="Location_uz" value="{{ old('location_uz') }}" required>
                @error('location_uz')
               <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
              </div>

              <div class="form-group">
                <input name='location_ru' type="text" class="form-control @error('location_ru') is-invalid @enderror" placeholder="Location_ru" value="{{ old('location_ru') }}" required>
                @error('location_ru')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input name='location_en' type="text" class="form-control @error('location_en') is-invalid @enderror" placeholder="Location_en" value="{{ old('location_en') }}" required>
                @error('location_en')
               <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
              </div>
              <div class="form-group">
                <label for="">Logo Image</label>
                <input name='header_logo' type="file"  class="form-control @error('header_logo') is-invalid @enderror"  required>
                @error('header_logo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for=""> Location Image</label>
                <input name='location_image'  type="file" class="form-control @error('location_image') is-invalid @enderror" required>
                @error('location_image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input name='working_time' type="text" class="form-control @error('working_time') is-invalid @enderror" placeholder="Working_time" value="{{ old('working_time') }}" required>
                  @error('working_time')
                 <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
              </div>
              <div class="form-group">
                <label for=""> Working time icon</label>
                <input name='working_t_image' type="file" class="form-control @error('working_t_image') is-invalid @enderror"  required>
                 @error('working_t_image')
                <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
              </div>
              <div class="form-group">
                 <input name='phone' type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" value="{{ old('phone') }}" required>
                 @error('phone')
                 <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for=""> Phone icon</label>
                <input name='phone_image' type="file" class="form-control @error('phone_image') is-invalid @enderror"  required>
                @error('phone_image')
                <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
              </div>
              <div class="form-group">
                <input name='map' type="text" class="form-control @error('map') is-invalid @enderror" placeholder="Map" value="{{ old('map') }}" required>
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