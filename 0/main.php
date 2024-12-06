<?php
$devSetting = [
    "development"=>1,
    "devUrl"=>'/fin',
    "devUrlPattern"=>'\/fin',
    "host"=>'localhost',
    "scheme"=>"http"
];
$connection = mysqli_connect("localhost","root","1234","fin");

function uid($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function shortStr($str,$len){
  if(strlen($str) > $len){
      return substr($str,0,$len)."...";
  }else{
     return $str;
  }
}

function userData($id){
    global $connection;
    $id = mysqli_real_escape_string($connection,$id);
    $query = "SELECT * FROM `users` WHERE  `user_id`='".$id."' ";
    $run = mysqli_query($connection,$query);
    if($run->num_rows > 0){
        foreach($run as $row){
        return $row;
    }
    }
    return false;
}
function getDraft($id){
     global $connection;
    $id = mysqli_real_escape_string($connection,$id);
    $query = "SELECT * FROM `draft` WHERE  `user_id`='".$id."' ";
    $run = mysqli_query($connection,$query);
    if($run->num_rows > 0){
        foreach($run as $row){
        return $row['property_id'];
    }
    }
return false;
}
function draftData($id){
     global $connection;
    $id = mysqli_real_escape_string($connection,$id);
    $query = "SELECT * FROM `products` WHERE  `property_id`='".$id."' ";
    $run = mysqli_query($connection,$query);
    if($run->num_rows > 0){
        foreach($run as $row){
        return $row;
    }
    }
return false;
}
function is_username($key){
       global $connection;
    $key = mysqli_real_escape_string($connection,$key);
    $query = "SELECT `user_id` FROM `users` WHERE  `username`='".$key."' ";
    $run = mysqli_query($connection,$query);
    if($run->num_rows > 0){
       foreach($run as $row){
        return $row['user_id'];
       }
    }
    return false;
}

function is_state($key){
       global $connection;
return true;
}

function is_city($key){
return true;
}

