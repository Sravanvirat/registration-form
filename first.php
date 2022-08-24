<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <script defer src="./script.js"></script>
</head>
<body>
<!-- --------------php code goes here------------ -->
<?php 
    $nameerr=$emailerr=$gendererr=$websiteerr=$commenterr="";
    $name=$email=$website=$gender=$comment=$dobdate=$dobmonth=$dobyear="";
    
//checks whether the user clicked submit button or not 
function submitted(){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        return true;
    }
    else{
        return false;
    }
}
// executed after submission 
if(submitted()){{
    // checks whether the name is empty or not if empty error will displayed else value will be assigned to variable will be assigned 
    if(empty($_POST["name"])){
            $nameerr = "name is required";
        }
    else{
        $name = $_POST["name"];
    }
    }
    // checking for mail id
    if (($_POST["email"])==""){
        $emailerr = 'email is required';
    }
    else{
        $email = $_POST['email'];
    }
    // checks for email address
    if (($_POST["website"])==""){
        $websiteerr = 'website is required';
    }
    else{
        $website = $_POST['website'];
    }
    //   checks for comment
    if (empty($_POST["comment"])) {
        $commenterr = "comment is required";
      }
    else {
        $comment = $_POST["comment"];
      }
    // checks for gender 
    if (empty($_POST["gender"])) {
        $gendererr = "Gender is required";
      }
    else {
        $gender = $_POST["gender"];
      }
    $dobdate = $_POST['dobdate'];
    $dobmonth = $_POST['dobmonth'];
    $dobyear = $_POST['dobyear'];
    
}

function assign($data,$value){
    return  $_POST[$value];
}
?>
    <form action="first.php" method="post">
    <span class="error">* required field</span><br><br>
    Name : <input type="text" name="name" value='<?php echo $name?>'>
    <span class='error'>*
     <?php
        echo $nameerr
    ?>  
    </span><br><br>

    E-mail : <input type="email" name="email" value="<?php echo $email;?>">
    <span class='error'>*
     <?php echo $emailerr;?>
    </span><br><br>

    Website : <input type="text" name = "website" value="<?php echo $website?>">
    <span class='error'>*
     <?php echo  $websiteerr;?>
    </span><br><br>

    Comment : <textarea name="comment" cols="20" rows="1" value="<?php echo $comment;?>"></textarea>
    <span class='error'>*
     <?php echo  $commenterr;?>
    </span><br><br>

    
    Gender : 
    <input type="radio" name="gender" checked value="male" <?php
    echo $gender;
    ?>>Male
    <input type="radio" name="gender" value="female" <?php
    echo $gender;
    ?>>Female
             
             <input type="radio" name="gender" value="other" <?php
    echo $gender;
    ?>>Other
    <span class='error'>*
     <?php echo $gendererr;?>
    </span><br><br>
    <br>
    Date of Birth :
        <select name="dobdate" >
            <option value="">Date
                <?php
                    for($i=1;$i<=31;$i++){
                        echo "<option name='dobyear'>$i</option>";
                    }
                ?>
            </option>
        </select>
    <select name="dobmonth" >
        <option value="">month</option>
        <?php 
         for($i=1;$i<13;$i++){
             echo "<option name='dobmonth' >$i</option>";
         }
        ?>
    </select>
    <select name="dobyear" >
            <option value="">Year
                <?php
                    for($i=1930;$i<=2022;$i++){
                        echo "<option name='dobyear'>$i</option>";
                    }
                ?>
            </option>
        </select>
    <br><br>
    <input type="submit" value="submit" onclick="func" class="btn"> 
</form>
<?php
if(submitted()){
    echo $name."<br>";
    echo $email."<br>";
    echo $website."<br>";
    echo $comment."<br>";
    echo $gender."<br>";
    echo $_POST['dobdate']."-".$_POST['dobmonth']."-".$_POST['dobyear'];
}

?>

</body>
</html>