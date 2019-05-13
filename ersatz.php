<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `object_details` WHERE CONCAT(`Id`, `Class`, `Number`, `Owner`, `Availability`, `Received date` , `Return date` , `Image`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `object_details`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "object_details");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
//<?php
//include 'display.php';
//?>

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
    <body>
	
        
        <form action="ersatz.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Class</th>
                    <th>Number</th>
                    <th>Owner</th>
                    <th>Availability</th>
                    <th>Received date</th>
                    <th>Return date</th>
                    <th>Image</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php 
				
				while($row = mysqli_fetch_array($search_result)):
				?>
				
                <tr>
				
                    <td><?php echo $row['Id'];?></td>
                    <td><?php echo $row['Class'];?></td>
                    <td><?php echo $row['Number'];?></td>
                    <td><?php echo $row['Owner'];?></td>
                    <td><?php echo $row['Availability'];?></td>
                    <td><?php echo $row['Received date'];?></td>
                    <td><?php echo $row['Return date'];?></td>

					
                   
					<td> <img  src = <?php echo $row["Image"];?> height="80"width="100"> </td> 
					<!--echo '<img src="data:/jpeg;base64,' . base64_encode($row['destinationimage']) . '" />';-->
                   <!-- <td><?php echo $row['Image'];?></td> -->
                </tr>
                <?php endwhile;?>

            </table>
//<?php
//include 'groupby.php';
//?>
//<?php
//include 'csv.php';
//?>

        </form>
        
    </body>
</html>
