<?php

class UserClass extends Model{

    /**
     * return int
     */
    public function getTotal(){
        

        $sql = $this->$db->query("SELECT COUNT(*) as c FROM users");
        $total = $sql->fetch(PDO::FETCH_ASSOC);

        return $total['c'];
    }

    /**
     * param @name string 
     * param @email string 
     * param @password hash 
     * param @phone string 
     * 
     * return boolean
     */
    public function cadastrar($name, $email, $password, $phone) {
        
        $sql = "SELECT id FROM users WHERE email = :email";
        $sql = $this->$db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() == 0 ){
            $sql = $this->$db->prepare("INSERT INTO users SET name = :name, email = :email, password = :password, phone = :phone");
            $sql->bindValue(':name', $name);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':password', $password);
            $sql->bindValue(':phone', $phone);
            $sql->execute();

            return true;
        }else
            return false;
    }

    /**
     * param @email string 
     * param @password hash 
     * 
     * return boolean
     */
    public function login($email, $password){
        

        $sql = $this->$db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $password);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['user_name'] = $data['name'];
            return true;
        }else
            return false;
    }
}
?>
