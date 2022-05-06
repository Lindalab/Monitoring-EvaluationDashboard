<?php
require "../Model/dbconnect.php";
require " ../Model/sqlfunctions.php";



if(isset($_POST["submit"])){
    $company_name= $_POST[""];
    $contact=$_POST[""];
    $email=$_POST[""];
    $address=$_POST[""];

    createStakeholder($contact, $email, $address);
    createCompany($company_name, $contact, $email, $address);
    
}
?>