<!-- Modal -->

<div class="modal fade" id="checkout_modal" role="dialog" >
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-shopping-cart text-success fa-lg"></i> Check Out<small class='text-primary'> Billing Information</small></h4>
      </div>
      <div class="modal-body">
      
        <form name="myForm" action="cart/data.php?q=checkout" method="POST" enctype="multipart/form-data">
        <div class="form-group">
   
                <label>Transaction code: </label>
            <input name="TransNum" class="form-control" value="<?php echo generateKey();?>" readonly>
              
                
            </div>
            <div class="form-group">
                <label>Firstname</label>
                <input type="text"  name="fname" class="form-control" value="<?php echo $_SESSION["fname"];?>" readonly>
                
               
            </div>
            <div class="form-group">
                <label>Lastname</label>
                <input type="text"   name="lname" class="form-control" placeholder="(ex. Dela Cruz)" value="<?php echo $_SESSION["lname"];?>" readonly> 
               
            </div>
            <div class="form-group">
                <label>Birthday Description(Optional)</label>
                <input type="text"   name="description" class="form-control" placeholder="(ex. Happy Birthday Juan)">
            </div>
            <div class="form-group">
                <label>Contact Number</label>
                <input type="number"  onInput="this.value = this.value.slice(0, 11)" name="contact"  class="form-control" value="<?php echo $_SESSION["contact"];?>" readonly>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email"  name="email" placeholder="(ex. Juan@gmail.com)" class="form-control" value="<?php echo $_SESSION["user_email"];?>" readonly>
              
            </div>
            <div class="form-group">
                <label>Complete Address</label>
                <input type="text"  name="address" class="form-control" value="<?php echo $_SESSION["user_address"];?>" readonly>
            </div>

            <div class="form-group">
                <label>Date to Deliver</label>
                <input type="date" name="deliverdate" class="form-control" required>
            </div>
            <div class="alert alert-info">
            <label>Mode of Payment</label> <strong>
                <select name="mod" id="mod" onchange="showDiv(this)">
                <option>--Choose Mode of Payment Here--</option>
  <option value="Cash on Delivery">Cash on delivery</option>
  <option value="Gcash">GCASH</option>
 
</select>
</br>

<div id="hidden_div" style="display:none;">
<label>Gcash Name: HACY HABING </br>
        Gcash Number: 0995596431</br>
</label>
    <input type="number"  onInput="this.value = this.value.slice(0, 11)" name="refno" class="form-control"  placeholder="Reference Number:" >
    <br>
    <label>Proof of Payment (ScreenShot) </br>
</label>
  
    <input type="file" name="imageFile" />
    
    

</div>
       
      </div>
      <div class="modal-footer">
    
                </strong>
                <div class="alert alert-warning">
                *** Please wait for our call/text or email for confirmation. Thank You! ***
            </div>  
            
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
        
          </form>
          

      </div>
    </div>
  </div>
</div>

</form>

<script type="text/javascript">
function showDiv(select){
   if(select.value=='Gcash'){
    document.getElementById('hidden_div').style.display = "block";
   } else{
    document.getElementById('hidden_div').style.display = "none";
   }
}

</script>




<?php
function generateKey(){
    $keylength = 11;
    $str = "1234567890abcdefghijklmnopqrstuvwxyz";
    $randStr = substr(str_shuffle($str), 0, $keylength);
    return $randStr;
}
    

?>

