<?php
namespace App\Models;
use App\Models\BaseModel;
class Category extends BaseModel{

    protected $table = 'category';

    public function getCategories(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        $categories = $this->loadAllRows();
        return $categories;
    }

    public function addCategory($id, $name){
        $sql = "insert into $this->table values (?, ?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name]);
    }

    public function deletPostCategory($id){
        $sql = "delete from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function getCategory($id){
        $sql = "select * from $this->table where id = ?";
        $this->setQuery($sql);
        $category = $this->loadRow([$id]);
        return $category;
    }

    public function updatePostCategory($id, $name){
        $sql = "update $this->table set name = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $id]);
    }
}

?>