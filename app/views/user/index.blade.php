@extends('layout.main')
@section('content')
<h3>Quản lý người dùng</h3>
<a href="{{ url('add-user') }}" class="btn btn-primary">Thêm người dùng</a>
<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{  url('edit-user/' . $user->id) }}">Sửa</a>
                <form action="{{ url('delele-user/' . $user->id) }}" method="post">
                    <button type="submit" name="delete_user">Xoá</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection