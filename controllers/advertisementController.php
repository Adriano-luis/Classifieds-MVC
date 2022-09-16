<?php

class advertisementController extends Controller {

    public function index(){
        $data = array();

        $advertisement = new Advertisement();
        $data['list'] = $advertisement->getAll();

        $this->loadTemplate('myAdvertisements', $data);
    }

    public function new(){
        if(!isset($_SESSION['user_id'])){
            header("Location:".BASE_URL.'login');
            exit;
        }
    
        $data = array();
        $a = new Advertisement();
        $c = new Category();

        if(isset($_POST['title']) && isset($_POST['category'])){
            $category = addslashes($_POST['category']);
            $title = addslashes($_POST['title']);
            $description = addslashes($_POST['description']);
            $price = addslashes($_POST['price']);
            $status = addslashes($_POST['status']);
    
            $a->newAdvertisement($category, $title, $description, $price, $status);
            $data['success'] = true;
        }else
            $data['error'] = true;

        $data['categories'] = $c->getAll();
        $this->loadTemplate('newAdvertisement', $data);
    }

    public function show($id){
        if(!isset($_SESSION['user_id'])){
            header("Location:".BASE_URL.'login');
            exit;
        }
        $data = array();

        $advertisements = new Advertisement();
        $user = new User();
    
        if(!empty($id)){
            $id = addslashes($id);
            $data['info'] = $advertisements->getAdvertisement($id);
        }else{
            header("Location:".BASE_URL);
            exit;
        }

        $this->loadTemplate('advertisement', $data);
    }
}