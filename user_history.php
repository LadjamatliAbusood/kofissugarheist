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
  
// SQL query to select data from database

//$q = "SELECT * FROM order WHERE email='$login_session'";
$fname = $_SESSION['user_email'];
$q = "SELECT * FROM dbcake.order where email='$fname'";
                $result = mysqli_query($conn,$q);

?>

	
	<section>
		<div class="container">
			<div class="row">
			<?php include('include/home/profile_sidebar.php'); ?>

			<form method="POST" action="user_history.php">
		<div class="container">
			
                
                <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">PURCHASE HISTORY</h2>    
                        <?php while($row = mysqli_fetch_array($result)): ?>
                        
                            <div class="panel panel-default">
                         
                            <div class="panel-body">
                                <table class="table" id="printTable">
                            
                                    
                                <tr>
                                        <td class="text-right"><strong>Transaction Code :</strong></td>
                                        
                                        <td class="text-info" ><strong><?php echo $row['transacID']; ?> </strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Customer Full Name:</strong></td>
                                        <!--<td class="text-info"><strong><?php echo $row['name'];?></strong></td>-->
                                        <td><strong><?php echo $row['name']; ?> 
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Birthday Description :</strong></td>
                                        <td class="text-info" ><strong><?php echo $row['desc'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Contact Number:</strong></td>
                                        <td><strong><?php echo $row['contact']; ?> 
                                        </strong>
                                        <td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong> Delivery Address:</strong></td>
                                        <td class="text-info" ><strong><?php echo $row['address'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Email Address:</strong></td>
                                        <td class="text-info"><strong><?php echo $row['email'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Date to Delivered :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['deliverDate'];?></strong></td>
                                    </tr>
                                  
                                    <tr>
                                        <td class="text-right"><strong>Date Ordered :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['dateOrdered'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Total Amount :</strong></td>
                                        <td class="text-danger"><strong> ₱ <?php echo $row['amount'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Mode of payment :</strong></td>
                                        <td class="text-primary"><strong><?php echo $row['mod'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Reference Number :</strong></td>
                                        <td class="text-primary"><strong><?php echo $row['refno'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Purchase Item(s) :</strong></td>
                                        <td class="text-primary"><strong><?php echo $row['item'];?></strong></td>
                                    </tr>
                                 
                                    <tr>
                                        <td class="text-right"><strong>Proof of Payment (Screenshot) :</strong></td>
                                        <td class="text-primary"><strong><a  rel="facebox" href="profpay.php?id=<?php echo $row['id']?>"><?php echo $row['imgUrl'];?><a></strong></td>
                                        
                                    </tr>
                        
                                </table>
                                 
                                <button class="btn btn-info">Print me</button>
                            </div>
                            </div>
                        
                        <?php endwhile; ?>
                                    </form>
  
		</div>
		</div>
	</section>
	
	<?php include('include/home/footer.php'); ?>
	<style>

strong    {color: black;}
</style>

<script>
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>