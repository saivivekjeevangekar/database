<?php  
 $connect = mysqli_connect("localhost", "root", "", "object_details");  
 $query ="SELECT * FROM object_details ORDER BY id asc";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
	  <title>Webslesson Tutorial | Export Mysql Table Data to CSV file in PHP</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:600px;">  
                <h2 align="center">EXPORT MYSQL TABLE DATA</h2>  
                <h3 align="center">OBJECT DETAILS</h3>                 
                <br />  
                <form method="post" action="export.php" align="center">  
                     <input type="submit" name="export" value="CSV Export" class="btn btn-success" />  
                </form>  
                <br />  
                <div class="table-responsive" id="object_details">  
                     <table class="table table-bordered">  
                          <tr>  
                               `<th width="5%">Id</th>  
								<th width="10%">Class</th>  
								<th width="5%">Number</th>
								
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
								<td><?php echo $row["Id"]; ?></td>  
								<td><?php echo $row["Class"]; ?></td>  
								<td><?php echo $row["Number"]; ?></td>  
									
							   <tr>
							   <?php       
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  