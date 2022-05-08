<?php
require "..\Model\dbconnect.php";
require "..\Model\stakeholders.php";



if(isset($_POST["submit"])){
    $company_name= $_POST["cname"];
    $contact=$_POST["contact"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    

    
    createCompany($company_name, $contact, $email, $address);
    
}
?>