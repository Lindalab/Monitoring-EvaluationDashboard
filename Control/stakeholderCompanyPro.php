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


// Delete stakehoder record
$ids = $_GET["id"];

$sql = "DELETE FROM `companies` WHERE `stakeholderid`='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo  "<script>
    alert('Record deleted Successfully');
    window.location.href='..\View\Stakeholder.php';
    </script>; 
    ";
    
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);




?>