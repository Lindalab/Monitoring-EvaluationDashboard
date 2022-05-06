<?php
require "../Model/dbconnect.php";
require " ../Model/sqlfunctions.php";



if(isset($_POST["submit"])){
    
    $course_id = $_POST[""];
    $module_name = $_POST[""];
    $module_description=$_POST[""];
    

    insertintoModules($course_id,$module_name, $module_description);
    

    
    
    


    
    




}
?>