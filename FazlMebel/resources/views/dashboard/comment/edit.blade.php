@extends('dashboard.app')
@section('content')


<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2">Add New</h3>
       
      </div>
      <div class="card-body">
        <form action="{{route("comment.update", $comment->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <input name='name' type="text" placeholder="Name" value="{{ $comment->name}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input  name='title_uz'  type="text" class="form-control @error('title_uz') is-invalid @enderror" placeholder="Title_uz" value="{{ $comment->title_uz}}" required>
                @error('title_uz')
               <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
              </div>

              <div class="form-group">
                <input name='title_ru' type="text" class="form-control @error('title_ru') is-invalid @enderror" placeholder="Title_ru" value="{{ $comment->title_ru }}" required>
                @error('title_ru')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input name='title_en' type="text" class="form-control @error('title_en') is-invalid @enderror" placeholder="Title_en" value="{{ $comment->title_en}}" required>
                @error('title_en')
               <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
              </div>
              <div class="form-group">
                <input  name='text_uz'  type="text" class="form-control @error('text_uz') is-invalid @enderror" placeholder="Text_uz" value="{{ $comment->text_uz}}" required>
                @error('text_uz')
               <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
              </div>

              <div class="form-group">
                <input name='text_ru' type="text" class="form-control @error('text_ru') is-invalid @enderror" placeholder="Text_ru" value="{{ $comment->text_ru}}" required>
                @error('text_ru')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input name='text_en' type="text" class="form-control @error('text_en') is-invalid @enderror" placeholder="Text_en" value="{{ $comment->text_en}}" required>
                @error('text_en')
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