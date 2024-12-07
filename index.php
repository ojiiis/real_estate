<?php
session_start();
include "0/property_schemma.php";
include "0/nigeria.php";
include "0/main.php";

$startPath = "";
if($devSetting["development"] == 1){
   $startPath = $devSetting["devUrl"]; 
}
$_REQ = [];
$parse = explode('?',$_SERVER['REQUEST_URI']);
$_REQ['url'] = $parse[0];
$_REQ['query'] = (count($parse) > 1)?$parse[1]:'';
if(isset($_GET['auth'])){

 if(userData($_GET['auth'])){
$_SESSION['user_id'] = $_GET['auth'];
 header('Location: ./'.userData($_GET['auth'])['username']); 
 }

}

if($_REQ['url'] == $startPath."/" || $_REQ['url'] == $startPath.""){
    $_GET['is_home'] = 1;
    include "header-one.php";
    include "views/home.php";
    include "footer.php";
}else

if($_REQ['url'] == $startPath."/listing" || $_REQ['url'] == $startPath."/listing/"){
    include "header-one.php";
    include "views/listing.php";
    include "footer.php";
}else
if($_REQ['url'] == $startPath."/new" || $_REQ['url'] == $startPath."/new/"){
       $_GET['step'] = (!isset($_GET['step']))?0:$_GET['step'];
       $draft = (getDraft($_SESSION['user_id']))?draftData(getDraft($_SESSION['user_id'])):false;
       $_GET['user_id'] = $_SESSION['user_id'];
             include "header-user.php";
          include "views/new-listing.php";
         include "footer-user.php";
}else
if(preg_match('/'.$devSetting["devUrlPattern"].'\/([a-zA-Z0-9_]+)/',$_REQ['url'],$match)){
      if(is_username($match[1])){
        $_GET['username'] = $match[1];
         include "header-user.php";
          include "views/dashboard.php";
         include "footer-user.php";
      }else
      if(is_state($match[1])){
       //   echo 'its a state';
       
       $id = explode("-",$_REQ['url'])[count(explode("-",$_REQ['url'])) - 1];
        $id = ($id[strlen($id) - 1] == "/")?substr($id,0,-1):$id;
         $property = productData($id);
              include "header-one.php";
    include "views/property.php";
    include "footer.php";
      }else
       if(is_city($match[1])){
        
      }else{
        $_GET['is_home'] = 1;
    include "header-one.php";
    include "views/home.php";
    include "footer.php";
      }
}


?>
<script src="js/client.js?id=<?php echo strtotime('now'); ?>"></script>
