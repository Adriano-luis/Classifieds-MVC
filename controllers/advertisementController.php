<?php
 namespace Controllers;

 use Core\Controller;
 use Models\Advertisement;
 use Models\User;
 use Models\Category;

class advertisementController extends Controller {

    public function __construct() {
        if(!isset($_SESSION['user_id'])){
            header("Location:".BASE_URL.'user');
            exit;
        }
    }

    public function index(){
        $data = array();

        $advertisement = new Advertisement();
        $data['list'] = $advertisement->getAll();

        $this->loadTemplate('myAdvertisements', $data);
    }

    public function new(){
    
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
        }

        $data['categories'] = $c->getAll();
        $this->loadTemplate('newAdvertisement', $data);
    }

    public function show($id){

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

    public function edit($id){  

        $a = new Advertisement();
        if(isset($_POST['title']) && isset($_POST['category'])){
            $category = addslashes($_POST['category']);
            $title = addslashes($_POST['title']);
            $description = addslashes($_POST['description']);
            $price = addslashes($_POST['price']);
            $status = addslashes($_POST['status']);
            $id = addslashes($id);
            if(isset($_FILES['photos']))
                $photos = $_FILES['photos'];
            else
                $photos = null;

            $a->editAdvertisement($id, $category, $title, $description, $price, $status, $photos);
            $data['success'] = true;
        }

        if(isset($id) && !empty($id)){
            $data = $a->getAdvertisement(addslashes($id));
            $c = new Category();
            $data['categories'] = $c->getAll();
        }else{
            header("Location:".BASE_URL.'advertisement');
            exit;
        }

        $this->loadTemplate('editAdvertisement', $data);
    }

    public function deletePhoto($idPhoto){
        $a = new Advertisement();
        $id = $a->deletePhoto($idPhoto);

        header("Location:".BASE_URL.'advertisement/edit/'.$id);
        exit;
    }

    public function delete($id){

        $advertisement = new Advertisement();
        if(isset($id))
            $advertisement->delete($id);
        header("Location:".BASE_URL.'advertisement');
        exit;

    }
}