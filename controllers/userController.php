<?php

class UserController extends Controller{
    public function index(){
        $u = new User();

        if(isset($_POST['email'])){
            $email = addslashes($_POST['email']);
            $password = md5($_POST['password']);

            if(!empty($_POST['email']) && !empty($_POST['password'])){
                if($u->login($email, $password))
                    header("Location:".BASE_URL);
                else{ 
                    $data = array();
                    $data['error'] = 'E-mail or password incorrect! Please try again.';
                }
            }else
                $haveToFill = 'need to fill all the inputs to continue!';
        }
    }
}