<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "users";

session_start();

$data = mysqli_connect($host,$user,$password,$db);

if($data === false)
{
    die("Conenction error."); 
} 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from login where username = '".$username."' AND password = '".$password."'"; 

    $result = mysqli_query($data,$sql);

    $row = mysqli_fetch_array($result);

    // if(isset($row["usertype"]) === "user")
    // {
    //     echo "user";
    //     header("location:userhome.php");
    // }    
    // if(isset($row["usertype"]) === "admin")
    // {
    //     echo "admin";
    //     header("location:adminhome.php");

    // }
    // else
    // {
    //     echo "username or password incorrect";
    // } 

    switch ($row["usertype"]){
        case "user":
          $_SESSION["username"] = $username;  
          echo "user";
          header("location:userhome.php");
          break;
        case "admin":
          echo "admin";
          $_SESSION["username"] = $username;  
          header("location:adminhome.php");
          break;
        default:
          echo "username or password incorrect";
    }

    // var_dump($username);
    // var_dump($password);

    // echo (isset($row["usertype"]));


    //https://www.youtube.com/watch?v=wODW8RLBPt0
    //22:04


}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    
    include 'head.php';
    
    ?>
    <title>Login</title>
</head>
<body>
    <?php
    
    include 'navbar.php'
    
    ?>

    <form action="#" method="POST">
        <div>
            <label for="">Username</label>
            <input type="text" name="username" autocomplete="false" required >
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password" autocomplete="false" required>
        </div>
        <div>
            <input type="submit" value="Login" >
        </div>
    </form>

    <?php
    
    include 'footer.php';
    include 'scripts.php';

    ?>
    
</body>
</html>