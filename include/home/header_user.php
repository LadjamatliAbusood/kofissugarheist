<?php include('db.php'); ?>





<?php session_start();
?>
<?php //print_r($_SESSION['cart']); ?>
<?php date_default_timezone_set('Asia/Manila'); ?>
<?php
    $jim = new Data();
    $countproduct = $jim->countproduct();
    
    $cat = $jim->getcategory();
    class Data {
        function countproduct(){
            $count = 0;
            $cart = isset($_SESSION['cart']) ? $_SESSION['cart']:array();
            foreach($cart as $row):
                if($row['qty']!=0){
                    $count = $count + 1;
                }
            endforeach;
            
            return $count;
        }
        function getcategory(){
        	global $conn;
            $result = mysqli_query($conn,"SELECT * FROM category");
            return $result;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Kofi’s Sugar Heist
Homemade Cakes and Pastries</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo1.png" />
   

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       

    <style>
        .navbar-inverse{
            background-color:#B4489B;border-color:#B4489B
        }
        .navbar-inverse .navbar-nav>li>a {
    color: #fff;
    
}
ul.sub-menu {

	background: #5a244d;

}
.mainmenu ul li a {
    color: #696763;
    font-family: 'Roboto', sans-serif;
    font-size: 20px;
    font-weight: 300;
    margin-top:5px;
    
    padding-bottom: 10px;

}

.navbar {
    border-radius: 1px;
}


.logo > img{
     position: absolute;
  left: -150px;
  top: -20px;
    width:80px;
    height:75px;
}
.badge {
 
    background-color: #FE980F;
    
}
.searchbox1 input {
    background: #f8f8f8;
    border: medium none;
    color: #000000;
    font-family: 'roboto';
    font-size: 12px;
    font-weight: 300;
    height: 35px;
    outline: medium none;
    padding-left: 10px;
    width: 395px;
    background-image: url(images/home/searchicon.png);
    background-repeat: no-repeat;
    background-position: 370px;
    margin-left:-100px;
}
h1{
    text-align:center;
    font-family: 'Roboto', sans-serif;
    color:#fe980f;
    text-transform: uppercase;
    font-weight: 700;
    
}
      </style>
</head><!--/head-->

<body>

		


		<div class="header-bottom navbar navbar-inverse"><!--header-bottom-->
       
			<div class="container">
          
				<div class="row">
               
           
					<div class="col-sm-9">
                        
                    
						<div class="navbar-header navbar-default">
                        <a href="#default" class="logo"><img src="images/logo1.png"></a>
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
                     
							<ul class="nav navbar-nav collapse navbar-collapse">
                           
								<li><a href="index_user.php">Home</a></li>
                              
								<li><a href="about.php">About Us</a></li> 
								<li><a href="contact.php">Contact</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <li><a href="home.php">Order Now</a></li> 
                                
                                    <ul role="menu" class="sub-menu">
                                        <?php
                                            $cat = $jim->getcategory();
                                            while($row = mysqli_fetch_array($cat)){
                                                echo '<li><a href="category_user.php?filter='.$row['title'].'">'.$row['title'].'</a></li>';
                                            }
                                        ?>
                             
                                    </ul>
                                </li>
								
                               
								
							</ul>
						</div>
					</div>
                    <div class="col-sm-3">
						<div class="searchbox1 pull-left">
                            <form action="index_user.php" method="post">
							     <input type="text" placeholder="Search" name="filter" />
                            </form>
						</div>
					</div>
				</div>
			</div>
            
		</div><!--/header-bottom-->
       
        <h1>Kofi’s Sugar Heist Homemade Cakes and Pastries  </h1>
        <br>
                                      
    
<?php date_default_timezone_set('Asia/Manila'); ?>
<?php
    $jim = new Admin();
    $p = isset($_GET['p']) ? $_GET['p'] : null;
    if($p == 'deliver'){
        $jim->deliver(); 
    }else if($p == 'paid'){
        $jim->paid();   
    }else if($p == 'delete'){
        $jim->delete();   
    }
    
    class Admin {
        
        function getunpaidorders(){
            global $conn;
                $q = "SELECT * FROM dbcake.order where status='unconfirmed' order by dateOrdered desc ";
                $result = mysqli_query($conn,$q);
            
                return $result;
        }
        function getunpaidorders2(){
            global $conn;
                $q = "SELECT * FROM dbcake.order where status='unconfirmed' order by dateOrdered desc LIMIT 1";
                $result = mysqli_query($conn,$q);
            
                return $result;
        }
        function getdeliveredorders(){
            global $conn;
            $q = "SELECT * FROM dbcake.order where status='Accepted' order by dateDelivered desc";
            //$q = "SELECT * FROM dbcake.order where status='confirmed' order by dateDelivered desc";
            $result = mysqli_query($conn,$q);
        
            return $result;

        }
        function getpaidorders(){
            global $conn;
                $q = "SELECT * FROM dbcake.order where status='confirmed' order by dateDelivered desc";
                $result = mysqli_query($conn,$q);
            
                return $result;
        }
        
        function getorder(){
            global $conn;
            $id = $_GET['id'];
            $q = "SELECT * FROM dbcake.order where id=$id";
            $result = mysqli_query($conn,$q);
            
            return $result;
        }
        
        function deliver(){
            global $conn;
            $date = date('m/d/y h:i:s A');
            $id = $_GET['id'];
            $q = "UPDATE dbcake.order set dateDelivered='$date', status='Accepted' where id=$id";
            mysqli_query($conn,$q);
            
            return true;
        }
        function paid(){
            global $conn;
            $id = $_GET['id'];
            $date = date('m/d/y h:i:s A');
            $q = "UPDATE dbcake.order set dateDelivered='$date', status='confirmed' where id=$id";
            mysqli_query($conn,$q);
            
            return true;
        }
        
        function getcategory(){
            global $conn;
            $q = "SELECT * from dbcake.category order by title asc";
            $result = mysqli_query($conn,$q);
            
            return $result;
        }
        function addcategory($cat){
            global $conn;
            $q = "INSERT INTO dbcake.category values('','$cat')";
            mysqli_query($conn,$q);
            return true;
        }
        
        function delete(){
            global $conn;
            $table = $_GET['table'];
            $id = $_GET['id'];
            //echo $q = "DELETE FROM dbcake.$table where id=$id";
            mysqli_query($conn,"DELETE FROM dbcake.$table where id=$id");
            return true;
        }
        
        function getcategorybyid($id){
            global $conn;
            $q = "Select * from dbcake.category where id=$id";
            $result = mysqli_query($conn,$q);
            if($row = mysqli_fetch_array($result)){
                $category = $row['title'];
            }
            return $category;
        }
        
        function updatecategory($cat,$id){
            global $conn;
            $q = "update dbcake.category set title='$cat' where id=$id";   
            mysqli_query($conn,$q);
            return true;
        }
    }
?>
