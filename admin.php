
<?php include('include/admin/header.php');?>

<section>
    <div class="container">
        <div class="row">
            <?php include('include/admin/sidebar.php');?>

                
<div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">All Products</h2>
                    
      
                          <label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" />
                <button><a rel="facebox" href="addproduct.php">Add Product</a></button>
                <br>
                <table cellpadding="1" cellspacing="1" id="resultTable">
                    <thead>
                        <tr>
                            <th  style="border-left: 1px solid #C1DAD7"> ID </th>
                            <th> Image </th>
                            <th> Product </th>
                            <th> Desciption </th>
                            <th> Price </th>
                            <th> Category </th>
                            <th> Action </th>
                        </tr>
                        
                    </thead>
                    
                    <tbody>
                    <?php
                        include('db.php');
                        $result = mysqli_query($conn,"SELECT * FROM products");
                        while($row = mysqli_fetch_array($result))
                            {
                                echo '<tr class="record">';
                                echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['ID'].'</td>';
                                echo '<td><a rel="facebox" href="editproductimage.php?id='.$row['ID'].'"><img src="reservation/img/products/'.$row['imgUrl'].'" width="80" height="50"></a></td>';
                                echo '<td><div align="right">'.$row['Product'].'</div></td>';
                                echo '<td><div align="right">'.$row['Description'].'</div></td>';
                                echo '<td><div align="right">'.$row['Price'].'</div></td>';
                                echo '<td><div align="right">'.$row['Category'].'</div></td>';
                                echo '<td><div align="center"><a rel="facebox" href="editproductdetails.php?id='.$row['ID'].'"><i class="fa fa-edit fa-lg text-success"></i></a> | <a href="#" id="'.$row['ID'].'" class="delbutton" title="Click To Delete"><i class="fa fa-times-circle fa-lg text-danger"></i></a></div></td>';
                                echo '</tr>';
                            }
?> 
                    </tbody>

            
                    
                </table>
          </section>
<?php include('include/admin/footer.php'); ?>

                <style>
                    button{
                        font-family: 'Roboto', sans-serif;

                        background-color:#FE980F;
                        border-color: #FE980F;
                        height:33px;
                        
                    }
                button{
                        font-family: 'Roboto', sans-serif;
                        color:white;
                        text-transform: uppercase;
                    }
                    a{
                        color:white;
                    }
                    
element.style {
}
#filter {
width: 350px;
border: 1px solid #B4489B;
border-left: 4px solid #B4489B;
padding: 5px;

background-repeat: no-repeat;
background-position: 3px 5px;
padding-left: 20px;
}
label {
text-transform: uppercase;
display: inline-block;
margin-bottom: 2px;

}


#resultTable th.sortable {
background: url(bg_header.jpg) no-repeat scroll 0 0 #dddddd;
border-bottom: 1px solid #dddddd;
border-right: 1px solid #dddddd;
border-top: 1px solid #dddddd;
color: #dddddd;
font: normal 11px "Trebuchet MS",Verdana,Arial,Helvetica,sans-serif;
letter-spacing: 2px;
padding: 3px 3px 3px 6px;
text-align: left;
text-transform: uppercase;
color: #000;
cursor: pointer;
text-decoration: none;
}
                    </style>