<?php
defined("ROOTPATH") ? "":die();
unset($_SESSION['USER']);
session_destroy();
redirect('home');
// session_regenerate_id();