<?php

class advertisementController extends Controller {

    public function index(){

    }

    public function show($id){
        /*if(!isset($_SESSION['user_id'])){
            ?>
                <script type="text/javascript">window.location.href="login.php"</script>
            <?php
            exit;
        }*/
    
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