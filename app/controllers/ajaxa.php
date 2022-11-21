<?php defined("ROOTPATH") ? "" : die();
$raw_data = file_get_contents("php://input");
if (!empty($raw_data)) {
   $OBJ = json_decode($raw_data, true);
   if (is_array($OBJ)) {
      if ($OBJ['data_type'] == "search") {
         $productdb = new Products();
         if (!empty($OBJ['text'])) {
            $text = "%" . $OBJ['text'] . "%";
            $barcode = $OBJ['text'];
            $query = "select * from products where description like :find || barcode = :barcode limit 10 ";
            $rows = $productdb->query($query, ['find' => $text, 'barcode' => $barcode]);
         } else {
            $rows = $productdb->get_all();
         }


         if ($rows) {
            foreach ($rows as $key => $row) {
               //  $rows[$key]['image'] = crop($row['image']);
               $rows[$key]['description'] = strtoupper($row['description']);
               $rows[$key]['date'] = date("jS M, Y", strtotime($row['date']));
            }
            $data_type_set['data_type'] = "search";
            $data_type_set['data'] = $rows;
            // echo $rows;
            echo json_encode($data_type_set);
         }
      }
      // recieve data
      else {
         if ($OBJ['data_type'] == "checkout") {
            $data       =  $OBJ['text'];
            $receipt_no =  get_receipt_no();
            $user_id    =  1;
            $date       =  date("Y-m-d H:i:s");

            $db = new Database();
            foreach ($data as $row) {
               $arr = [];
               $arr['id'] = $row['id'];
               
               $query = "select * from products where id = :id limit 1 ";
               $check = $db->query($query, $arr);
               // var_dump($check);


               if (is_array($check)) {
                  $check = $check[0];
                  $arr = [];
                  $arr['barcode']     = $check['barcode'];
                  $arr['receipt_no']  = $receipt_no;
                  $arr['description'] = $check['description'];
                  $arr['qty']         = $row['qty'];
                  $arr['amount']      = $check['amount'];
                  $arr['total']       = $row['qty'] * $check['amount'];
                  $arr['date']        = $date;
                  $arr['user_id']     = $user_id;
                  $query = " insert into sales (barcode, receipt_no, description, qty, amount, total, date, user_id) 
                                     values (:barcode, :receipt_no, :description, :qty, :amount, :total, :date, :user_id)";
                  $db->query($query, $arr);
               }
            }
         }

         $info['data_type'] = "checkout";
         $info['data'] = "sales data saved";
         // echo json_encode($info);
      }
   }
}

function get_receipt_no()
{
   $num = 1;
   $db = new Database();
   $rows = $db->query("select receipt_no from sales order by id desc limit 1 ");
   if (is_array($rows)) {
      $num = (int)$rows[0]['receipt_no'] + 1;
   }
   return $num;
}
