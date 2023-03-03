<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;

class PostController extends BaseController
{

    public $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function index()
    {
        $posts = $this->post->getPosts();
        $title = 'Quản lý bài viết';
        $this->render('post.index', compact('posts', 'title'));
    }

    public function addPost()
    {
        $this->render('post.add');
    }

    public function insertPost()
    {
        if (isset($_POST['add_post'])) {
            $errors = [];
            if (empty($_POST['detail'])) {
                $errors[] = 'mời nhập vào nội dung bài viết';
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'add-post');
            } else {
                $result = $this->post->addPost(NULL, $_POST['detail']);
                if ($result) {
                    redirect('success', 'Thêm thành công', 'add-post');
                }
            }
        }
    }

    public function deletePost($id)
    {
        if (isset($_POST['delete_post'])) {
            $result = $this->post->delePostById($id);
            if ($result) {
                redirect('success', 'xoá thành công', 'all-posts');
            }
        }
    }

    public function editPost($id)
    {
        $post = $this->post->getPost($id);
        $this->render('post.edit', compact('post'));
    }

    public function updatePost($id)
    {
        if (isset($_POST['update_post'])) {
            $errors = [];
            if (empty($_POST['detail'])) {
                $errors[] = 'mời nhập vào nội dung bài viết';
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'edit-post/' . $id);
            }
            else{
                $result = $this->post->editPost($id, $_POST['detail']);
                if($result){
                    redirect('success', 'Sửa thành công', 'edit-post/' . $id);
                }
            }
        }
    }
}
