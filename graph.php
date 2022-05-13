<?php include('include/admin/header.php'); ?>
<script src="graphjs/jquery-1.9.1.js"> </script>
<script src="graphjs/Chart.min.js"> </script>
<section>
		<div class="container">
			<div class="row">
                <?php include('include/admin/sidebar.php'); ?>
                <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Product Graph Summary</h2>                                            					


<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="data1">
  


<?php

$con = mysqli_connect("localhost","root","","dbcake");
if(!$con){
    echo "Disconnected".mysqli_error();
}else{
    $sql = "SELECT Category, SUM( Price )
    FROM products
    GROUP BY Category
    HAVING SUM( Price )";
    $result = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($result)){
        $product[] = $row['Category'];
        $sales[] = $row['SUM( Price )'];
    }
}
?>
<label>Marketable Category</label>
<br><br>
<canvas id="chartjs_bar" style="width:45%; height:30%"></canvas>
<script type="text/javascript">
    var ctx = document.getElementById("chartjs_bar").getContext('2d');
    var myChart = new Chart(ctx,{
        type: 'bar',
        data: {
            labels:<?php echo json_encode($product); ?>,
            datasets:[{
                backgroundColor:[
                    "#5969ff",
                    "#ff407b",
                    "#25d5f2",
                    "#ffc750",
                    "#2ec551",
                    "#7040fa",
                    "#ff004e"
                    ],
                     label: 'TOTAL PRICE',
            data:<?php echo json_encode($sales); ?>,
            }]
    },
    options:{
        legend: {
            display: true,
            position: 'bottom',

            labels: {
                
                fontColor: "#71748d",
                fontFamily: 'Circular Std Book',
                fontSize: 14,
            }

        },
    }
    });


</script>




    </div>
 

	<div class="tab-content">
    <div class="tab-pane active" id="data1">
  


<?php

$con = mysqli_connect("localhost","root","","dbcake");
if(!$con){
    echo "Disconnected".mysqli_error();
}else{
    $sql = "SELECT STATUS , SUM( amount )
	FROM `order`
	GROUP BY STATUS";
    $result = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($result)){
        $status[] = $row['STATUS'];
        $amount[] = $row['SUM( amount )'];
    }
}
?>
<br>
<label>Total Sales Purchase</label>
<canvas id="chartjs_line" style="width:45%; height:30%"></canvas>
<script type="text/javascript">
    var ctx = document.getElementById("chartjs_line").getContext('2d');
    var myChart = new Chart(ctx,{
        type: 'pie',
        data: {
            labels:<?php echo json_encode($status); ?>,
            datasets:[{
                backgroundColor:[
                    "#5969ff",
                    "#ff407b",
                    "#25d5f2",
                    "#ffc750",
                    "#2ec551",
                    "#7040fa",
                    "#ff004e"
                    ],
					label: 'PURCHASE STATUS',
            data:<?php echo json_encode($amount); ?>,
            }]
    },
    options:{
        legend: {
            display: true,
            position: 'bottom',

            labels: {
                
                fontColor: "#71748d",
                fontFamily: 'Circular Std Book',
                fontSize: 14,
            }

        },
    }
    });


</script>




    </div>
 
              </section>



<?php include('include/admin/footer.php'); ?>