<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>updation form</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <?php
    //----------datbase details----------------------------------------------------------------------
    $server = 'localhost';
    $uname= 'nithin';
    $pass = 'nithin';
    $db = "DB";
    $fname = $lname = $email = $course = $pnumber = $age = $dob = $address = "";
    $connection = mysqli_connect($server,$uname,$pass,$db);
//-----------------updating data in the datbase----------------------------
if(isset($_GET['update'])){
        
        $id = $_GET['id'];
        $fname = $_GET['fname'];
        $lname = $_GET['lname'];
        $email = $_GET['email'];
        $course = $_GET['course'];
        $pnumber = $_GET['pnumber'];
        $gender = $_GET['gender'];
        $age = $_GET['age'];
        $dobdate = $_GET['dobdate'];
        $dobmonth = $_GET['dobmonth'];
        $dobyear = $_GET['dobyear'];
        $dob = "$dobdate$dobmonth$dobyear";
        $paddress = $_GET['address'];
    if($connection){
        $sql = "UPDATE regestrationform SET fname = '".$fname."',lname ='".$lname."',email = '".$email."',course = '".$course."',pnumber = $pnumber,gender ='".$gender."',age = $age,dob = $dob,paddress ='".$paddress."' WHERE ID = '" .$id."' ";
        $result = mysqli_query($connection,$sql);
        if($result){
            header("location:names_list.php");
        }
        else{
        echo "not updated";
    }
        
    }
    else{
        echo "details not present to update";
    }
    }
       
    $sql = 'SELECT * FROM regestrationform WHERE ID=' . $_GET['id'];
    $row = mysqli_query($connection,$sql)->fetch_assoc();
    // var_dump($row);


    ?>


    <!---------------------------- HTML code goes here----------------------------- -->
<div class="form">
<fieldset>
    <legend>  Student updation Form</legend>
<form action="update.php" method="get">
    
    <span class='side-heading'> ID Number : </span><input type="number" name="id" value="<?php echo $row['ID']?>" required ><br><br>

    
    <span class='side-heading'>First Name:</span> <input type="text" name="fname" required value = '<?php echo $row['fname']?>'><BR></BR>


    <span class='side-heading'>Last Name:</span> <input type="text" name="lname" required value = '<?php echo $row['lname']?>'><BR></BR>


    <span class='side-heading'> E-mail ID :</span> <input type="email"  name="email" 
     value = '<?php echo $row['email']?>' ><BR></BR>


     <span class='side-heading'>Course :</span> 
     <select name="course">
        <option><?php echo $row['course']?>
        <option name="course">CSE</option>
        <option name="course">ECE</option>
        <option name="course">EEE</option>
        <option name="course">CIVIL</option>
        <option name="course">MECHANICAL</option>
</option>

     </select>
     
     
     <br><br>


     <span class='side-heading'>Phone Number :</span> <input type="number" name="pnumber" required  value = '<?php echo $row['pnumber']?>' ><br><br>


     <span class='side-heading'>Gender : </span>
             <input type="radio" name="gender" value="male" checked>Male
             <input type="radio" name="gender" value="female" >Female
             <input type="radio" name="gender" value="other" >other
             <br><br>


   <span class='side-heading'> Age: 
        <select name="age">
            <option><?php echo $row['age']?>
                <?php
                
                for($i=0;$i<=25;$i++){
                    echo "<option name='age'>$i</option>";
                }
                ?>
            </option>
        </select>
        <br><br>


    <span class='side-heading'>Date of Birth :</span>
            <select name="dobdate" >
                <option name='dobdate' ><?php echo date("d",$row['dob']);?>
                    <?php
                        for($i=1;$i<=31;$i++){
                            if($i<10){echo "<option name='dobdate' >0$i</option>";}
                             else
                            echo "<option name='dobdate'>$i</option>";
                        }
                    ?>
                </option>
            </select>

            <select name="dobmonth" >
                <option  name="dobmonth"><?php echo date("m",$row['dob']);?></option>
                <?php 
                for($i=1;$i<13;$i++){
                    if($i<10){echo "<option name='dobmonth' >0$i</option>";}
                    else
                    echo "<option name='dobmonth' >$i</option>";
                }
                ?>
            </select>

            <select name="dobyear" >
                    <option  name="dobyear"><?php echo date("Y",$row['dob']);?>
                        <?php
                            for($i=1995;$i<=2022;$i++){
                                echo "<option name='dobyear'>$i</option>";
                            }
                        ?>
                    </option>
                </select>
            <br><br>


    <span class='side-heading'>Address:</span>
    <input type= "text" name="address" cols="25" rows="5" value = '<?php echo $row['paddress']?>'>
    <br><br>


    
    <input type="submit" value="Update" name = 'update' class="button"
    title="click to update">
</form>
</fieldset>
</div>
</body>
</html>