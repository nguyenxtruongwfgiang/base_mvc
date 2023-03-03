<?php
namespace App\Models;
use App\Models\BaseModel;
class Post extends BaseModel{

    protected $table = 'post';

    public function getPosts(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        $posts = $this->loadAllRows();
        return $posts;
    }

    public function addPost($id, $detail){
        $sql = "insert into $this->table values (?, ?)";
        $this->setQuery($sql);
        return $this->execute([$id, $detail]);
    }

    public function delePostById($id){
        $sql = "delete from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function getPost($id){
        $sql = "select * from $this->table where id = ?";
        $this->setQuery($sql);
        $post = $this->loadRow([$id]);
        return $post;
    }

    public function editPost($id, $detail){
        $sql = "update $this->table set detail = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$detail, $id]);
    }
}


?>