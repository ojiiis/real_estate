<?php
include "../0/main.php";
$startPath = "";
if($devSetting["development"] == 1){
   $startPath = $devSetting["devUrl"]."/api"; 
}

$_REQ = [];
$parse = explode('?',$_SERVER['REQUEST_URI']);
$_REQ['url'] = $parse[0];
$_REQ['query'] = (count($parse) > 1)?$parse[1]:'';
$_RESPONSE = [];
$_RESPONSE['status'] = true;
$_RESPONSE['data'] = [];
$data = file_get_contents("php://input");
$data = json_decode($data,1);
if(is_array($data)){
foreach($data as $key => $value){
$data[$key] = mysqli_real_escape_string($connection,$value);
}
}


if($_REQ['url'] == $startPath."/register"){
    $er = [];

    $email_existing = mysqli_query($connection,"SELECT `email` FROM `users` WHERE email='".$data["email"]."' ");
if($email_existing->num_rows > 0){
       $er[] = "This email is already existing on our server.";
       $_RESPONSE['status'] = false;
}
    if(!preg_match('/^\S+\s+\S+$/',$data["fullname"])){
       $er[] = "Enter a valid fullname.";
       $_RESPONSE['status'] = false;
    }
 if (!preg_match('/^[a-zA-Z0-9_]+$/', $data["username"])) {
    $er[] = "Username can only contain letters, numbers, or underscores.";
    $_RESPONSE['status'] = false;
 }
     if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
       $er[] = "Invalid email address.";
       $_RESPONSE['status'] = false;
    }
     if(strlen($data["password"]) < 6){
       $er[] = "Password must be 6 or more characters.";
       $_RESPONSE['status'] = false;
    }
    if($data["password"] != $data["password2"]){
       $er[] = "Password combination do not match.";
       $_RESPONSE['status'] = false;
    }
     if($_RESPONSE['status']){
    $user_id = uid(30);
    $query = "INSERT INTO users(`user_id`,`fullname`,`username`,`email`,`password`) VALUES('$user_id','".$data["fullname"]."','".$data["username"]."','".$data["email"]."','".password_hash($data["password"],PASSWORD_DEFAULT)."') ";
    $run = mysqli_query($connection,$query);
    $_RESPONSE['token'] = $user_id;
    $_RESPONSE['data']["message"] = "Registration successfull.";
     }
     $_RESPONSE['data']["error"] = $er;
     
}

if($_REQ['url'] == $startPath."/login"){
    $er = [];
     $query = "SELECT * FROM `users` WHERE email='".$data["login"]."' || username='".$data["login"]."'";
     $run = mysqli_query($connection,$query);
     if($run->num_rows > 0){
        foreach($run as $user){
            if(!password_verify($data["password"],$user['password'])){
         $_RESPONSE['status'] = false;
         $_RESPONSE['data']["error"] = ["Invalid login details."];
            }else{
                $_RESPONSE['data']["message"] = "Login successfull.";
                $_RESPONSE['token'] = $user['user_id'];
            }
        }
     }else{
        $_RESPONSE['status'] = false;
         $_RESPONSE['data']["error"] = ["Invalid login details."];
     }
}


if(preg_match('/api\/([a-zA-Z0-9_]+)/',$_REQ['url'],$match)){
      if(is_username($match[1])){
         $_RESPONSE['status'] = true;
         $query = "SELECT `id`,`user_id`,`fullname`,`username`,`email`,`password`,`avi`,`phone`,`address`,`about_me`,`socials`,`date` FROM `users` WHERE   `username`='".$match[1]."' ";
         $run = mysqli_query($connection,$query);
         foreach($run as $row){
      $_RESPONSE['message'] = 'User information retrieved.';
       $_RESPONSE['data']["info"] = $row;
         }
         
      }else
      if(is_state($match[1])){
        
      }else
       if(is_city($match[1])){
        
      }else{
     
      }
}
echo json_encode($_RESPONSE);
//print_r($_REQ);