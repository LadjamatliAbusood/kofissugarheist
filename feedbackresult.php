<?php include('include/admin/header.php'); ?>


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

$q = "SELECT * FROM feedback ORDER BY TransacCode DESC  ";
                $result = mysqli_query($conn,$q);

?>

	
	<section>
		<div class="container">
			<div class="row">
			<?php include('include/admin/sidebar.php'); ?>

			<form method="POST" action="feedbackresult.php">
		<div class="container">
			
                
                <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Customer Feedback</h2>    
                        <?php while($row = mysqli_fetch_array($result)): ?>
                        
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Order Feedback</h3>
                                
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                <tr>
                                        <td class="text-right"><strong>Transaction Code :</strong></td>
                                        <td class="text-info" ><strong><?php echo $row['TransacCode'];?></strong></td>
                                    </tr>
                                 
                                   
                                    <tr>
                                        <td class="text-right"><strong>Date to Delivered :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['DateDelivered'];?></strong></td>
                                    </tr>
                                
                                    <tr>
                                        <td class="text-right"><strong>Purchase Item(s) :</strong></td>
                                        <td class="text-primary"><strong><?php echo $row['Items'];?></strong></td>
                                    </tr>

                                    <tr>
                                        <td class="text-right"><strong>Messages :</strong></td>
                                        <td class="text-primary"><strong><?php echo $row['Msge'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Rate :</strong></td>
                                        <td class="text-primary"><strong><?php echo $row['Rate'];?> Star</strong></td>
                                    </tr>
                                   
                                </table>
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