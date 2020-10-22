<?php
   include __DIR__ . DIRECTORY_SEPARATOR .  'db.php';
   session_start();

   $user_check = $_SESSION['email'];
   
   $sql = mysqli_query($db," select * from users where email = '$user_check' ") or die( mysqli_error($db));
   //$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
   $_SESSION['email'];
   if(!isset($_SESSION['email'])){
      header("location:login.php");
      die();
   }
?>