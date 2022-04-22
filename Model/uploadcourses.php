<?php
require("dbconnect.php");

if(isset($_POST['submit'])){
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
        // Validate whether selected file is a CSV file
        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
        {       // Open uploaded CSV file with read-only mode
                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                // Skip the first line
                fgetcsv($csvFile);
                // Parse data from CSV file line by line
                while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
                {   // Get row data
                    $course_name = $getData[0];
                    $date_started = $getData[1];
                    $course_status = $getData[2];
                    $course_description = $getData[3];
                    require("coursesFunctions.php");
                    insertintoCourse($course_name,$date_started ,$course_status,$course_description);
                }
                // Close opened CSV file
                fclose($csvFile);
                header("Location: ../View/Landing_Page.php");
        }
        else{echo "Please select valid file";}
    }
?>






