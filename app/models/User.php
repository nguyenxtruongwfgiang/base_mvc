<?php
namespace App\Models;
use App\Models\BaseModel;
class User extends BaseModel{
    
    protected $table = 'user';

    public function getUsers(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        $users = $this->loadAllRows();
        return $users;
    }

    public function addUser($id, $name, $email){
        $sql = "insert into $this->table values (?, ? ,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name, $email]);
    }

    public function deletePostUser($id){
        $sql = "delete from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function getUser($id){
        $sql = "select * from $this->table where id = ?";
        $this->setQuery($sql);
        $user = $this->loadRow([$id]);
        return $user;
    }

    public function updatePostUser($id, $name, $email){
        $sql = "update $this->table set name = ?, email = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $email, $id]);
    }
}



?>