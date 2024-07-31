<?php
include './conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="userName" id="" placeholder="name">
        <input type="email" name="email" id="" placeholder="Email">
        <input type="text" name="password" id="" placeholder="password">
        <button type="submit"name="regBtn">Register</button>
    </form>
    <a href="./login.php">Already have an account?</a>
</body>
</html>


<?php
if(isset($_POST['regBtn'])){
    $name = $_POST['userName'];
    if(empty($name)){
        array_push($error,"Name is Needed");
    }
    $email = $_POST['email'];
    if(empty($email)){
        array_push($error,"Email is Needed");
    }
    $password=$_POST['password'];
    if(empty($password)){
        array_push($error,"Password is Needed");
    }else{
        $hashedPassword=password_hash($password,PASSWORD_BCRYPT);
    }
    $checkMail = "SELECT *FROM `admins`WHERE `email`='$email'";
    $runCheck = mysqli_query($conn, $checkMail);
    $mailCounter = mysqli_num_rows($runCheck);
    if ($mailCounter > 0) {
        array_push($error,"THIS EMAIL ALREADY EXISTS!!!!");
    }
    if(empty($error)){
        $insertAdmin="INSERT INTO `admins`(`name`,`email`,`password`)VALUES('$name','$email','$hashedPassword')";
        $runInsert=mysqli_query($conn,$insertAdmin);
        if($runInsert){
            $_SESSION['name']=$name;
            header('location:index.php');
        }else{
            echo"ERROR!!!".mysqli_error($conn);
        }
    }else{
        foreach($error as $row):
            echo"<h2>$row</h2> <br>";
        endforeach;
    }
}