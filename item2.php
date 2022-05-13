
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
    
$num=$_POST['mobile'];
$msg="Your Cake purchase has been accepted";
$uname="TR-ABUSO797310_ARKKT";
$apipass="t)u4h25!s}";
$unID =$_POST['unID'];
$result = itexmo($num,$msg,$uname,$apipass,$unID);
if ($result == ""){
    header("location: order.php?error=itexmo: No response from server!!!
    Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
    Please CONTACT US for help.");
	
}else if ($result == 0){
    header ("location: order.php?p=deliver&&id=$unID");
    echo '<script> alert("Message Sent!") </script>';

}
else{	
echo "Error Num ". $result . " was encountered!";
}
}


if(isset($_POST['reject'])){
    
    $num=$_POST['mobile'];
    $msg="Sorry Your Cake purchase has been rejected";
    $uname="TR-ABUSO797310_ARKKT";
    $apipass="t)u4h25!s}";
    $unIDdelete = $_POST['unIDdelete'];
    $result = itexmo($num,$msg,$uname,$apipass,$unIDdelete);
    if ($result == ""){
        header("location: order.php?error=itexmo: No response from server!!!
        Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
        Please CONTACT US for help.");
        
    }else if ($result == 0){
        header ("location: order.php?p=delete&&table=order&&id=$unIDdelete");
        echo '<script> alert("Message Sent!") </script>';
       

    
    }
    else{	
    echo "Error Num ". $result . " was encountered!";
    }
    }

?>


<?php include('include/admin/header.php'); ?>
<form method="POST" action="item2.php">
		<div class="container">
			<div class="row">
                <?php include('include/admin/sidebar.php'); ?>
                <div class="col-sm-9 padding-right">
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
                                        <td class="text-right"><strong>Customer :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['name'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Birthday Description :</strong></td>
                                        <td class="text-info" ><strong><?php echo $row['desc'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Contact :</strong></td>
                                        <td><strong><?php echo $row['contact']; ?><input type="hidden" name="mobile" value="<?php echo $row['contact'];?>" /> 
                                        </strong>
                                        <td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Address :</strong></td>
                                        <td class="text-info" ><strong><?php echo $row['address'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Email :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['email'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Date Deliver :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['deliverDate'];?></strong></td>
                                    </tr>
                                  
                                    <tr>
                                        <td class="text-right"><strong>Date Ordered :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['dateOrdered'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Amount :</strong></td>
                                        <td class="text-danger"><strong><?php echo $row['amount'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Item(s) :</strong></td>
                                        <td class="text-primary"><strong><?php echo $row['item'];?></strong></td>
                                    </tr>
                                    <tr>
                                    <?php if($p == 'unconfirmed'){ ?>
                                        <td class="text-right" colspan="2" ><button class="btn btn-success" name="submit" >
                                        <input type="text" name="unID" hidden value="order.php?p=deliver&&id=<?php echo $row['id']; ?>">Accept</button>
                                     <button class="btn btn-danger" name="reject" > <input type="text" name="unIDdelete" hidden value="order.php?p=delete&&table=order&&id=<?php echo $row['id']; ?>" >Declined
                                     </button></td>
                                                       
                                    <?php }else if($p == 'delivered'){?>
                                        <td class="text-right" colspan="2"><a href="order.php?p=paid&&id=<?php echo $row['id']; ?>" class="btn btn-warning">Paid</a></td>
                                    <?php } ?>
                                        
                                    </tr>
                                </table>
                            </div>
                            </div>
                        
                        <?php endwhile; ?>
                                    </form>
  


<?php include('include/admin/footer.php'); ?>

<style>

a    {color: white;}
</style>

