<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});

//khu vực cần quan tâm --start--
// bắt đầu định nghĩa ra các đường dẫn
//category routes
$router->get('/', [App\Controllers\ProductController::class, 'index']);
$router->get('all-category', [App\Controllers\CategoryController::class, 'index']);
$router->get('add-category', [App\Controllers\CategoryController::class, 'addCategory']);
$router->post('post-category', [App\Controllers\CategoryController::class, 'postCategory']);
$router->post('delete-category/{id}', [App\Controllers\CategoryController::class, 'deleteCategory']);
$router->get('edit-category/{id}', [App\Controllers\CategoryController::class, 'editCategory']);
$router->post('update-category/{id}', [App\Controllers\CategoryController::class, 'updateCategory']);

//product routes
$router->get('all-products', [App\Controllers\ProductController::class, 'index']);
$router->get('add-product', [App\Controllers\ProductController::class, 'addProduct']);
$router->post('post-product', [\App\Controllers\ProductController::class, 'postProduct']);
$router->post('delete-product/{id}', [App\Controllers\ProductController::class, 'deleteProduct']);
$router->get('edit-product/{id}', [App\Controllers\ProductController::class, 'editProduct']);
$router->post('update-product/{id}', [App\Controllers\ProductController::class, 'updateProduct']);

//user routes
$router->get('all-users', [App\Controllers\UserController::class, 'index']);
$router->get('add-user', [App\Controllers\UserController::class, 'addUser']);
$router->post('post-user', [App\Controllers\UserController::class, 'postUser']);
$router->post('delele-user/{id}', [App\Controllers\UserController::class, 'deleteUser']);
$router->get('edit-user/{id}', [App\Controllers\UserController::class, 'editUser']);
$router->post('update-user/{id}', [App\Controllers\UserController::class, 'updateUser']);

// post routes
$router->get('all-posts', [App\Controllers\PostController::class, 'index']);
$router->get('add-post', [App\Controllers\PostController::class, 'addPost']);
$router->post('insert-post', [App\Controllers\PostController::class, 'insertPost']);
$router->post('delete-post/{id}', [App\Controllers\PostController::class, 'deletePost']);
$router->get('edit-post/{id}', [App\Controllers\PostController::class, 'editPost']);
$router->post('update-post/{id}', [App\Controllers\PostController::class, 'updatePost']);
//khu vực cần quan tâm --end--

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;
