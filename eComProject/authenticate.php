<?php include "../inc/dbinfo.inc"; ?>
<?php
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  
     if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
  
     $database = mysqli_select_db($connection, DB_DATABASE);
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($connection,$_POST['user_name']);
      $mypassword = mysqli_real_escape_string($connection,$_POST['password']); 
      
      $sql = "SELECT uid FROM userbase WHERE user_name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>