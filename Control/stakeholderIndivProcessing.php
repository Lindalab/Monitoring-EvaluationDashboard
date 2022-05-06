<?php
require "../Model/dbconnect.php";
require " ../Model/sqlfunctions.php";



if(isset($_POST["submit"])){
    $fname= $_POST[""];
    $lname = $_POST[""];
    $gender = $_POST[""];
    $role_id=$_POST[""];
    $contact=$_POST[""];
    $email=$_POST[""];
    $address=$_POST[""];

    createStakeholder($contact, $email, $address);
    createIndividual($fname, $lname, $gender, $role_id, $contact, $email, $address);
    
}
?>