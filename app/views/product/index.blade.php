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
<h3>Quản lý sản phẩm</h3>
<a href="{{ url('add-product') }}" class="btn btn-primary">Thêm sản phẩm</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ number_format($product->category_id) }}</td>
                <td>
                    <a href="{{ url('edit-product/' . $product->id) }}">Sửa</a>
                    <form action="{{ url('delete-product/' . $product->id) }}" method="post">
                        <button type="submit" name="delete_product">Xoá</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection