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
<form action="{{ url('update-category/' . $category->id) }}" method="post">
    <span>tên danh mục: </span><input type="text" name="name" id="" value="{{ $category->name }}">
    <button type="submit" name="update_category">Sửa</button>
</form>

@endsection