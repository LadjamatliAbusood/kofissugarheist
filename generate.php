
<?php
function generateKey(){
    $keylength = 11;
    $str = "1234567890abcdefghijklmnopqrstuvwxyz";
    $randStr = substr(str_shuffle($str), 0, $keylength);
    return $randStr;
}
    
echo generateKey();
?>
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function

    $query = "SELECT * FROM dbcake.order WHERE CONCAT( `id` , `transacID`, `status` ) LIKE '%".$valueToSearch."%' AND STATUS = 'Accepted'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM dbcake.order where status='Accepted' order by dateDelivered desc LIMIT 0;";
  

    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "dbcake");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>




<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
  
    <body >
        
        <form action="generate.php" method="post"    >
            <input type="text" name="valueToSearch" placeholder="Value To Search"  ><br><br>
            <!-- <input type="submit"   value="Filter" > -->
            <button  name="search"> search</button><br><br>
            

            
            <table >
                <tr>
                    <th>Id</th>
                    <th>transaction number</th>
                    <th> Name</th>
                    <th>desc</th>
                    <th>contact</th>
                    <th>status</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr> 
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['transacID'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['desc'];?></td>
                    <td><?php echo $row['contact'];?></td>
                    <td><?php echo $row['status'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>



        
        
    </body>
</html>




