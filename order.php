<?php include('include/admin/header.php'); ?>
<section>
		<div class="container">
			<div class="row">
                <?php include('include/admin/sidebar.php'); ?>
                <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Orders</h2>                                            					
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#data1" role="tab" data-toggle="tab">Pending Orders</a></li>
  <li><a href="#data2" role="tab" data-toggle="tab">Processing Orders</a></li>
  <li><a href="#data3" role="tab" data-toggle="tab">History Orders</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="data1">
        <table class="table table-bordered">
            <thead class="bg-primary1">
            <th>Transaction Code</th>
                <th>Date Ordered</th>
                <th>Customer Name</th>
                <th>Item</th>
                
            </thead>
            <?php $unpaid = $jim->getunpaidorders(); ?>
            <?php while($row = mysqli_fetch_array($unpaid)){ ?>
                
                <tr>
                <td class="text-center"><?php echo $row['transacID']; ?></td>
                    <td class="text-center"><?php echo $row['dateOrdered']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td class="text-center"><a href="item.php?id=<?php echo $row['id']?>&&p=unconfirmed" target="POST"><i class="fa fa-external-link"></i> View Item</a></td>
              
                 
            <?php } ?>
        </table>
    </div>
    <div class="tab-pane" id="data2">
        <table class="table table-bordered">
            <thead class="bg-primary1">
            <th>Transaction Code</th>
                <th>Date to Deliver</th>
                <th>Customer Name</th>
                <th>Item</th>
               
            </thead>
            <?php $delivered = $jim->getdeliveredorders(); ?>
            <?php while($row = mysqli_fetch_array($delivered)){ ?>
                <tr>
                <td class="text-center"><?php echo $row['transacID']; ?></td>
                    <td class="text-center"><?php echo $row['deliverDate']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td class="text-center"><a href="item.php?id=<?php echo $row['id']?>&&p=delivered" target="POST"><i class="fa fa-external-link"></i> View Item</a></td>
                 
                </tr>
            <?php } ?>
        </table>
    </div>
    
    <div class="tab-pane" id="data3">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Customer Name" title="Type in a name">
  
        <table class="table table-bordered" id="myTable">
       
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
                    <td class="text-center"><a href="item.php?id=<?php echo $row['id']?>" target="POST"><i class="fa fa-external-link"></i> View Item</a></td>                    
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
                  #myInput {
  background-image: url(images/home/searchicon.png);
  background-position: 20px 15px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
                  }

    </style>




<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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


<?php include('include/admin/footer.php'); ?>