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
                    $stakeholderid  = $getData[0];
                    $fname = $getData[1];
                    $lname = $getData[2];
                    $gender = $getData[3];
                    $role_id = $getData[4];
                    $contact = $getData[5];
                    $email = $getData[6];
                    $address = $getData[7];

                    require("stakeholders.php");
                    createIndividual($fname, $lname, $gender, $role_id, $contact, $email, $address);
                    
                }
                // Close opened CSV file
                fclose($csvFile);
                header("Location: ../View/Landing_Page.php");
        }
        else{echo "Please select valid file";}
    }
?>



INSERT INTO `stakeholders`(`stakeholderid`, `contact`, `email`, `address`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
INSERT INTO `individuals`(`stakeholderid`, `fname`, `lname`, `gender`, `role_id`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
INSERT INTO `companies`(`stakeholderid`, `company_name`) VALUES ('[value-1]','[value-2]')












