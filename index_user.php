
<?php include('include/home/header_user.php'); ?>
    	<section>
		<div class="container">
			<div class="row">
				<?php include('include/home/sidebar_user.php'); ?>

                    
    <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">All Products</h2>

	
<!--php starts here-->
<?php				
				//$filter = isset($_POST['filter']) ? $_POST['filter'] : '';
				if(isset($_POST['filter']))
				{
					$filter = $_POST['filter'];
					$result = mysqli_query($conn,"SELECT * FROM products where Product like '%$filter%' or Description like '%$filter%' or Category like '%$filter%'");
                    
				}
				else
				{
					$result = mysqli_query($conn,"SELECT * FROM products");
                }
					
				if($result){				
				while($row=mysqli_fetch_array($result)){
					
				$prodID = $row["ID"];	
					echo '<ul class="col-sm-4">';
					echo '<div class="product-image-wrapper">
						  <div class="single-products">
						  <div class="productinfo text-center">
						  <br>
					<a href="product-details.php?prodid='.$prodID.'" rel="bookmark" title="'.$row['Product'].'"><img src="reservation/img/products/'.$row['imgUrl'].'" alt="'.$row['Product'].'" title="'.$row['Product'].'" width="150" height="150" /></a>
                    </a>
					
					<h2><a href="product-details.php?prodid='.$prodID.'" rel="bookmark" title="'.$row['Product'].'">'.$row['Product'].'</a></h2>
					
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
					<h2>₱'.$row['Price'].'</h2>
					<p>Category: '.$row['Category'].'</p>
					
					<a href="product-details-user.php?prodid='.$prodID.'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a>
			
					</div>';
							
					echo '</ul>';
					
								
				}
				}
				?>
				

<!--php ends here-->
		</div>
        </div>
</div>
</div>
</div>
</section>



<?php include('include/home/footer.php'); ?>

<link href="css/star.css" rel="stylesheet">
<style>

a {
    color: #b4489b;
    text-decoration: none;
}

.add-to-cart {
    background: #b4489b;
    color: #ffffff;
}
.product-image-wrapper {
 
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 10px 10px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	
}
	</style>