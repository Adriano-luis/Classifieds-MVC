<?php

class homeController extends Controller {
    
    public function index(){

        $advertisements = new Advertisement();
        $user = new User();
        $c = new Category();

        $filters = array(
            'category' => null,
            'title' => null,
            'max-price' => null,
            'min-price' => null,
            'status' => null
        );

        if(isset($_GET['filter'])){
            $filters = $_GET['filter'];
        }

        isset($_SESSION['user_id']) ? $totalAds = $advertisements->getAll($filters): $totalAds = array();
        $totalSub = $user->getTotal();

        $p = 1;
        if(isset($_GET['p']))
            $p = addslashes($_GET['p']);

        $perPage = 2;
        $totalPages = ceil(count($totalAds) / $perPage);
        $laatested = $advertisements->getLatested($p, $perPage, $filters);
        $categories = $c->getAll();

        $data = [
            'totalAds' => $totalAds,
            'totalSub' =>  $totalSub,
            'categories' =>  $categories,
            'filters' =>  $filters,
            'laatested' =>  $laatested,
            'totalPages' =>  $totalPages,
        ];

        $this->loadTemplate('home', $data);
    }
}