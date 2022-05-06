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
        $query = "SELECT stakeholders.stakeholderid,fname, lname, `email`, gender, `contact` , roles.role_name FROM stakeholders, Individuals,roles where stakeholders.stakeholderid=individuals.stakeholderid and individuals.role_id=roles.role_id";
        return select($query);
    }

    function viewAllCompanies(){
        $query = "SELECT stakeholders.stakeholderid ,companies.company_name,stakeholders.contact,stakeholders.email,stakeholders.address from stakeholders,companies where stakeholders.stakeholderid=companies.stakeholderid";
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
        $query="select count(Students.stakeholderid) as students from Students";
        return totalAll($query, "students");
    }

    function totalAlumni(){
        $query="select count(stakeholderid) as number from Individuals , Roles where Individuals.role_id = Roles.role_id and Roles.role_name = 'Alumni'";
        return totalAll($query, "number");
    }

    function totalCoaches(){
        $query="SELECT DISTINCT count(stakeholder_project.stakeholderid) as number   from stakeholder_project where stakeholder_project.stakeholder_type = 'Coache'";
        return totalAll($query, "number");
    }


    function totalEngineeringStudents(){
        $query="SELECT DISTINCT count(students.stakeholderid) as Engineers from students where students.major='Engineering'";
        return totalAll($query, "Engineers");
    }

    function totalUser(){
        $query="select DISTINCT count(stakeholders.stakeholderid) as 'Total Users' from stakeholders";
    
        return totalAll($query, "Total Users");
    }

    function totalCompanies(){
        $query="SELECT DISTINCT count(companies.stakeholderid) as number from companies";
        return totalAll($query, "number");
    }

   

    

    function totalCompanyCoaches(){}
    function totalStudentCoaches(){}
    
    function displaytables(){
        


        $result = viewAllIndividuals();
        // stakeholders.stakeholderid,fname, lname, `email`, gender, `contact` , roles.role_name 
        if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['stakeholderid'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $email = $row['email'];
                $gender = $row['gender'];
                $contact = $row['contact'];
                $role_name = $row['role_name'];

                echo "<tr> <td>
        <span class='custom-checkbox'>
            <input type='checkbox' id='checkbox1' name='options[]' value='$id'>
            <label for='checkbox1'></label>
        </span>
    </td>
    <td>$fname</td>
    <td>$lname</td>
    <td>$email</td>
    <td>$gender</td>
    <td>$contact</td>
    <td>$role_name</td>
    <td>
        <a href='#editEmployeeModal' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit' on>&#xE254;</i></a>

        <a href='#deleteEmployeeModal' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete' >&#xE872;</i></a>
    </td>
</tr>";
            }
        }

       
    }


    


?>