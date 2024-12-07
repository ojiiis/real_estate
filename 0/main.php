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
function urlStr($input) {
    // Trim leading and trailing spaces
    $trimmed = trim($input);
    
    // Replace multiple consecutive spaces with a single dash
    $formatted = preg_replace('/\s+/', '-', $trimmed);
    
    return strtolower($formatted);
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
function productData($id){
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
function randProducts(){
    global $connection;
       $data = [];
    $query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 10";
    $run = mysqli_query($connection,$query);
    if($run->num_rows > 0){
        foreach($run as $row){
           $data[]= $row;
    }
    return $data;
    }
    return false;
}
function timeElapsed($dateString) {
    $startTime = new DateTime($dateString); // Convert the given date string to DateTime
    $currentTime = new DateTime();         // Get the current time

    $interval = $startTime->diff($currentTime); // Get the difference as a DateInterval object

    // Calculate the total elapsed minutes
    $totalMinutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;

    // Display in a human-readable format
    if ($interval->days > 0) {
        return $interval->days . " days ago";
    } elseif ($interval->h > 0) {
        return $interval->h . " hours ago";
    } elseif ($interval->i > 0) {
        return $interval->i . " minutes ago";
    } else {
        return "just now";
    }
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
       global $nigeria;
return (isset($nigeria[$key]))?true:false;
}

function is_city($key){
return true;
}

