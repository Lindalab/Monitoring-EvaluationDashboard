<?php
require "..\Model\dbconnect.php";
require "..\Model\stakeholders.php";
require_once "..\Model\sqlfunctions.php";



if(isset($_POST["submit"])){
    $fname= $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $role_id=$_POST["role_id"];
    $contact=$_POST["contact"];
    $email=$_POST["email"];
    $address=$_POST["address"];

    $checkduplicate=select("SELECT  `contact`, `email` FROM `stakeholders` WHERE email='$email' and contact='$contact'");
    if($checkduplicate->num_rows === 0){
         createIndividual($fname, $lname, $gender, $role_id, $contact, $email, $address);
         header("location: ..\View\Stakeholder.php");
    }
    else{
      echo  '<script>
    alert("Person Exits already");
    </script>';
    }
}





// Delete stakehoder record
$ids = $_GET["id"];

$sql = "DELETE FROM `individuals` WHERE `stakeholderid`='" . $_GET["id"] . "'";
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