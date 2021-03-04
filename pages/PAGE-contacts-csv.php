<?php
// (A) HTTP CSV HEADERS
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"export.csv\""); 

// (B) GET CONTACTS FROM DATABASE + DIRECT OUTPUT
$_CORE->exec("SELECT * FROM `address_book`");
while ($row = $_CORE->stmt->fetch()) {
  echo implode(",", [$row['name_first'], $row['name_last'], $row['email'], $row['tel_work'], $row['tel_home'], $row['tel_mob'], $row['address']]);
  echo "\r\n";
}