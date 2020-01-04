@extends ('layouts.app')

@section ('content')
<div class="container">

        <div >
            <h3> {{$post-> caption }} </h3>
            <p>{{$post-> diary }}</p>
        </div>
        <div > <a href="{{ route('posts.index') }} " class="btn btn-primary">بازگشت</a></div> 

</div>




@endsection