
<?php include('include/home/header.php'); ?>

<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function

    $query = "SELECT * FROM dbcake.order WHERE CONCAT( `id` , `transacID`, `status` ) LIKE '%".$valueToSearch."%' AND STATUS = 'Unconfirmed'";
    $search_result = filterTable($query);
    
    
}
 else {
    $query = "SELECT * FROM dbcake.order where status='Unconfirmed' order by dateDelivered desc limit 0;";
  

    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "dbcake");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}




if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function

    $query = "SELECT * FROM dbcake.order WHERE CONCAT( `id` , `transacID`, `status` ) LIKE '%".$valueToSearch."%' AND STATUS = 'Accepted'";
    $search_result2 = filterTable2($query);

    
}
 else {
    $query = "SELECT * FROM dbcake.order where status='Accepted' order by dateDelivered desc limit 0";
  

    $search_result2 = filterTable2($query);
}

// function to connect and execute the query
function filterTable2($query)
{
    $connect = mysqli_connect("localhost", "root", "", "dbcake");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}



if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function

    $query = "SELECT * FROM dbcake.order WHERE CONCAT( `id` , `transacID`, `status` ) LIKE '%".$valueToSearch."%' AND STATUS = 'confirmed'";
    $search_result3 = filterTable3($query);

    
}
 else {
    $query = "SELECT * FROM dbcake.order where status='Accepted' order by dateDelivered desc limit 0";
  

    $search_result3 = filterTable3($query);
}

// function to connect and execute the query
function filterTable3($query)
{
    $connect = mysqli_connect("localhost", "root", "", "dbcake");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<form action="trace2.php" method="post"    >


<section >
		<div class="container">
			<div class="row" >
            <?php include('include/home/profile_sidebar.php'); ?>
                <div class="col-sm-9 padding-right" >
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Trace MY Cake</h2>
                        

                       <input type="text"  id="myInput" name="valueToSearch" placeholder="Enter 11 digit Transaction code"  ><button  name="search">Search</button>
            <!-- <input type="submit"   value="Filter" > -->
            <br><br>
                           
      
            
                                                               					
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#data1" role="tab" data-toggle="tab">Pending</a></li>
  <li><a href="#data2" role="tab" data-toggle="tab">To Recieve</a></li>
  <li><a href="#data3" role="tab" data-toggle="tab">Completed</a></li>
</ul>

<!-- Tab panes -->

<div class="tab-content" >

    <div class="tab-pane active" id="data1" >
    
        <table class="table table-bordered" id="myTable" >
            <thead class="bg-primary1">
            
                    <th>Transaction Code</th>
                    <th> Customer Name</th>
                    <th>Item</th>
                    <th>Cancel Order</th>
                   
            </thead>
            <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr> 
                    
                    <td><?php echo $row['transacID'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td class="text-center"><a href="itemuser.php?id=<?php echo $row['id']?>&&p=unconfirmed" target="_blank"><i class="fa fa-external-link"></i> View Item</a></td>
                    <td class="text-center">
                    <a href="trace2.php?p=delete&&table=order&&id=<?php echo $row['id']; ?>" class="btn btn-danger">Cancel</a></td>
                    
                </tr>
                <?php endwhile;?>
        </table>
    </div>
    <div class="tab-pane" id="data2" >
        <table class="table table-bordered" id="myTable2">
            <thead class="bg-primary1">
            <th>Transaction Code</th>
            <th>Status</th>
                <th>Date to Deliver</th>
                <th>Customer Name</th>
                <th>Item</th>
                
            </thead>
             <?php while($row = mysqli_fetch_array($search_result2)):?>
                <tr>
                <td class="text-center"><?php echo $row['transacID']; ?></td>
                <td class="text-center"><?php echo $row['status']; ?></td>
                    <td class="text-center"><?php echo $row['deliverDate']; ?></td>
                    
                    <td><?php echo $row['name']; ?></td>
                    <td class="text-center"><a href="itemuser.php?id=<?php echo $row['id']?>&&p=delivered" target="_blank"><i class="fa fa-external-link"></i> View Item</a></td>
                    
                </tr>
                <?php endwhile;?>
        </table>
    </div>
    <div class="tab-pane" id="data3">
        <table class="table table-bordered " id="myTable3">
            <thead class="bg-primary1">
            <th>Transaction Code</th>
                <th>Date Delivered</th>
                <th>Customer Name</th>
                <th>Item</th>
                <th>Rate Us</th>
            </thead>
            <?php while($row = mysqli_fetch_array($search_result3)):?>
                <tr>
                <td class="text-center"><?php echo $row['transacID']; ?></td>
                    <td class="text-center"><?php echo $row['dateDelivered']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td class="text-center"><a href="itemuser.php?id=<?php echo $row['id']?>" target="_blank"><i class="fa fa-external-link"></i> View Item</a></td>
                    <td class="text-center"><a href="rate.php?id=<?php echo $row['id']?>" > Feedback</a></td>                       
                </tr>
                <?php endwhile;?>
        </table>
    </div>
</div>
              </section>
            </form>
            
<style>
     .bg-primary1{
                      color: #ffffff;
                      background :#B4489B
                  }
    </style>

<br><br><br><br><br><br><br><br><br>
<?php include('include/home/footer.php'); ?>

<style>
    #myInput {
 

  width: 90%; /* Full-width */
  font-size: 15px; /* Increase font-size */
  padding: 10px 5px 12px 10px; /* Add some padding */
  border: 1px solid #B4489B; /* Add a grey border */

  margin-bottom: 12px; /* Add some space below the input */
}
button {
    font-family: 'Roboto', sans-serif;
    margin-left: 1px;
    height: 46px;
    width: 76px;
    background: #FE980F;
    color: #ffffff;
    border: 1px solid #ddd; /* Add a grey border */
    
    font-size: 15px;
    -webkit-appearance: none;
}
    </style>



