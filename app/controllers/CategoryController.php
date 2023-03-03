<?php

namespace App\Controllers;

use App\Models\Category;
use App\Controllers\BaseController;

class categoryController extends BaseController
{
    public $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $title = 'Quản lý danh mục';
        $categories = $this->category->getCategories();
        $this->render('category.index', compact('categories', 'title'));
    }

    public function addCategory()
    {
        $this->render('category.add');
    }

    public function postCategory()
    {
        $errors = [];
        if (isset($_POST['add-category'])) {
            if (empty($_POST['name'])) {
                $errors[] = 'bạn chưa nhập tên danh mục';
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'add-category');
                // var_dump($_SESSION['errors']);
                // die();

            }
            else{
                $result = $this->category->addCategory(NULL, $_POST['name']);
                if($result){
                    redirect('success', 'Thêm thành công', 'add-category');
                }
            }
        }
    }

    public function deleteCategory($id){
        if(isset($_POST['deleteCategory'])){
            $result = $this->category->deletPostCategory($id);
            // var_dump($result);die();
            if($result){
                redirect('success', 'Xoá thành công', 'all-category');
            }
        }
    }

    public function editCategory($id){
        $category = $this->category->getCategory($id);
        $this->render('category.edit', compact('category'));
    }

    public function updateCategory($id){
        if(isset($_POST['update_category'])){
            $result = $this->category->updatePostCategory($id, $_POST['name']);
            if($result){
                redirect('success', 'sửa thành công', 'edit-category/' . $id);
            }
        }
    }
}
