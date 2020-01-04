@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit 
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('posts.update', $post->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              
              <input type="text" class="form-control" name="caption" value="{{$post->caption}}"/>
          </div>
          <div class="form-group">
              
              <input type="text" class="form-control" name="diary" value="{{$post->diary}}"/>
             
          </div>
         
          <button type="submit" class="btn btn-primary">ویرایش </button>
          <div > <a href="{{ route('posts.index') }} " class="btn btn-primary">بازگشت</a></div> 
      </form>
  </div>
</div>
@endsection