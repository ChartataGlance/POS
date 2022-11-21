<?php defined("ROOTPATH") ? "" : die(); ?>
<?php

class Sales extends Model
{
   protected $table = "sales";

   protected $allowed_columns =
   [
      
      'barcode', 
      'receipt_no',
      'description',
      'qty',
      'amount',
      'total',
      'date',
      'user_id',

   ];
}
