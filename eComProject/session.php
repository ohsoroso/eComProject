<?php
   include "../inc/dbinfo.inc";
   session_start();
   $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

   if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

   $database = mysqli_select_db($connection, DB_DATABASE);
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($connection,"select username from admin where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['user_name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:authenticate.php");
      die();
   }
?>