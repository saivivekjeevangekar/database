<?php
#include 'ersatz.php';
$host = "localhost";
$user = "root";
$password ="";
$database = "object_details";

$Id = "";
$Class= "";
$Number = "";
$Owner = "";
$Availability = "";
$Receiveddate = "";
$Returndate = "";
$Image = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['Id'];
    $posts[1] = $_POST['Class'];
    $posts[2] = $_POST['Number'];
    $posts[3] = $_POST['Owner'];
    $posts[4] = $_POST['Availability'];
    $posts[5] = $_POST['Receiveddate'];
    $posts[6] = $_POST['Returndate'];
    $posts[7] = $_POST['Image'];
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM object_details WHERE id = $data[0]";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $Id = $row['Id'];
                $Class = $row['Class'];
                $Number = $row['Number'];
                $Owner = $row['Owner'];
                $Availability = $row['Availability'];
                $Received_date = $row['Received date'];
                $Return_date = $row['Return date'];
                $Image = $row['Image'];
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `object_details`(`Class`, `Number` , `Owner` , `Availability` , `Received date` , `Return date` , `Image`) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')";
    try{
        $insert_Result = mysqli_query($connect, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `object_details` WHERE `id` = $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `object_details` SET `Class`='$data[1]',`Number`='$data[2]',`Owner`='$data[3]',`Availability`='$data[4]',`Received date`='$data[5]',`Return date`='$data[6]',`Image`='$data[7]' WHERE `id` = $data[0]";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }
}



?>


<!DOCTYPE Html>
<html>
    <head>
        <title>PHP INSERT UPDATE DELETE SEARCH</title>
    </head>
    <body>
        <form action="display.php" method="post">
            <input type="number" name="Id" placeholder="Id" value="<?php echo $id;?>"><br><br>
            <input type="text" name="Class" placeholder="Class" value="<?php echo $Class;?>"><br><br>
            <input type="number" name="Number" placeholder="Number" value="<?php echo $Number;?>"><br><br>
            <input type="text" name="Owner" placeholder="Owner" value="<?php echo $Owner;?>"><br><br>
            <input type="text" name="Availability" placeholder="Availability" value="<?php echo $Availability;?>"><br><br>
            <input type="date" name="Receiveddate" placeholder="Receiveddate" value="<?php echo $Receiveddate;?>"><br><br>
            <input type="date" name="Returndate" placeholder="Returndate" value="<?php echo $Returndate;?>"><br><br>
            <input type="text" name="Image" placeholder="Image" value="<?php echo $Image;?>"><br><br>
            <div>
                <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="Add">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">
                
                <!-- Input For Find Values With The given ID -->
                <input type="submit" name="search" value="Find">
				<script>
document.getElementById("demo").innerHTML = "Hello JavaScript!";
<button onclick="document.getElementById('myImage').src='pic_bulbon.gif'">Turn on the light</button>

<img id="myImage" src="pic_bulboff.gif" style="width:100px">

<button onclick="document.getElementById('myImage').src='pic_bulboff.gif'">Turn off the light</button>

</script>
            </div>
        </form>
    </body>
</html>
