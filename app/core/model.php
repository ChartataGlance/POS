<?php
class Model extends Database
{
   protected function get_allowed_columns($data)
   {
      if (!empty($this->allowed_columns)) {
         foreach ($data as $key => $value) {
            // code...
            if (!in_array($key, $this->allowed_columns)) {
               unset($data[$key]);
            }
         }
         return $data;
      }
   }

   public function insert($data)
   {
      $clean_array = $this->get_allowed_columns($data, $this->table);
      $keys = array_keys($clean_array);
      $query  = "insert into $this->table";
      $query .= "(" . implode(",", $keys) . ") VALUES ";
      $query .= "(:" . implode(",:", $keys) . ")";
      $db = new Database;
      $db->query($query, $clean_array);
   }

   public function update($id, $data)
   {

      $clean_array = $this->get_allowed_columns($data, $this->table);
      $keys = array_keys($clean_array);

      $query = "update $this->table set ";

      foreach ($keys as $column) {
         // code...
         $query .= $column . "=:" . $column . ",";
      }

      $query = trim($query, ",");
      $query .= " where id = :id";
      $clean_array['id'] = $id;

      $db = new Database;
      $db->query($query, $clean_array);
   }

   public function delete($id)
   {
      $query = "delete from $this->table where id = :id limit 1";
      $clean_array['id'] = $id;

      $db = new Database;
      $db->query($query, $clean_array);
   }
   public function get_all($limit = 10, $offset = 0)
   {
      $query  = "select * from $this->table ";
      $query .= "limit $limit offset $offset";
      $db = new Database;
      return $db->query($query);
   }

   public function where($data, $limit = 10, $offset = 0)
   {
      $keys = array_keys($data);
      $query  = "select * from $this->table where ";
      foreach ($keys as $key) {
         $query .= "$key = :$key &&";
      }
      $query = trim($query, "&& ");
      $query .= " limit $limit offset $offset";
      // print_r($query);
      $db = new Database;
      return $db->query($query, $data);
   }
   public function get_one($data)
   {
      $keys = array_keys($data);
      $query  = "select * from $this->table where ";
      foreach ($keys as $key) {
         $query .= "$key = :$key &&";
      }
      $query = trim($query, "&& ");
      $db = new Database;
      if ($res = $db->query($query, $data))
      // print_r($res);
      {
         return $res[0];
      }
      return false;
   }
}
