@extends('layout.main')
@section('content')
@if(isset($_SESSION['errors']) && isset($_GET['msg']))
@foreach($_SESSION['errors'] as $error)
<ul>
    <li style="color: red;">{{ $error }}</li>
</ul>
@endforeach
@endif
@if(isset($_SESSION['success']) && isset($_GET['msg']))
<span style="color: green">{{ $_SESSION['success'] }}</span>
@endif
<form action="{{ url('post-category') }}" method="post">
    <span>tên danh mục: </span><input type="text" name="name" id="">
    <button type="submit" name="add-category">Thêm</button>
</form>

@endsection