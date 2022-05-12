<?php
require "..\Model\dbconnect.php";
require "..\Model\stakeholders.php";



if(isset($_POST["submitS"])){
    $potential_name= $_POST["cname"];
    $pcontact=$_POST["contact"];
    $pemail=$_POST["email"];
    $paddress=$_POST["address"];

    
        createCompany($potential_name, $pcontact, $pemail, $paddress);
        header("location: ..\View\Sponsor.php");
   

    
   
    
}
?>