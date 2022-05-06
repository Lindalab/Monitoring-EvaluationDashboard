<?php
require "../Model/dbconnect.php";
require " ../Model/sqlfunctions.php";

// keep track of errors
$errors = array();

if(isset($_POST["submit"])){
    
    $email = $_POST["email"];
    $password = $_POST["password"];
    

    // validate data
    // check if fields are empty
    if(empty($email)){
        array_push($errors, "email is requried");
    }
    if(empty($password)){
        array_push($errors, "password is requried");
    }

    // validate email with regex
    $regex = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    // set an error if not a valid email address
    if(!preg_match($regex, $email)){
        array_push($errors, "enter a valid email address");
    }

    


    // if form is fine
    if(count($errors) == 0){
        // Validating login Credentials
        select("SELECT `email`, `password` FROM `admin`
         WHERE  email='$email' and passwords = '$password' ");
         // if statement to allow Login if match found
         if($result-> num_rows > 0){
            header("location:..\View\Landing_Page.php");
            exit;
        }
         else{
              echo "Wrong credentials for Login";
            }
    }
    else{
        session_start();
        // store the errors inside session
        $_SESSION["errors"] = $errors;
        header("location:../View/Adminpage.php");
    }
    




}
?>