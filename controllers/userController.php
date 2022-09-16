<?php

class UserController extends Controller{

    public function index(){
        $data = array();
        $u = new User();

        if(isset($_POST['email'])){
            $email = addslashes($_POST['email']);
            $password = md5($_POST['password']);

            if(!empty($_POST['email']) && !empty($_POST['password'])){
                if($u->login($email, $password))
                    header("Location:".BASE_URL);
                else{ 
                    $data['error'] = 'E-mail or password incorrect! Please try again.';
                }
            }else
                $data['haveToFill'] = 'need to fill all the inputs to continue!';
        }

        $this->loadTemplate('login', $data);
    }

    public function subscribe(){
        $data = array();
        $u = new User();

        if(isset($_POST['email'])){
            $name = addslashes($_POST['name']);
            $email = addslashes($_POST['email']);
            $password = md5($_POST['password']);
            $phone = addslashes($_POST['phone']);

            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){
                if($u->subscribe($name,$email,$password,$phone))
                    $data['success'] = "Congratulations! Please make login <a href=' ".BASE_URL."user '>Click here to login</a>";
                else
                    $data['error'] = 'Already exists an user related to this email address';
            }else
                $data['haveToFill'] = 'You need to fill all the inputs to continue!';
             
        }

        $this->loadTemplate('signUp', $data);
    }

    public function logout(){
        session_start();
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        header('Location:'.BASE_URL.'user');
    }
}