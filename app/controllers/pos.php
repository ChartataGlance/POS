<?php
defined("ROOTPATH") ? "" : die();
if (Auth::access('cashier')) {
   require views_path('pos');
} else {
   Auth::getMessage("please Login as Cashier");
   require views_path('auth/denied');
}
