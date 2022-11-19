<?php
defined("ROOTPATH") ? "":die();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $user = new User;
   
   $_POST['date']  = date("Y-m-d H:i:s");
   $_POST['image'] = "img/link";
   $_POST['role']  = "user";
   
   $errors = $user->validate($_POST);

   if(empty($errors)){
      $_POST['user_password'] =  password_hash($_POST['user_password'], PASSWORD_DEFAULT);
     $user->insert($_POST);
      authenticate($_POST);
      redirect('login');
   }
}
require views_path('auth/signup');
