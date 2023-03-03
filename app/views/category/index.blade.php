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
<h3>Quản lý danh mục</h3>
<a href="{{ url('add-category') }}" class="btn btn-primary">Thêm danh mục</a>
<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ url('edit-category/' . $category->id) }}">Sửa</a>
                <form action="{{ url('delete-category/' . $category->id) }}" method="post">
                    <button type="submit" name="deleteCategory">Xoá</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection