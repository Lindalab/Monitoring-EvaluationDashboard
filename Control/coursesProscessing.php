<?php
require "../Model/dbconnect.php";
require " ../Model/sqlfunctions.php";



if(isset($_POST["submit"])){
    
    $courseName = $_POST[""];
    $courseDate = $_POST[""];
    $courseStatus=$_POST[""];
    $courseDescription=$_POST[""];

    insertintoCourse($courseName,$courseDate, $courseStatus, $courseDescription);
    

    
    


    
    




}
?>