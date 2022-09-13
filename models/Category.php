<?php

class Category extends Model {
    public function getAll(){
        $list = array();
        

        $sql = $this->db->query("SELECT * FROM categories");
        if($sql->rowCount() > 0){
            $list = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return $list;
    }
}