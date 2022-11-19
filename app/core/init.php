<?php
require "../app/core/config.php";
require "../app/core/database.php";
require "../app/core/functions.php";
require "../app/core/model.php";

spl_autoload_register('my_function');

function my_function($class)
{
  $cfile =  "../app/modals/".ucfirst($class). ".php";
   if(file_exists($cfile)){

      require $cfile;

   }
   
}