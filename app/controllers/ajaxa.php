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
   }
}

