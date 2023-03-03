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
<form action="{{ url('insert-post') }}" method="post">
    <span>nội dung bài viết: </span><br>
    <textarea name="detail" id="" cols="50" rows="5"></textarea><br>
    <button type="submit" name="add_post">Thêm</button>
</form>

@endsection