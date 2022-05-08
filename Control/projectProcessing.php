<?php
require "../Model/dbconnect.php";
require " ../Model/sqlfunctions.php";



if(isset($_POST["submit"])){
    $department_id= $_POST["depart_id"];
    $projectName = $_POST["prname"];
    $projectDescription=$_POST["prdescription"];
    $communicationType = $_POST["Communicationtype"];
    $projectStatus=$_POST["Project_status"];
    $projectIndustry=$_POST["Project_industry"];
    $projectLocation=$_POST["Project_location"];
    $projectType=$_POST["prtype"];
    

    insertIntoProject($department_id, $projectName,$ProjectDescription,$communicationType,
    $projectStatus, $projectIndustry,$projectLocation,$projectType);
    

    
    


    
    




}
?>