<?php

// import statement
// include 'connect.php';

// connect to mysql
$con = new mysqli('localhost','root','','users');

// error if connection is not successful 
if(!$con){
    die(mysqli_error($con));
} 


// if postmethod is set to submit
if(isset($_POST['submit'])){
    // create variables from input fields? 
    $name = $_POST['username'];
    $password = $_POST['password']; 
      
    // sql query
    $sql = "insert into `login` (username,password) values ('$name','$password')";
    // result = query to connection 
    $result = mysqli_query($con, $sql);

    // if theres a result redirect else throw error
    if($result){
        header('location:login.php');
    } else {
        die(mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    
    include 'head.php';
    
    ?>
    <title>CrudOperation</title>
</head>
<body>
    
    <?php
        
        include 'navbar.php';

    ?>

    <div class="container my-5" style="min-height: 80vh;"> 
    
    <h1 class="my-5">Register User</h1>

    <form method="post" class="card p-3 my-5 m-auto" >
        <div class="mb-3">
            <label for="name" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" aria-describedby="nameHelp" 
            placeholder="Enter your Name" 
            name="username" autocomplete="off" value="">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" 
            placeholder="Enter your password" 
            name="password" autocomplete="off" value="">
        </div>
        
        <div class="d-flex">
            <button type="submit" class="btn btn-primary m-1" name="submit" id="submitButton" disabled>Submit</button>
            <button class="btn btn-danger m-1" name="submit"><a class="text-light" href="login.php"> Cancel </a></button>
        </div>

    </form>
    </div>

    <?php
    
    include 'footer.php';

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>
</html>

















