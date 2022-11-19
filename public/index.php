<?php
session_start();
define('ROOTPATH', true);
require "../app/core/init.php";
$controllers = $_GET['page'] ?? "home";
$controllers = strtolower($controllers);

if (file_exists("../app/controllers/" . $controllers . ".php")) {
   require "../app/controllers/" . $controllers . ".php";
} else {
   echo "controller not exist";
}
