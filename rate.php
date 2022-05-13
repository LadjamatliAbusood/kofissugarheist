

<script>
function rate(){
    alert("thank you for rating us");
   
}
  </script>


<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "dbcake";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}

if(isset($_POST['submit']))
{	 
	 $Tcode = $_POST['tcode'];
	 $Ddeliver = $_POST['ddate'];
	 $Items = $_POST['items'];
	 $Message = $_POST['message'];
   $Rate = $_POST['rate2'];
	 $sql = "INSERT INTO feedback (TransacCode,DateDelivered,Items,Msge,Rate)
	 VALUES ('$Tcode','$Ddeliver','$Items','$Message','$Rate')";
	 if (mysqli_query($conn, $sql)) {
		echo'<script> 
    alert("Thank you for rating us");
    window.location.href = "index.php";
    </script>';
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}


?>


<?php include('include/home/header.php'); ?>
<form action="rate.php" method="POST" >
		<div class="container">
			
                
                <div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
                        
                        <?php $item = $jim->getorder(); ?>
                        <?php while($row = mysqli_fetch_array($item)): ?>
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Feedback</h3>
                                
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                <tr>
                                        <td class="text-right"><strong>Transaction Code :</strong></td>
                                        <td class="text-info" ><strong><?php echo $row['transacID'];?>
                                        <input type="hidden" name="tcode" value="<?php echo $row['transacID'];?>" /> </strong></td>
                                    </tr>
 
                                    <tr>
                                        <td class="text-right"><strong>Date Delivered :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['deliverDate'];?>
                                        <input type="hidden" name="ddate" value="<?php echo $row['deliverDate'];?>" /></strong></td>
                                    </tr>

                                  
                                   
                                    <tr>
                                        <td class="text-right"><strong>Purchase Item(s) :</strong></td>
                                        <td class="text-primary"><strong><?php echo $row['item'];?>
                                        <input type="hidden" name="items" value="<?php echo $row['item'];?>" /></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Message :</strong></td>
                                        <td class="text-primary"><strong>
                                        <div class="form-group col-md-12">
				                <textarea name="message" id="message"  class="form-control" rows="5" placeholder="Your Message Here"></textarea>
				            </div>
                                        </strong></td>
                                    </tr>

                                    <tr>
                                        <td class="text-right"><strong>Rate us :</strong></td>
                                        <td class="text-primary"><strong>                          
                                           <fieldset class="rate" name="rate">
                           
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
                           
                         </fieldset></strong></td>
                                    </tr>

                                    <tr>                   
                                   
                                        <td class="text-right" colspan="2">
                                        <button class="btn btn-success" name="submit">submit</button>
                                    </td>
                                    
                                        
                                    </tr>
                                </table>
                            </div>
                            </div>
                        
                        <?php endwhile; ?>
                                    </form>
  
  


<?php include('include/admin/footer.php'); ?>

<style>

@import url("//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css");

/* Basic styles */

.rate {
  display: inline-block;
  margin: 0;
  padding: 0;

  border: none;
}

input {
    
  display: none;
}

label {
    
  float: right;
  font-size: 0;
  color: #d9d9d9;
}

label:before {
  content: "\f005";
  font-family: FontAwesome;
  font-size: 30px;
}

label:hover,
label:hover ~ label {
  color: #fcd000;
  transition: 0.2s;
}

input:checked ~ label {
  color: #fcd000;
}

input:checked ~ label:hover,
input:checked ~ label:hover ~ label {
  color: #fcd000;
  transition: 0.2s;
}


/* Half-star*/

.star-half {
  position: relative;
}

.star-half:before {
  position: absolute;
  content: "\f089";
  padding-right: 0;
}
strong    {color: black;}
</style>

