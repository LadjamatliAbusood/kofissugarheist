<?php include('include/home/header.php'); ?>


<?php


$servername='localhost';
$username='root';
$password='';
$dbname = "dbcake";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
if(isset($_POST['submit'])){	
    
    $id= $_SESSION["id"];
    $fname = $_POST['fname'];   
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];   
    $email = $_POST['email_address'];   
    $address = $_POST['address'];

      
        
    
        $q = "UPDATE tb_member SET fname='$fname',lname='$lname',contact='$contact',user_address='$address',user_email='$email' WHERE  id ='$id'";
                    $result = mysqli_query($conn,$q);
    
            echo'<script> 
        alert("Profile Updated. Please login again");
        window.location.href = "logout_user.php";
        </script>';

    
   

}


?>

	
	<section>
		<div class="container">
			<div class="row">
			<?php include('include/home/profile_sidebar.php'); ?>

			<form method="POST" action="user_profile.php">
		<div class="container">
			
                
                <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">UPDATE PROFILE</h2>    
                     
             
                            <div class="panel panel-default">
                          
                            <div class="panel-body">
                                <table class="table">
                                <tr>
                                        <td class="text-right"><strong>First Name :</strong></td>
                                        <td class="text-info" ><strong><input type="text"  name="fname" class="form-control" value="<?php echo $_SESSION["fname"];?>" required></td>
                                    </tr>
                                 
                                   
                                    <tr>
                                        <td class="text-right"><strong>Last Name :</strong></td>
                                        <td class="text-info"><strong><input type="text"  name="lname" class="form-control" value="<?php echo$_SESSION["lname"];?>" required></td>
                                    </tr>
                                
                                    <tr>
                                        <td class="text-right"><strong>Contact Number :</strong></td>
                                        <td class="text-primary"><input type="text"  name="contact" class="form-control" value="<?php echo $_SESSION["contact"];?>"required></td>
                                    </tr>

                                    <tr>
                                        <td class="text-right"><strong>Complete Address :</strong></td>
                                        <td class="text-primary"><input type="text"  name="address" class="form-control" value="<?php echo $_SESSION["user_address"];?>"required></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Email  Address:</strong></td>
                                        <td class="text-primary"><input type="text"  name="email_address" class="form-control" value="<?php echo $_SESSION["user_email"];?>"required></td>
                                    </tr>
                                    <tr>                   
                                   
                                        <td class="text-right" colspan="2">
                                        <button class="btn btn-success" name="submit">Update</button>
                                    </td>
                                    
                                        
                                    </tr>
                                </table>
                                
                            </div>
                           
                            </div>
                        
                       
                                    </form>
  
  
		</div>
		</div>
	</section>
	
	<?php include('include/home/footer.php'); ?>
	<style>

strong    {color: black;}
</style>