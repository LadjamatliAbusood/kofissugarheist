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
if(isset($_POST['submit'])){
$num=$_POST['number'];
$msg="Your OTP is: ";
$uname="TR-MAHMU455986_FCIJD";
$apipass="]bv#dr(nsf";
$result = itexmo($num,$msg,$uname,$apipass);
if ($result == ""){
echo "iTexMo: No response from server!!!
Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
Please CONTACT US for help. ";	
}else if ($result == 0){
echo '<script> alert("Message Sent!") </script>';
}
else{	
echo "Error Num ". $result . " was encountered!";
}
}


if(isset($_POST['reject'])){
  $num=$_POST['number'];
  $msg=$_POST['message'];
 
  $result = itexmo($num,$msg,$uname,$apipass);
  if ($result == ""){
  echo "iTexMo: No response from server!!!
  Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
  Please CONTACT US for help. ";	
  }else if ($result == 0){
  echo '<script> alert("Message Sent!") </script>';
  }
  else{	
  echo "Error Num ". $result . " was encountered!";
  }
  }

  if(isset($_POST['pass'])){
    $number = $_POST["number"];
    $message = $_POST["message"];
  
  }

  
?>




<button id="myBtn">Open Modal</button>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form method="POST" action="item4.php">
	
<input type="text" name="number" placeholder="Number">
<br>
<input type="text" name="message"placeholder="text">
<br>

<input type="submit" name="submit" value="SEND">
<input type="submit" name="reject" value="reject">
<input type="submit" name="pass" value="PASS VALUE">




</form>
  </div>

</div>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>