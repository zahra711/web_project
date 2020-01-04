@extends('layouts.app')

@section('content')


<body>

<div > <a href="{{ route('posts.create') }} " class="btn btn-success btn-sm">ثبت خاطره جدید</a></div> 
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>عنوان خاطره</td>
          <td>تاریخ</td>
          
          
        </tr>
    </thead>
    <tbody>
       @foreach($posts as $post)
        <tr>
        <td>{{$post->caption}}</td>
        <td>{{$post->created_at}}</td>
           <td><a href="{{ route('posts.show',$post->id)}}" class="btn btn-primary">نمایش</a></td>
            
            <td><a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary">ویرایش</a></td>
            <td>
                <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">حذف</button>
                </form>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
<div>







        

</body>
</html>
@endsection




