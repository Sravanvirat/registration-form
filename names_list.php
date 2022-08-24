<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<div class='header-div' >
    <h1>STUDENTS DETAILS LIST</h1>
    <form action="register.php" method="get" class="names-list-form">
    <input type="submit" value="ADD" class="add-btn">   
</form>
</div>

    <table border="1px">
    <thead>
        <tr >
        <th class="table-heads">ID</th>
        <th class="table-heads">First Name</th>
        <th class="table-heads">Last Name</th>
        <th class="table-heads">Email-id</th>
        <th class="table-heads">Course</th>
        <th class="table-heads">Phone Number</th>
        <th class="table-heads">Gender</th>
        <th class="table-heads">Age</th>
        <th class="table-heads">Date of Birth</th>
        <th class="table-heads">Address</th>
        <th class="table-heads" colspan="2">Actions</th>
        </tr>
    </thead>
    <tr>
        <?php
        // ----------datbase details----------------------------------------------------------------------
    $server = 'localhost';
    $uname= 'nithin';
    $pass = 'nithin';
    $db = "DB";
    $fname = $lname = $email = $course = $pnumber = $age = $dob = $address = "";

    $connection = mysqli_connect($server,$uname,$pass,$db);
        if($connection){
            // pagination starting
            $resperpage = 10;
            $sql = "SELECT * FROM regestrationform";
            $result = mysqli_query($connection,$sql);
            $noofres = mysqli_num_rows($result);
            $noofpage = ceil($noofres/$resperpage); 
            if(isset($_GET['page']))
            $page = $_GET['page'];  
            else
            $page = 1;
            $pgfirres = ($page-1)* $resperpage;
            // pagination nding

            $sql = "SELECT * FROM regestrationform LIMIT $pgfirres,$resperpage";
            $result = mysqli_query($connection,$sql);
            //  row  = [id fname lname email]
                while($row = mysqli_fetch_array($result)){
                    // -------------
                    echo "<tr>";
                        echo "<td class='table-heads'>".$row['ID']."</td>";
                        echo "<td class='table-heads'>".$row['fname']."</td>";
                        echo "<td class='table-heads'>".$row['lname']."</td>"; 
                        echo "<td class='table-heads'>".$row['email']."</td>"; 
                        echo "<td class='table-heads'>".$row['course']."</td>"; 
                        echo "<td class='table-heads'>".$row['pnumber']."</td>"; 
                        echo "<td class='table-heads'>".$row['gender']."</td>";
                        echo "<td class='table-heads'>".$row['age']."</td>";
                        echo "<td class='table-heads'>".$row['dob']."</td>";     
                        echo "<td class='table-heads'>".$row['paddress']."</td>";   

                        echo "<td><a href='update.php?id=".$row['ID']."' class='update-btn'>update</a></td>";
                        echo "<td><a href='delete.php?id=".$row['ID']."' class='delete-btn'>delete</a></td>";
                    echo"</tr>";      
        }
            
        }
        else{
            echo "connection failed";
        }
        
        ?>
    </tr>

    </table><br><br>
<?php
echo '<div class="page-links">';
for($page = 1; $page<= $noofpage; $page++) {  
    echo '<a href = "names_list.php?page=' . $page . '" class="page-links">' . $page . ' </a>';  
} 
echo "</div>";
?>
</body>
</html>