<?php defined("ROOTPATH") ? "" : die(); ?>
<?php

class User extends Model
{
   protected $table = "users";

   protected $allowed_columns =
   [
      'user_name',
      'user_email',
      'user_password',
      'date',
      'image',
      'role',
   ];

   public function validate($data)
   {
      $errors = [];

         if (empty($data['user_name'])) {
            esc($data['user_name']);
            $errors['user_name'] = "Username is Required";
         } else
         if (strlen($data['user_name']) < 4) {
            $errors['user_name'] = "atleast 4 & Less then 12 charecters";
         } else
         if (!preg_match('/^[a-zA-Z ]+$/', $data['user_name'])) {
            $errors['user_name'] = "Letters Only No Spaces";
         }


         if (empty($data['user_email'])) {
            filter_var($data['user_email'], FILTER_SANITIZE_EMAIL);
            $errors['user_email'] = "Email is Required";
         } else
         if (!filter_var($data['user_email'], FILTER_VALIDATE_EMAIL)) {
            $errors['user_email'] = "Please Enter Valid Email";
         }



         if (empty($data['user_password'])) {
            $errors['user_password'] = "Password is Required";
         } else 
       if (!strlen($data['user_password']) > 8) {
            $errors['user_password'] = "atleast 8 charecters";
         } else
       if (!empty($data['confirm_password'] !== $data['user_password'])) {
            $errors['confirm_password'] = "Passwords Do not Match";
         }
      

      return $errors;
   }
}
