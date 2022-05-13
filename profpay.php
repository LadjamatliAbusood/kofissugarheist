<?php
include('db.php');
?>
<?php
session_start();
   if($_SESSION["id"]||$_SESSION["fname"] || $_SESSION["lname"] || $_SESSION["contact"] || $_SESSION["user_address"] || $_SESSION["user_email"] || $user_email) {
    
}
?>

<?php
$jim = new Admin();

class Admin {
        
 
    function getunpaidorders2(){
        global $conn;
            //$q = "SELECT * FROM dbcake.order where status='unconfirmed' order by dateOrdered desc LIMIT 1";
            $fname = $_SESSION['user_email'];
            //$id= $_SESSION["id"];
    
            $id = $_GET['id'];
            $q = "SELECT * FROM dbcake.order where id=$id";
            $result = mysqli_query($conn,$q);
            
            return $result;
    }


 
    
   
}

?>
</script>

<style type="text/css">
<!--


#content{
   	width: 100%;

   }
  
   #img_div{
   	width: 100%;
   	padding: 5px;
   	margin: 15px auto;
   
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   #img_div img{
   	float: left;
   	margin: 5px;
   	width: 400px;
   	height: 440px;
   }


-->
</style>


<form action="profpay.php" method="post" enctype="multipart/form-data" name="addproduct">

<?php

$item = $jim->getunpaidorders2(); ?>
<?php

    while ($row = mysqli_fetch_array($item)) {
      echo "<div id='img_div'>";
      	echo "<img src='reservation/img/".$row['imgUrl']."'>";
          
      
      echo "</div>";
    }
  ?>

 
</form>
