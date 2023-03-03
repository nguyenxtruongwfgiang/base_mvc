<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\User;
class UserController extends BaseController{

    public $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index(){
        $users = $this->user->getUsers();
        $title = 'Quản lý người dùng';
        $this->render('user.index', compact('users', 'title'));
    }

    public function addUser(){
        $this->render('user.add');
    }

    public function postUser(){
        if(isset($_POST['add_user'])){
            $errors = [];
            if(empty($_POST['name'])){
                $errors[] = 'mời nhập vào tên người dùng';
            }
            if(empty($_POST['email'])){
                $errors[] = 'mời nhập vào email';
            }
            if(count($errors) > 0){
                redirect('errors', $errors, 'add-user');
            }
            else{
                $result = $this->user->addUser(NULL, $_POST['name'], $_POST['email']);
                if($result){
                    redirect('success', 'Thêm thành công', 'add-user');
                }
            }
        }
    }

    public function deleteUser($id){
        if(isset($_POST['delete_user'])){
            $result = $this->user->deletePostUser($id);
            if($result){
                redirect('success', 'xoá thành công', 'all-users');
            }
        }
    }

    public function editUser($id){
        $user = $this->user->getUser($id);
        $this->render('user.edit', compact('user'));
    }

    public function updateUser($id){
        if(isset($_POST['update_user'])){
            $errors = [];
            if(empty($_POST['name'])){
                $errors[] = 'mời nhập vào tên người dùng';
            }
            if(empty($_POST['email'])){
                $errors[] = 'mời nhập vào email';
            }
            if(count($errors) > 0){
                redirect('errors', $errors, 'edit-user/' . $id);
            }
            else{
                $result = $this->user->updatePostUser($id, $_POST['name'], $_POST['email']);
                if($result){
                    redirect('success', 'sửa thành công', 'edit-user/' . $id);
                }
            }
        }
    }
}
