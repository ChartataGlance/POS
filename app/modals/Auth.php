<?php
class Auth
{
   public static function  get($column)
   {
      if (!empty($_SESSION['USER'][$column])) {
         return $_SESSION['USER'][$column];
      }
      return "Unknown";
   }
   public static function logged_in()
   {
      if (!empty($_SESSION['USER'])) {
         $db = new Database();
         if ($check = $db->query("select * from users where email = :email limit 1",  ['email' => $_SESSION['USER']['email']])) {
            return true;
         }
      }
      return false;
   }

   public static function access($role)
   {
      $access['admin']        = ['admin'];
      $access['accountant']   = ['admin', 'accountant'];
      $access['supervisor']   = ['admin', 'supervisor'];
      $access['cashier']      = ['admin', 'supervisor', 'cashier'];
      $access['user']         = ['admin', 'supervisor', 'cashier', 'user'];

      $myrole = self::get('role');
      if(in_array($myrole, $access[$role]));
      {
         return true;
      }
      return false;

   }
}
