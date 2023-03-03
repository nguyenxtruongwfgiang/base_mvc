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
<form action="{{ url('update-user/' . $user->id) }}" method="post">
    <span>name: </span><input type="text" name="name" id="" value="{{ $user->name }}">
    <br>
    <span>email: </span><input type="text" name="email" id="" value="{{ $user->email }}">
    <br>
    <button type="submit" name="update_user">Sửa</button>
</form>

@endsection