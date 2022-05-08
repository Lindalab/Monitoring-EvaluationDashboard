<?php
require "..\Model\dbconnect.php";
require "..\Model\stakeholders.php";



if(isset($_POST["submit"])){
    $fname= $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $role_id=$_POST["role_id"];
    $contact=$_POST["contact"];
    $email=$_POST["email"];
    $address=$_POST["address"];

    
    createIndividual($fname, $lname, $gender, $role_id, $contact, $email, $address);
    header("location: ..\View\Stakeholder.php");
    
}

$id = $_GET['id'];
if(deleteStakeholder($stakeholderid)){
    echo "successfully";
}


?>