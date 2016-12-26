<?php
  $db = mysqli_connect('127.0.0.1', 'root', '', 'laden');
  if(mysqli_connect_errno()) {
    echo 'connection is failed: '.mysqli_connect_error();
    die();
  }

  define('BASEURL', '/ecommerce/');
?>
