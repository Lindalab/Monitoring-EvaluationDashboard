<?php

$conn=mysqli_connect('localhost','root','','Monitoring_Evalution_Dashboard');
if($conn->connect_error){
    die("Connection Failed ". $conn->connect_error);
}

?>