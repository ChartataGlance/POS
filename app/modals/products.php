<?php defined("ROOTPATH") ? "" : die(); ?>
<?php

class Products extends Model
{
   protected $table = "products";

   protected $allowed_columns =
   [
      'barcode',//varchar15
      'description',//varchar50
      'qty',//int
      'amount',//decimal
      'image',//varchar500
      'user_id',//varchar60
      'date',
      'views',//int
   ];

   public function validate($data, $id = null)
	{
		$errors = [];

			//check description
			if(empty($data['description']))
			{
				$errors['description'] = "Product description Field is Empty!";
			}else
			if(!preg_match('/[a-zA-Z0-9 _\-\&\(\)]+/', $data['description']))
			{
				$errors['description'] = "Letters Only";
			}

			//check qty
			if(empty($data['qty']))
			{
				$errors['qty'] = "Product quantity is required";
			}else
			if(!preg_match('/^[0-9]+$/', $data['qty']))
			{
				$errors['qty'] = "quantity must be a number";
			}

			//check amount
			if(empty($data['amount']))
			{
				$errors['amount'] = "Product amount is required";
			}else
			if(!preg_match('/^[0-9.]+$/', $data['amount']))
			{
				$errors['amount'] = "amount must be a number";
			}

			//check image
			$max_size = 4;//mbs
			$size = $max_size * (1024 * 1024);

			if(!$id || ($id && !empty($data['image']))){

				if(empty($data['image']))
				{
					$errors['image'] = "Product image is required";
				}else
				if(!($data['image']['type'] == "image/jpeg" || $data['image']['type'] == "image/png"))
				{
					$errors['image'] = "Image must be a valid JPEG or PNG";
				}else
				if($data['image']['error'] > 0)
				{
					$errors['image'] = "The image failed to upload. Error No.".$data['image']['error'];
				}else
				if($data['image']['size'] > $size)
				{
					$errors['image'] = "The image size must be lower than ".$max_size."Mb";
				}
			}

			
		return $errors;
	}

   public function generate_barcode()
   {
      return "2222" . rand(1000,999999999);

   }

   public function generate_filename($ext = "jpg")
	{ return hash("sha1",rand(1000,999999999))."_".rand(1000,9999).".".$ext;}
}
