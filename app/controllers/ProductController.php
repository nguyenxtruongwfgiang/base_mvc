<?php
namespace App\Controllers;
use App\Models\Product;
use App\Controllers\BaseController;
use App\Models\Category;

class ProductController extends BaseController{

    public $product;
    public $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index(){
        $products = $this->product->getProducts();
        $title = 'Quản lý sản phẩm';
        $this->render('product.index', compact('products', 'title'));
    }

    public function addProduct(){
        $categories = $this->category->getCategories();
        $this->render('product.add', compact('categories'));
    }

    public function postProduct(){
        if(isset($_POST['add_product'])){
            $errors = [];
            if(empty($_POST['name'])){
                $errors[] = 'mời nhập vào tên sản phẩm';
            }
            if(empty($_POST['price'])){
                $errors[] = 'mời nhập vào giá sản phẩm';
            }
            if(empty($_POST['category_id'])){
                $errors[] = 'mời chọn danh mục';
            }
            if(count($errors) > 0){
                redirect('errors', $errors, 'add-product');
            }
            else{
                $result = $this->product->addProduct(NULL, $_POST['name'], $_POST['price'], $_POST['category_id']);
                if($result){
                    redirect('success', 'Thêm thành công', 'add-product');
                }
            }
        }
    }
    
    public function deleteProduct($id){
        if(isset($_POST['delete_product'])){
            $result = $this->product->deleteProductPost($id);
            if($result){
                redirect('success', 'xoá thành công', 'all-products');
            }
        }
    }

    public function editProduct($id){
        $product = $this->product->getProduct($id);
        $categories = $this->category->getCategories();
        $this->render('product.edit', compact('product', 'categories'));
    }

    public function updateProduct($id){
        if(isset($_POST['update_product'])){
            $result = $this->product->editPostProduct($id, $_POST['name'], $_POST['price'], $_POST['category_id']);
            if($result){
                redirect('success', 'Sửa thành công', 'edit-product/' . $id);
            }
        }
    }

}
