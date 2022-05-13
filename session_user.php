<?php
     $servername='localhost';
     $username='root';
     $password='';
     $dbname = "dbcake";
     $db=mysqli_connect($servername,$username,$password,"$dbname");
     if(!$db){
        die('Could not Connect My Sql:' .mysql_error());
     }
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select fname,lname,contact,user_address,user_email from tb_member where user_email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   

   $login_fname = $row['fname'];
   $login_lname = $row['lname'];
   $login_contact = $row['contact'];
   $login_user_address = $row['user_address'];
   $login_session = $row['user_email'];

   
   if(!isset($_SESSION['login_user'])){
      header("location:home.php");
      die();
   }
?>