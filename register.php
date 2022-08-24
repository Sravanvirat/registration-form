<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="dark light">
    <title>regestration form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// ----------datbase details----------------------------------------------------------------------
    $server = 'localhost';
    $uname= 'nithin';
    $pass = 'nithin';
    $db = "DB";
    $fname = $lname = $email = $course = $pnumber = $age = $dob = $address = "";
    $connection = mysqli_connect($server,$uname,$pass,$db);


// --------------------------registering into database ---------------------------------------------------------
if(isset($_POST['register'])){
    
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $pnumber = $_POST['pnumber'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $dobyear = $_POST['dobyear'];
    $dobmonth = $_POST['dobmonth'];
    $dobdate = $_POST['dobdate'];
    $dob = " $dobyear$dobmonth$dobyear";
    $paddress = $_POST['address'];

    if($connection){
        $sql = "INSERT INTO regestrationform(ID,fname,lname,email,course,pnumber,gender,age,dob,paddress)"."VALUES"."('$id','$fname','$lname','$email','$course','$pnumber','$gender','$age','$dob','$paddress');";
        try{
        $result = mysqli_query($connection,$sql);
        if($result){
            header('Location:names_list.php');
        }
        }
        catch(Exception $e){
             echo "ID already exists";
        }
    }
    else{
        echo "connection failed";
    }
}

?>

<!---------------------------- HTML code goes here----------------------------- -->
<fieldset>
    <legend>  Student Registration Form</legend>
<form action="register.php" method="post">
    
    <span class='side-heading'> ID Number : </span><input type="number" name="id" required ><br><br>

    
    <span class='side-heading'>First Name:</span> <input type="text" name="fname" required ><BR></BR>


    <span class='side-heading'>Last Name:</span> <input type="text" name="lname" required ><BR></BR>


    <span class='side-heading'> E-mail ID :</span> <input type="email"  name="email" ><BR></BR>


     <span class='side-heading'>Course :</span> 
     <select name="course">
        <option name="course">CSE</option>
        <option name="course">ECE</option>
        <option name="course">EEE</option>
        <option name="course">CIVIL</option>
        <option name="course">MECHANICAL</option>

     </select><br><br>


     <span class='side-heading'>Phone Number :</span> <input type="number" name="pnumber" required   ><br><br>


     <span class='side-heading'>Gender : </span>
             <input type="radio" name="gender" value="male" checked>Male
             <input type="radio" name="gender" value="female" >Female
             <input type="radio" name="gender" value="other" >other
             <br><br>


   <span class='side-heading'> Age: </span>
        <select name="age">
            <option >age
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
                <option name='dobdate' >Date
                    <?php
                        for($i=1;$i<=31;$i++){
                            
                            echo "<option name='dobdate'>$i</option>";
                        }
                    ?>
                </option>
            </select>

            <select name="dobmonth" >
                <option name='dobmonth'>month</option>
                <?php 
                for($i=1;$i<13;$i++){
                    echo "<option name='dobmonth' >$i</option>";
                }
                ?>
            </select>

            <select name="dobyear" >
                    <option name="dobyear">Year
                        <?php
                            for($i=1995;$i<=2022;$i++){
                                echo "<option name='dobyear'>$i</option>";
                            }
                        ?>
                    </option>
                </select>
            <br><br>


    <span class='side-heading'>Address:</span> <textarea name="address" cols="25" rows="5"></textarea>
    <br><br>

    <input type="submit" name="register" value="register">

</form>
</fieldset>
</div>
</html>
<!------------------------------ HTML code ends here------------------------------------- -->
