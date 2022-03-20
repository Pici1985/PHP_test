<?php

ini_set('display_errors', '0');

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
          echo '<p id="usernameerror">'.'username or password incorrect'.'</p>';
        //   header("location:login.php");
    }
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

    <div class="container" style="min-height: 80vh;">
        <form action="#" method="POST" class="card p-3 my-5 m-auto" style="width: 50vw;">
            <h2 class="mb-3">Login</h2>
            <div class="form-floating mb-3">
                <input type="text" 
                       class="form-control"
                       id="floatingInput"
                       placeholder="Username"
                       name="username"
                       autocomplete="false"
                       required
                       >
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password"
                       class="form-control"
                       id="floatingPassword" 
                       placeholder="Password"
                       name="password"
                       autocomplete="false"
                       required
                       >
                <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid">
                <input class="btn btn-primary mt-3" type="submit" value="Login" onClick="validate()">
            </div>
        </form>
    </div>

    <?php
    
    include 'footer.php';
    include 'scripts.php';

    ?>
    
</body>
</html>