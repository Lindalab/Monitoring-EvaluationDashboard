<?php
require "..\Model\dbconnect.php";
require "..\Model\stakeholders.php";



if(isset($_POST["submit"])){
    $dapartmentname= $_POST["depart_name"];
    
    

    
    createNewDepartment($dapartmentname);
    
}
?>


<?php
require "..\Model\dbconnect.php";
require "..\Model\stakeholders.php";



if(isset($_POST["submitrole"])){
    $rolename= $_POST["rname"];
    
    

    
    addNewRoles($rolename);
    
}
?>

