<?php
	include("db.php");
	
	$prodID = $_GET['prodid'];

	if(!empty($prodID)){
		$sqlSelectSpecProd = mysqli_query($conn,"select * from products where id = '$prodID'") or die(mysqli_error());
		$getProdInfo = mysqli_fetch_array($sqlSelectSpecProd);
		$prodname= $getProdInfo["Product"];
		$prodcat = $getProdInfo["Category"];
		$prodprice = $getProdInfo["Price"];
		$proddesc = $getProdInfo["Description"];
		$prodimage = $getProdInfo["imgUrl"];
				}
?>
<?php include('include/home/header.php'); ?>
	
	<section>
		<div class="container">
			<div class="row">
				<?php include('include/home/sidebar.php'); ?>
				
                
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
                            
							<br>
							<img src="reservation/img/products/<?php echo $prodimage; ?>" />	
                                
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
							
							<h2 class="product"><?php echo $prodname; ?></h2>
							<fieldset class="rate">
  <input id="rate2-star5" type="radio" name="rate2" value="5" />
  <label for="rate2-star5" title="Awesome">5</label>

  <input id="rate2-star5-half" type="radio" name="rate2" value="4.5" />
  <label class="star-half" for="rate2-star5-half" title="Excellent">4.5</label>

  <input id="rate2-star4" type="radio" name="rate2" value="4" />
  <label for="rate2-star4" title="Very good">4</label>

  <input id="rate2-star3-half" type="radio" name="rate2" value="3.5" />
  <label class="star-half" for="rate2-star3-half" title="Good">3.5</label>

  <input id="rate2-star3" type="radio" name="rate2" value="3" />
  <label for="rate2-star3" title="Satisfactory">3</label>

  <input id="rate2-star2-half" type="radio" name="rate2" value="2.5" />
  <label class="star-half" for="rate2-star2-half" title="Unsatisfactory">2.5</label>

  <input id="rate2-star2" type="radio" name="rate2" value="2" />
  <label for="rate2-star2" title="Bad">2</label>

  <input id="rate2-star1-half" type="radio" name="rate2" value="1.5" />
  <label class="star-half" for="rate2-star1-half" title="Very bad">1.5</label>

  <input id="rate2-star1" type="radio" name="rate2" value="1" />
  <label for="rate2-star1" title="Awful">1</label>

  <input id="rate2-star0-half" type="radio" name="rate2" value="0.5" />
  <label class="star-half" for="rate2-star0-half" title="Horrific">0.5</label>
</fieldset>
							<p><b>Category:</b>  <span class="category"><?php echo $prodcat; ?></span></p>
							
							
								<p><b>Price:  ₱</b> <span class="price"><?php echo $prodprice; ?>.00</span></p>
								
								<p><b>Description: </b><span><?php echo $proddesc; ?></span></p>
								<br>
                                
                                <a class="btn btn-default add-to-cart" id="add-to-cart" ><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                <p class="info hidethis" style="color:red;"><strong>Product Added to Cart!</strong></p>
					<br>
						
								<p><b>Contact Info:</b> +63 9651 179 7310</p>
								<p><b>Email:</b> KofiSugar@gmail.com</p>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
				</div>
			</div>
		</div>
		</div>
	</section>
	
	
	<?php include('include/home/footer.php'); ?>

	<link href="css/star.css" rel="stylesheet">

	<style>
.add-to-cart {
    background: #b4489b;
    color: #ffffff;
}

.product-details {
 
 background-color: #fff;
 border-radius: 10px;
   box-shadow: 0 10px 10px rgba(0,0,0,0.25), 
		 0 10px 10px rgba(0,0,0,0.22);
 position: relative;
 overflow: hidden;
 width: 768px;
 max-width: 100%;
 
}
.product-information {
    border: #fff;
    overflow: hidden;
    padding-bottom: 60px;
    padding-left: 60px;
    padding-top: 60px;
    position: relative;
}
		</style>

