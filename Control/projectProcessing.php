<?php
require "../Model/dbconnect.php";
require " ../Model/sqlfunctions.php";



if(isset($_POST["submit"])){
    $department_id= $_POST[""];
    $projectName = $_POST[""];
    $projectDescription=$_POST[""];
    $communicationType = $_POST[""];
    $projectStatus=$_POST[""];
    $projectIndustry=$_POST[""];
    $projectLocation=$_POST[""];
    $projectType=$_POST[""];
    

    insertIntoProject($department_id, $projectName,$ProjectDescription,$communicationType,
    $projectStatus, $projectIndustry,$projectLocation,$projectType);
    

    
    


    
    




}
?>