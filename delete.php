<?php

// import statement
include 'connect.php';

// if deletid on delete button is set to get-method 
if(isset($_GET['deleteid'])){
    // set id from delete id
    $id = $_GET['deleteid'];
    
    // query
    $sql = "delete from `crud` where id=$id"; 

    // execute query
    $result = mysqli_query($con, $sql);

    // if there is a result redirect else throw error
    if($result){
        // echo "Deleted Successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}

?>