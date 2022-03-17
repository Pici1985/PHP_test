<?php

// connect to mysql
$con = new mysqli('localhost','root','','crudtest');

// error if connection is not successful 
if(!$con){
    die(mysqli_error($con));
} 

?>