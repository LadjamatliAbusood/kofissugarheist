<?php include('include/home/header.php'); ?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
                    <table class="table table-bordered table-responsive">
                        <thead class="bg-primary">
                            <th>ITEM</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th>TOTAL</th>
                            <th>DELETE</th>
                        </thead>
                        <tbody>
                        <?php $total = 0; ?>
                        <?php $sum = 0; ?>
                      
                        <?php if(isset($_SESSION['cart'])){ ?>
                            <?php foreach($_SESSION['cart'] as $k=> $row): ?>
                                <?php if($row['qty'] != 0): ?>
                                    
                                <tr>
                                    <td class="text-center" ><strong><?php echo $row['product'];?></strong></td>
                                    <td class="text-center" ><?php echo $row['price'];?></td>
                                    <td class="text-center">
                                        <form action="cart/data.php?q=updatecart&id=<?php echo $row['proID'];?>&product=<?php echo $row['product'];?>" method="POST">
                                        <input type="number" name="qty" value="<?php echo $row['qty'];?>" min="0" style="width:50px;"/>
                                        <button type="submit" class="btn btn-info">Update</button>
                                        </form>
                                    </td>
                                    <?php  $sum += $row['qty']; ?> 
                                    <?php $itotal = $row['price'] * $row['qty']; ?>
                                    <td class="text-center"><font class="itotal"><?php echo $itotal; ?>.00</font></td>
                                    <td class="text-center"><a href="cart/data.php?q=removefromcart&&id=<?php echo $row['proID'];?>"><i class="fa fa-times-circle fa-lg text-danger removeproduct"></i></a></td>
                                </tr>
                               
                                
                                <?php $total = $total + $itotal;?>  
                                <?php endif;?>
                            <?php endforeach; ?> 
                            <?php //$vat = $total * 0.12;
                                        $orderOver = 1500;
                                        $dilfee = 50;
                                        $subtotal;
                                        if($total<=$dilfee){
                                            $subtotal = $total+$dilfee;
                                        }else{
                                            $subtotal = $total+$dilfee;
                                        }
                                        if ($total>=$orderOver){
                                            $subtotal = $dilfee = 0;
                                            $subtotal = $total;
                                        }                                     
                                
                                ?>
                             
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Sub Total</strong></td>
                                    <td colspan="2" class="text-primary" ><?php echo number_format($total,2) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Total Quantity</strong></td>
                                           
                                    <td colspan="2" class="text-primary" ><?php echo number_format($sum)?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Delivery Fee</strong></td>
                                    <td colspan="2" class="text-danger"><?php echo number_format($dilfee,2) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>TOTAL</strong></td>
                                    <td colspan="2" class="text-danger" ><strong><?php echo number_format($subtotal,2) ?></strong></td>
                                </tr>
                                <?php $_SESSION['totalprice'] = $subtotal;
                            
                            ?>  
                                        
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <a href="cart/data.php?q=emptycart" class="btn btn-danger btn-lg">Empty Cart</a>
                        <a href="#" class="btn btn-success btn-lg" data-toggle="modal" data-target="#checkout_modal" 
                        
                        <?php if($row["qty"] != 0) 
  {
     echo ' onclick="addtocart('.$row["proID"].')" ';
  }
  else
  {
       echo ' disabled=disabled ';
  }
?>>Check Out
                        </a>
                        
                        
                        
                       
                    </div>
                    
                    <?php }else{ ?>
                            <tr><td colspan="5" class="text-center alert alert-danger"><strong>*** Your Cart is Empty ***</strong></td></tr>
                            </tbody>
                        </table>
                    <?php } ?>
				</div>
			</div>
		</div>
	</section><!--/form-->

    
<?php include('include/home/modal.php'); ?>
<?php include('include/home/footer.php'); ?>
<style>
#form {
    display: block;
    margin-bottom: 85px;
    margin-top: 25px;
    overflow: hidden;
}

.bg-primary {
    background: #b4489b;
    padding: 5px;
    color: #fff;
}
    </style>

    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>