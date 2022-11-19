<?php
class Database
{
   private function db_connect()

   {
      $dbhost = "127.0.0.1";
      $dbname = "pos";
      $dbuser = "root";
      $dbpwd  = "";
      $dbdriver  = "mysql";

      try {
         $connection = new PDO("$dbdriver:host=$dbhost; dbname=$dbname", $dbuser, $dbpwd);
      } catch (PDOException  $e) {
         echo $e->getMessage();
      }

      return $connection;
   }

   public function query($query, $data = array())
   {
      $con = $this->db_connect();
      $smt = $con->prepare($query);
      $check = $smt->execute($data);

      if ($check) {
         $result = $smt->fetchAll(PDO::FETCH_ASSOC);
         if (is_array($result) && count($result) > 0) {
            return $result;
         }
      }

      return false;
   }
}
// $db = new Database;
