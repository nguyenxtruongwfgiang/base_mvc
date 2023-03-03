<?php
namespace App\Models;
use App\Models\BaseModel;
class Product extends BaseModel{

    protected $table = 'product';
    
    public function getProducts(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        $products = $this->loadAllRows();
        return $products;
    }

    public function addProduct($id, $name, $price, $category_id){
        $sql = "insert into $this->table values (?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name, $price, $category_id]);
    }

    public function deleteProductPost($id){
        $sql = "delete from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function getProduct($id){
        $sql = "select * from $this->table where id = ?";
        $this->setQuery($sql);
        $product = $this->loadRow([$id]);
        return $product;
    }

    public function editPostProduct($id, $name, $price, $category_id){
        $sql = "update $this->table set name = ?, price = ?, category_id = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $price, $category_id, $id]);
    }
}

?>