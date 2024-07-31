<?php
include './conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="" method="post">
        <input type="email" name="email" id="" placeholder="Email">
        <input type="text" name="password" id="" placeholder="password">
        <button type="submit" name="logBtn">login</button>
    </form>
</body>

</html>

<?php

if(isset($_POST['logBtn'])){
    $email = $_POST['email'];
    if(empty($email)){
        array_push($error,"Email is Needed");
    }
    $password=$_POST['password'];
    if(empty($password)){
        array_push($error,"Password is Needed");
    }
    $checkMail = "SELECT *FROM `admins`WHERE `email`='$email'";
    $runCheck = mysqli_query($conn, $checkMail);
    $mailCounter = mysqli_num_rows($runCheck);
    if ($mailCounter !=1) {
        array_push($error,"THIS EMAIL IS NOT FOUND!!!!");
    }
    $adminData=mysqli_fetch_assoc($runCheck);
    if(!password_verify($password,$adminData['password'])){
        array_push($error,"THIS Password IS NOT CORRECT!!!!");
    }
    if(empty($error)){
        $_SESSION['name']=$adminData['name'];
        header('location:index.php');
    }else{
        foreach($error as $data){
            echo"<h3>$data</h3>";
        }
    }
}