<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header class="navbar navbar-expand-lg bg-body-tertiary">
            <ul class="menu navbar-nav me-auto mb-2 mb-lg-0 color-black">
                <li class="nav-item"><a class="nav-link active" href="{{ url('all-products') }}">Quản lý sản phẩm</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ url('all-category') }}">Quản lý danh mục</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ url('all-users') }}">Quản lý người dùng</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ url('all-posts') }}">Quản lý bài viết</a></li>
            </ul>
        </header>
        <div class="content">
            @yield('content')
        </div>
        <footer>
            @Copyright By Nguyen Truong Giang
        </footer>
    </div>
</body>

</html>