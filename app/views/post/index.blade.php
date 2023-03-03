@extends('layout.main')
@section('content')
@if(isset($_SESSION['success']) && isset($_GET['msg']))
    <span style="color: green;">{{ $_SESSION['success'] }}</span>
@endif
<a href="{{ url('add-post') }}" class="btn btn-primary">Thêm bài viết</a>
<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Detail</th>
            <th>Ations</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->detail }}</td>
                <td>
                    <a href="{{ url('edit-post/'.  $post->id) }}">Sửa</a>
                    <form action="{{ url('delete-post/' . $post->id) }}" method="post">
                        <button type="submit" name="delete_post">Xoá</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection