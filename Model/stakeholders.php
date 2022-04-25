<?php
    require "sqlfunctions.php";

    function createStakeholder($contact, $email, $address){

        $query = "INSERT INTO `stakeholders`( `contact`, `email`, `address`) VALUES ('$contact','$email','$address')";
        $lastid = getLastInsertedID($query);

        return $lastid;
    }

    function createIndividual($fname, $lname, $gender, $role_id, $contact, $email, $address){
        $stakeholderid = createStakeholder($contact, $email, $address);
        $query = "INSERT INTO `individuals`(`stakeholderid`, `fname`, `lname`, `gender`, `role_id`) VALUES ('$stakeholderid','$fname','$lname','$gender','$role_id')";

        return insert($query);
    }

    function createCompany($company_name, $contact, $email, $address){
        $stakeholderid = createStakeholder($contact, $email, $address);
        $query = "INSERT INTO `companies`(`stakeholderid`, `company_name`) VALUES ('$stakeholderid','$company_name')";
        
        return insert($query);
    }

    function updateStakeholder($stakeholderid, $contact, $email, $address){
        $query = "UPDATE `stakeholders` SET `contact`='$contact',`email`='$email' `address`='$address' WHERE stakeholderid = '$stakeholderid'";
        update($query);
    }

    function updateIndividual($stakeholderid, $fname, $lname, $gender, $role_id){
        $query = "UPDATE `individuals` SET `fname`='$fname',`lname`='$lname',`gender`='$gender',`role_id`='$role_id' WHERE stakeholderid = '$stakeholderid'";
        return update($query);
    }

    function updateCompany($stakeholderid, $company_name){
        $query = "UPDATE `companies` SET `company_name`='$company_name' WHERE `stakeholderid` = '$stakeholderid'";
        return update($query);
    }

    function deleteStakeholder($stakeholderid){
        $query = " DELETE FROM `stakeholders` WHERE `stakeholderid` = '$stakeholderid'";
        return update($query);
    }

    function viewAllIndividuals(){
        $query = "SELECT stakeholders.stakeholderid,fname, lname, gender, `contact`, `email`, `address` 
        FROM stakeholders, Individuals where stakeholders.stakeholderid=individuals.stakeholderid";
        return select($query);
    }

    function viewAllCompanies(){
        $query = "SELECT stakeholders.stakeholderid,companies.company_name,stakeholders.contact,stakeholders.email,stakeholders.address from stakeholders,companies where stakeholders.stakeholderid=companies.stakeholderid";
        return select(query);
    }

    function viewAllStudents(){
        $query = "Select DISTINCT fname, lname, major, level, email, address,
         contact, stakeholders.stakeholderid, gender, individuals.role_id FROM students, stakeholders, individuals 
        WHERE students.stakeholderid = individuals.stakeholderid and 
        stakeholders.stakeholderid = individuals.stakeholderid ";

        return select($query);
    
    }

    function totalStudent(){
        $query="select count(Students.stakeholderid) from Students";
        return select($query);
    }

    function totalAlumni(){
        $query="select count(stakeholderid) from Individuals , Roles where Individuals.role_id = Roles.role_id and Roles.role_name = 'Alumni'";
        return select($query);
    }


    


?>