
<?php
  function itexmo($number,$message,$apicode,$passwd)
  {
  
    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
    $param = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($itexmo),
      ),
    );
    $context  = stream_context_create($param);
    return file_get_contents($url, false, $context);
  
  }

        ?>
    
    <?php

   session_start();
   
   if(count($_POST)>0) {
	   $con = mysqli_connect('localhost','root','','dbcake') or die('Unable To connect');
	   $result = mysqli_query($con,"SELECT * FROM tb_member WHERE user_email='" . $_POST["user_name"] . "' and user_password = '". $_POST["password"]."'");
	   $row  = mysqli_fetch_array($result);
	   if(is_array($row)) {
	   $_SESSION["id"] = $row['id'];
	   $_SESSION["fname"] = $row['fname'];
	   $_SESSION["lname"] = $row['lname'];
	   $_SESSION["contact"] = $row['contact'];
	   $_SESSION["user_address"] = $row['user_address'];
	   $_SESSION["user_email"] = $row['user_email'];

	 
	    
	   } else {
		echo '<script> 
		alert("Invalid Username or Password!");
		</script>';
		
	   }
   }
   if(isset($_SESSION["id"])) {
   header("Location:index.php");
   }

	   
   



?>









<h2>Delivery fee start at 50php within ZAMBOANGA CITY. <br/> Free motorbike delivery for orders over 1500php.</h2>
<div class="container" id="container">

	<div class="form-container sign-in-container">
		<form action = "" method = "post">
			<h1>LOGIN</h1>
	
			<input type="email" name="user_name" placeholder="Email" />
			<input type="password" name="password"placeholder="Password" />
			<button name="btnlogin">log In</button>
			<p>Forgot password?</p>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
            <img src="images/CupcakeLogo.png" width="120" height="120"><br>
				<h1>Hola, Amigas con Amigos!</h1>
				<p>Kofi's Sugar Heist Homemade Cakes and Pastries are ready to serve.</p>
				<button class="ghost" id="signUp"  onClick="document.location.href='homesignup.php'">Sign Up</button>
			</div>
		</div>
	</div>
</div>






		


<style>
	
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	background: #fff;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 80vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
	
}

h2 {
	text-align: center;
}
#idH1 h2 {
	text-align: center;
	margin-top: 420px;
	
}
p {
	font-size: 16px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}


button {
	border-radius: 20px;
	border: 1px solid #FE980F;
	background-color: #FE980F;
	color: #FFFFFF;
	font-size: 15px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	margin-top:20px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}



form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 15px 15px;
	margin: 8px 0;
	width: 100%;
	size:19px;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	background: #FF416C;
	background: -webkit-linear-gradient(to right, #B4489B, #B4489B);
	background: linear-gradient(to right, #B4489B, #B4489B);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}

.social-container {
	margin: 20px 0;
}





	</style>

	
