



<?php include('include/home/header.php'); ?>
<form method="POST" action="itemuser.php">
		<div class="container">
			
                
                <div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
                        
                        <?php $item = $jim->getorder(); ?>
                        <?php while($row = mysqli_fetch_array($item)): ?>
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">ORDER INFORMATION</h3>
                                
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                <tr>
                                        <td class="text-right"><strong>Transaction Code :</strong></td>
                                        <td class="text-info" ><strong><?php echo $row['transacID'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Customer Full Name:</strong></td>
                                        <!--<td class="text-info"><strong><?php echo $row['name'];?></strong></td>-->
                                        <td><strong><?php echo $row['name']; ?><input type="hidden" name="Cname" value="<?php echo $row['name'];?>" /> 
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Birthday Description :</strong></td>
                                        <td class="text-info" ><strong><?php echo $row['desc'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Contact Number:</strong></td>
                                        <td><strong><?php echo $row['contact']; ?><input type="hidden" name="mobile" value="<?php echo $row['contact'];?>" /> 
                                        </strong>
                                        <td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Delivery Address:</strong></td>
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
                                        <td class="text-right"><strong>Total Amount:</strong></td>
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
                            </div>
                            </div>
                        
                        <?php endwhile; ?>
                                    </form>
  



<style>

strong    {color: black;}
</style>

