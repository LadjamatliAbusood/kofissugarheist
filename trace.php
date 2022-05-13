
<?php include('include/home/header.php'); ?>





<section >
		<div class="container">
			<div class="row" >
            <br>
                <div class="col-sm-12 padding-right" >
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Trace MY Cake</h2>
                        

                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter 11 digit Transaction code..">
                           
                        

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
               
                <th>Customer Name</th>
                <th>Item</th>
                <th>Cancel Order</th>
            </thead>
            <?php $unpaid = $jim->getunpaidorders(); ?>
            <?php while($row = mysqli_fetch_array($unpaid)){ ?>
                
                <tr >
                    <td class="text-center"><?php echo $row['transacID']; ?></td>
                    
                    <td><?php echo $row['name']; ?></td>
                    <td class="text-center"><a href="itemuser.php?id=<?php echo $row['id']?>&&p=unconfirmed" target="_blank"><i class="fa fa-external-link"></i> View Item</a></td>
                    <td class="text-center">
                    <a href="trace.php?p=delete&&table=order&&id=<?php echo $row['id']; ?>" class="btn btn-danger">Cancel</a></td>
                 
            <?php } ?>
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
            <?php $delivered = $jim->getdeliveredorders(); ?>
            <?php while($row = mysqli_fetch_array($delivered)){ ?>
                <tr>
                <td class="text-center"><?php echo $row['transacID']; ?></td>
                <td class="text-center"><?php echo $row['status']; ?></td>
                    <td class="text-center"><?php echo $row['deliverDate']; ?></td>
                    
                    <td><?php echo $row['name']; ?></td>
                    <td class="text-center"><a href="itemuser.php?id=<?php echo $row['id']?>&&p=delivered" target="_blank"><i class="fa fa-external-link"></i> View Item</a></td>
                    
                </tr>
                <?php } ?>
        </table>
    </div>
    <div class="tab-pane" id="data3">
        <table class="table table-bordered " id="myTable3">
            <thead class="bg-primary1">
            <th>Transaction Code</th>
                <th>Date Delivered</th>
                <th>Customer Name</th>
                <th>Item</th>
            </thead>
            <?php $paid = $jim->getpaidorders(); ?>
            <?php while($row = mysqli_fetch_array($paid)){ ?>
                <tr>
                <td class="text-center"><?php echo $row['transacID']; ?></td>
                    <td class="text-center"><?php echo $row['dateDelivered']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td class="text-center"><a href="itemuser.php?id=<?php echo $row['id']?>" target="_blank"><i class="fa fa-external-link"></i> View Item</a></td>                    
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
              </section>
            
<style>
     .bg-primary1{
                      color: #ffffff;
                      background :#B4489B
                  }
    </style>

<br><br><br><br><br><br><br><br><br>
<?php include('include/home/footer.php'); ?>



<script>
function myFunction() {
  // Declare variables table1
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }




  // Declare variables table2
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
    // Declare variables table 3
    var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable3");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }



}




</script>
<style>
    #myInput {
 

  width: 100%; /* Full-width */
  font-size: 15px; /* Increase font-size */
  padding: 10px 5px 12px 10px; /* Add some padding */
  border: 1px solid #000; /* Add a grey border */
  
  margin-bottom: 12px; /* Add some space below the input */
}
    </style>