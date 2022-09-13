<?php

class productController extends Controller {

    public function index(){

    }

    public function show($id){
        if(!isset($_SESSION['user_id'])){
            ?>
                <script type="text/javascript">window.location.href="login.php"</script>
            <?php
            exit;
        }
    
        $advertisements = new Advertisement();
        $user = new User();
    
        if(!empty($id)){
            $id = addslashes($id);
            $info = $advertisements->getAdvertisement($id);
        }else{
            ?>
                <script type="text/javascript">window.location.href="index.php"</script>
            <?php
            exit;
        }
    }
}