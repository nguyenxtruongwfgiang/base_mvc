@extends('layout.main')
@section('content')
@if(isset($_SESSION['errors']) && isset($_GET['msg']))
@foreach($_SESSION['errors'] as $error)
    <li style="color: red;">{{ $error }}</li>
@endforeach
@endif
@if(isset($_SESSION['success']) && isset($_GET['msg']))
    <span style="color: green;">{{ $_SESSION['success'] }}</span>
@endif
<form action="{{ url('update-post/' . $post->id ) }}" method="post">
    <span>nội dung bài viết: </span><br>
    <textarea name="detail" id="" cols="50" rows="5">{{ $post->detail }}</textarea><br>
    <button type="submit" name="update_post">Sửa</button>
</form>

@endsection