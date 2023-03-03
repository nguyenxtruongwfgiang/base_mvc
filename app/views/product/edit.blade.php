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
<form action="{{ url('update-product/' . $product->id) }}" method="post" class="form-group">
    <span>Tên sản phẩm</span><input class="form-control" type="text" name="name" id="" value="{{ $product->name }}">
    <br>
    <span>Giá</span><input class="form-control" type="text" name="price" id="" value="{{ $product->price }}">
    <br>
    <span>Danh mục</span>
    <select name="category_id" id="">
        @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? $category->name : 'Select' }}>{{$category->name}}</option>
        @endforeach
    </select>
    <button type="submit" name="update_product">Sửa</button>
</form>

@endsection