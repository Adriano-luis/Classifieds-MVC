<?php

class homeController extends Controller {
    
    public function index(){
        $data = [
            'name' => 'Adrian',
            'page' =>  'Home'
        ];

        $this->loadTemplate('home', $data);
    }
}