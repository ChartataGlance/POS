<?php
defined("ROOTPATH") ? "":die();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $user = new User();
   // filter_var($data['user_email'], FILTER_VALIDATE_EMAIL);
   if ($row =  $user->where(['user_email' => $_POST['user_email']])) {

      if (password_verify($_POST['user_password'], $row[0]['user_password']))
      {
            authenticate($row[0]);
            redirect('home');
      }  else { $errors['user_password'] = "Check password" ;}
  
   } else {
      $errors['user_email'] = "Check Email";
   }
}
require views_path('auth/login');
