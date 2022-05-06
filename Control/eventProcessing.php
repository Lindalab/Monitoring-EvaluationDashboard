<?php
require "../Model/dbconnect.php";
require " ../Model/sqlfunctions.php";



if(isset($_POST["submit"])){
    $department_id= $_POST[""];
    $eventName = $_POST[""];
    $eventStartDate = $_POST[""];
    $eventEndDate=$_POST[""];
    $eventTargetGroup=$_POST[""];
    $eventType=$_POST[""];
    $eventDescription=$_POST[""];

    insertintoEvent($department_id,$eventName, $eventStartDate, $eventEndDate,
$eventTargetGroup,$eventType,$eventDescription);
    

    
    


    
    




}
?>