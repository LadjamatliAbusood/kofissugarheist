<?php 

session_start();
date_default_timezone_set('Asia/Manila');
ini_set('display_errors', 1);
$jim = new Shopping();
$q = $_GET['q'];
if(!isset($_SESSION['cart'])){
    
    $_SESSION['cart'] = array(); 
    $_SESSION['proID'] = 0;
}
if($q == 'addtocart'){
    $product = $_POST['product'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $jim->addtocart($product,$price,$qty);
}else if($q == 'emptycart'){
    unset($_SESSION['cart']); 
    unset($_SESSION['proID']); 
    header("location:../cart.php");
}else if($q == 'removefromcart'){
    $id = $_GET['id'];
    $jim->removefromcart($id);
}else if($q == 'updatecart'){
    $id = $_GET['id'];
    $qty = $_POST['qty'];
    $product = $_GET['product'];
    $jim->updatecart($id,$qty,$product);
}else if($q == 'countcart'){
    $jim->countcart();
}else if($q == 'countorder'){
    $jim->countorder();
}else if($q == 'countproducts'){
    $jim->countproducts();
}else if($q == 'countcategory'){
    $jim->countcategory();
}else if($q == 'checkout'){
    $jim->checkout();
}else if($q == 'verify'){
    $jim->verify();   
}
/*$_SESSION['cart'];
$product = 'product101';
$price ='300';
$jim->addtocart($product, $price);*/
class Shopping {
    private $conn;
   public function __construct() {
    include('../db.php');
    $this->conn = $conn;
    }
    function addtocart($product, $price, $qty){
        $cart = array(
            'proID' => $_SESSION['proID'],    
            'product' => $product,
            'price' => $price,
            'qty' => $qty
        );
        if(!isset($_SESSION['cart'][$product]))
            $_SESSION['cart'][$product]= $cart;
        else
             $_SESSION['cart'][$product]['qty'] +=1; 
        $_SESSION['proID'] = $_SESSION['proID'] + 1;
        
        return true;
    }
    
    function removefromcart($id){        
        $_SESSION['cart'][$id]['qty'] = 0;
        //print_r($_SESSION['cart'][$id]['qty']);
        header("location:../cart.php");
       
    }
    
    function updatecart($id,$qty,$product){
        $_SESSION['cart'][$product]['qty'] = $qty;
       
        
       header("location:../cart.php");
    }
    
    function countcart(){
        $count = 0;
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart']:array();
        foreach($cart as $row):
            if($row['qty']!=0){
                $count = $count + $row['qty'];
            }
                        
        endforeach;

        echo $count;   
    }
    function countorder(){
        $q = "select * from dbcake.order where status='unconfirmed'";
        $result = mysqli_query($this->conn,$q);
        echo mysqli_num_rows($result);
    }
    function countproducts(){
        $q = "select * from dbcake.products";
        $result = mysqli_query($this->conn,$q);
        echo mysqli_num_rows($result);
    }
    function countcategory(){
        $q = "select * from dbcake.category";
        $result = mysqli_query($this->conn,$q);
        echo mysqli_num_rows($result);
    }
    function checkout(){
        include('../db.php');
        $fname = $_POST['fname'];   
        $lname = $_POST['lname'];
        $desc = $_POST['description'];
        $contact = $_POST['contact'];   
        $email = $_POST['email'];   
        $address = $_POST['address'];
        $dateDel = $_POST['deliverdate'];
        $mod = $_POST['mod'];
        $refno = $_POST['refno'];
        $fullname = $fname.' '.$lname;
        $date = date('m/d/y h:i:s A');
        $transacID = $_POST['TransNum'];
   
        $item = '';
        
        
      $amount = $_SESSION['totalprice'];
    //$amount = $_POST[$subtotal];
    $image = $_FILES['imageFile']['name'];
    $target = "../reservation/img/".basename($image);
  
        foreach($_SESSION['cart'] as $row):  
            if($row['qty'] != 0){
                $product = '('.$row['qty'].') '.$row['product'];
                $item = $product.', '.$item;
    
                
            }
        endforeach;

 
        echo $q = "INSERT INTO dbcake.order VALUES (NULL,'$transacID', '$fullname',  '$desc', '$contact', '$address', '$email','$dateDel', '$item','$mod','$refno', '$amount', 'unconfirmed', '$date', '','$image')";
        mysqli_query($this->conn,$q);
            unset($_SESSION['cart']); 
            header("location:../success.php");

        if (move_uploaded_file($_FILES['imageFile']['tmp_name'], $target)) {
            
    echo '<script> 
            alert("Image uploaded successfully");
    
            </script>';


        } 
        else{
         
            echo '<script> 
            alert("Failed to upload image");
    
            </script>';
        } 

    }
    
    function verify(){
        $username = $_POST['username'];   
        $password = $_POST['password'];   
        
        $q = "SELECT * from dbcake.user where username='$username' and password='$password'";
        $result = mysqli_query($this->conn,$q);
        $_SESSION['login']='yes';
        echo mysqli_num_rows($result);
    }
}

?>