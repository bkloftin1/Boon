<?php
  if (!defined('DB_SERVER')) {
   define('DB_SERVER', 'boon.cwjceqfbnobw.us-west-2.rds.amazonaws.com');
}
if (!defined('DB_USERNAME')) {
   define('DB_USERNAME', 'admin');
}
if (!defined('DB_PASSWORD')) {
   define('DB_PASSWORD', 'Ws!dw1ds');
}
if (!defined('DB_DATABASE')) {
   define('DB_DATABASE', 'Boon');
}
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>