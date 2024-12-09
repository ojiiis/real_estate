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
$data[$key] = (!is_array($value))?mysqli_real_escape_string($connection,$value):$value;
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

if($_REQ['url'] == $startPath."/totwo"){
       $er = [];
       if(strlen($data["property_title"]) < 5 || strlen($data["property_title"]) > 100){
       $_RESPONSE['status'] = false;
       $er[] = "Property title must be within 5 to 100 characters.";
       }
       if(strlen($data["description"]) < 50 || strlen($data["description"]) > 2000){
       $_RESPONSE['status'] = false;
       $er[] = "Property description must be within 50 to 2000 characters.";
       }
       if($_RESPONSE['status']){
           if(isset($data["property_id"])){
                $prop_id = $data["property_id"];
               $query = "UPDATE `draft` SET   `user_id` = '".$data["user_id"]."',  `property_title` = '".$data["property_title"]."',  `description` = '".$data["description"]."',  `type` = '".$data["type"]."',  `status` = '".$data["status"]."', `price` = '".$data["price"]."',  `area` = '".$data["area"]."', `rooms` = '".$data["rooms"]."' WHERE `property_id` = '".$prop_id."' ";
               mysqli_query($connection,$query);  
           }else{
             $prop_id = uid(30);
           $query = "INSERT INTO `draft`(`user_id`,`property_id`,`property_title`,`description`,`type`,`status`,`price`,`area`,`rooms`) 
           VALUES('".$data["user_id"]."','".$prop_id."','".$data["property_title"]."','".$data["description"]."','".$data["type"]."','".$data["status"]."','".$data["price"]."','".$data["area"]."','".$data["rooms"]."') ";
              mysqli_query($connection,$query);
           }   
      
           $_RESPONSE["data"]["redirect"] = "new?step=1";
       }
      
       $_RESPONSE["data"]["error"] = $er;
}
if($_REQ['url'] == $startPath."/tothree"){
       $er = [];
      if(strlen($data["address"]) < 5 || strlen($data["address"]) > 100){
       $_RESPONSE['status'] = false;
       $er[] = "Address must be within 5 to 100 characters.";
       }
        if($_RESPONSE['status']){
           $query = "UPDATE `draft`
SET  `address` = '".$data["address"]."',
    `state` = '".$data["state"]."',
    `city` = '".$data["city"]."',
    `neighborhood` = '".$data["neighborhood"]."',
    `zip` = '".$data["zip"]."',
    `country` = '".$data["country"]."',
    `latitude` = '".$data["latitude"]."',
    `longitude` = '".$data["longitude"]."'
WHERE `property_id` = '".$data["property_id"]."' && `user_id` = '".$data["user_id"]."' ";
mysqli_query($connection,$query);
  $_RESPONSE["data"]["redirect"] = "new?step=2";
        }
        
         $_RESPONSE["data"]["error"] = $er;
}

if($_REQ['url'] == $startPath."/tofour"){
 $er = [];
 
  if($_RESPONSE['status']){
     $query = "UPDATE `draft`
SET 
    `area_size` = '".$data["area_size"]."',
    `size_prefix` = '".$data["size_prefix"]."',
    `land_area` = '".$data["land_area"]."',
    `land_area_size_postfix` = '".$data["land_area_size_postfix"]."',
    `bedrooms` = '".$data["bedrooms"]."',
    `bathrooms` = '".$data["bathrooms"]."',
    `garages` = '".$data["garages"]."',
    `garages_size` = '".$data["garages_size"]."',
    `year_built` = '".$data["year_built"]."',
    `video_url` = '".$data["video_url"]."',
    `virtual_tour_url` = '".$data["virtual_tour_url"]."',
    `amenities` = '".$data["amenities"]."'
WHERE `property_id` = '".$data["property_id"]."'  && `user_id` = '".$data["user_id"]."' ";
     mysqli_query($connection,$query);
  $_RESPONSE["data"]["redirect"] = "new?step=3";
  }

   $_RESPONSE["data"]["error"] = $er;
}

if($_REQ['url'] == $startPath."/topost"){
 $er = [];
 
  if($_RESPONSE['status']){
   $data = draftData($data['property_id']);
$query = "INSERT INTO products (
    user_id, property_id, property_title, description, type, status, price, area, rooms, 
    address, state, city, neighborhood, zip, country, latitude, longitude, 
    detailed_information, area_size, size_prefix, land_area, land_area_size_postfix, 
    bedrooms, bathrooms, garages, garages_size, year_built, video_url, virtual_tour_url, 
    amenities,property_media, plan_description, plan_bedrooms, plan_bathrooms, plan_price, price_postfix, 
    plan_size, plan_image
) VALUES (
    '".$data['user_id']."', '".$data['property_id']."', '".$data['property_title']."', '".$data['description']."', 
    '".$data['type']."', '".$data['status']."', '".$data['price']."', '".$data['area']."', '".$data['rooms']."', 
    '".$data['address']."', '".$data['state']."', '".$data['city']."', '".$data['neighborhood']."', 
    '".$data['zip']."', '".$data['country']."', '".$data['latitude']."', '".$data['longitude']."', 
    '".$data['detailed_information']."', '".$data['area_size']."', '".$data['size_prefix']."', '".$data['land_area']."', 
    '".$data['land_area_size_postfix']."', '".$data['bedrooms']."', '".$data['bathrooms']."', '".$data['garages']."', 
    '".$data['garages_size']."', '".$data['year_built']."', '".$data['video_url']."', '".$data['virtual_tour_url']."', 
    '".$data['amenities']."', '".$data['property_media']."','".$data['plan_description']."', '".$data['plan_bedrooms']."', 
    '".$data['plan_bathrooms']."', '".$data['plan_price']."', '".$data['price_postfix']."', '".$data['plan_size']."', 
    '".$data['plan_image']."'
)";
 mysqli_query($connection,$query);
 //$er[] = mysqli_error($connection);
   mysqli_query($connection,"DELETE FROM `draft` WHERE `property_id`='".$data['property_id']."' ");
  $_RESPONSE["message"] = "Property posted successfully.";
    $_RESPONSE["data"]["redirect"] = "./".$data['state']."/".$data['city']."/".urlStr($data['property_title'])."-".$data['property_id'];
   }

 $_RESPONSE["data"]["error"] = $er;
}

if($_REQ['url'] == $startPath."/upload_property_media"){
 $er = [];
 
  if($_RESPONSE['status']){
  $rename_Image = urlStr(draftData($_POST["property_id"])["property_title"])."-".uid(20).".".pathinfo($_FILES["media"]["name"],PATHINFO_EXTENSION);
 move_uploaded_file($_FILES["media"]["tmp_name"],'../media/'.$rename_Image);
  // $fullpath = 'media/'.$rename_Image;
   $newMedia = (strlen(explode(",",draftData($_POST["property_id"])["property_media"])[0]) > 0)?draftData($_POST["property_id"])["property_media"].",".$rename_Image:$rename_Image;
         $query = "UPDATE `draft`
SET 
    `property_media` = '".$newMedia."'
 WHERE `property_id` = '".$_POST["property_id"]."'  && `user_id` = '".$_POST["user_id"]."' ";
     mysqli_query($connection,$query);
    $_RESPONSE["data"]["media"] = $rename_Image;
  }
 $_RESPONSE["data"]["error"] = $er;
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
//print_r(count(explode(",",",")));
//print_r($_REQ);