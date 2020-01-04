@extends ('layouts.app')

@section ('content')

@if($errors->any())
<div class="alert alert-danger">
   <ul>
       @foreach($errors->all() as $error)
        <li> {{$error}}</li>
       @endforeach

   </ul>
</div>
@endif


<div class="container">
    <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="post">
        @csrf <!--use csrf token for security of form-->
           <div class="row"> 
                   <div class="col-8 offset-2">
                    <div class="row">
                    <h1 > ثبت خاطره جدید</h1>
            </div>

            <div class="form-group">
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="caption" autofocus  placeholder="عنوان خاطره...">
           </div>

            <div class="form-group">
                <textarea class="form-control text-justify space-normal" name="diary" id="diary" placeholder="متن خاطره..." rows="15"></textarea>
            </div>

            <button class="btn btn-primary" type="submit" value="add">ثبت</button>
            <div > <a href="{{ route('posts.index') }} " class="btn btn-primary">بازگشت</a></div> 
            
               
    </form>
</div>
@endsection