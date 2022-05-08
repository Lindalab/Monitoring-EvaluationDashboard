<?php

require "sqlfunctions.php";

function projectInfoStatus(){
    $query="Select  Project.Project_name,Individuals.fname, Individuals.lname ,Stakeholders.contact,
    Project.Project_description, Project.Project_status 
    from  Project , Stakeholders, Stakholder_Project, Individuals
    where Project.projectid= Stakholder_Project.projectid
    and Stakeholders.stakeholderid=Stakholder_Project.stakeholderid
    and  Stakeholders.stakeholderid= Individuals.stakeholderid
    and Stakholder_Project.stakholder_type = 'Owner' ";
    return select($query);
}

function projectGroupByStatus(){
    $query="SELECT project_status as Status, COUNT(Projectid) as number_of_projects 
    from project group by project_status";
    return select($query);
}

function projectInfoByAStatus(){
    $query="Select Project.projectid,Project.Project_name, Individuals.fname, Individuals.lname,Stakeholders.contact,Project.Project_description, Project.Project_location from Project , Stakeholders, stakeholder_project, Individuals where Project.projectid= stakeholder_project.projectid and Stakeholders.stakeholderid=stakeholder_project.stakeholderid and Stakeholders.stakeholderid= Individuals.stakeholderid and stakeholder_project.stakeholder_type = 'Owner'";
    return select($query);
}

function projectAllSdgAligned(){
    $query="Select Project.Project_name , SDG.SD_goals 
    from Project, SDG ,SDG_Project
    where Project.Projectid= SDG_Project.Projectid
    and  SDG.SDG_ID= SDG_Project.SDG_ID";
    return select($query);
}

function sdgAndAllProjectAligned($Sdg_goal){
    $query="Select Project.Project_name 
    from Project, SDG ,SDG_Project
    where Project.Projectid= SDG_Project.Projectid
    and  SDG.SDG_ID= SDG_Project.SDG_ID
    and SDG.SD_goals = '$Sdg_goal'";
    return select($query);
}

function projectsAndAllSdgAligned($Project_name){
    $query="Select SDG.SD_goals 
    from  SDG ,Project,SDG_Project
    where Project.Projectid= SDG_Project.Projectid
    and  SDG.SDG_ID= SDG_Project.SDG_ID
    and Project.Project_name like %'$Project_name'% ";
    return select($query);
}

function projectIdsAndSdgAligned($Project_id){
    $query="Select SDG.SD_goals 
    from  SDG ,Project,SDG_Project
    where Project.Projectid= SDG_Project.Projectid
    and  SDG.SDG_ID= SDG_Project.SDG_ID
    and Project.Project_name = '$Project_id'";
    return select($query);
}

function projectUnderADepartmentAndStatus($depart_id){
    $query=" Select Project. Project_name , Project.Project_status 
    from Project, Department
    where Project.department_id=Department.depart_id
    and depart_name= '$depart_id' ";
    return select($query);
}

function projectUnderADepartmentSDG($depart_id){
    $query= "Select Project.Project_name , SDG.SD_goals 
    from Project, SDG ,SDG_Project, Department
    where Project.Projectid= SDG_Project.Projectid
    and  SDG.SDG_ID= SDG_Project.SDG_ID
    and Project.department_id=Department.depart_id
    and depart_name= '$depart_id'";
    return select($query);
}

function projectCoaches(){
    $query="select Individuals.fname, Individuals.lname, Stakeholders.contact, Stakeholders.email, Individuals.gender
    from Stakeholders, Stakeholder_Project, Individuals
    where  Stakeholders.stakeholderid= Stakeholder_Project.stakeholderid
    and Individuals.stakeholderid = Stakeholders.stakeholderid
    and Stakeholder_Project.stakeholder_type = 'Coache'
    ";
    return select($query);
}


/* Edit And Update */

function updateProject($Project_id, $department_id, $Project_name, $Communication_type,    
$industry, $project_location, $project_type, $project_status){
    $query = "UPDATE `project` SET `department_id`='$department_id',`Project_name`='$Project_name',`Communication_type`='$Communication_type',`Project_status`='$Project_status',`Project_industry`='$industry',`Project_location`='$project_location',`Project_type`='$project_type' WHERE `Projectid` = '$Project_id'";
    return update($query);
}


function editProjectName($Projectid, $Project_name){
    $query = "UPDATE `project` SET `Project_name`='$Project_name', ' WHERE `Projectid` = '$Projectid'";
    return update($query);
}

function editProjectStatus($Projectid, $Project_Status){
    $query = "UPDATE `project` SET `Project_status`='$Project_status' WHERE `Projectid` = '$Projectid'";
    return update($query);
}

function deleteProject($projectid){
    $query = "DELETE FROM `project` WHERE `Projectid` = $projetid";
    return delete($query);
}

// find the a project based on the name 
function SearchProject($projectName){
    $query = "SELECT `Projectid`, `department_id`, `Project_SDG`, `Project_name`, `Communication_type`, `Project_status`, `Project_industry`, `Project_location`, `Project_type` FROM `project` WHERE `Project_name`LIKE '%$projectName%'";
    
    return select($query);
}

function insertIntoProject($department_id, $Project_name,$Project_description,$Communication_type,
$Project_status, $Project_industry,$Project_location,$Project_type){
    $query="INSERT INTO `project`(`department_id`, `Project_name`, `Project_description`,
    `Communication_type`, `Project_status`, `Project_industry`, `Project_location`, `Project_type`)
     VALUES ('$department_id','$Project_name','$Project_description','$Communication_type',
     '$Project_status','$Project_industry','$Project_location','$Project_type')";
    return insert($query);
}


function totalProject(){
    $query = "select DISTINCT count(project.Projectid) as number from project";
    return totalAll($query,"number");
   }

   function testedProjects(){
       $query="SELECT DISTINCT count(Projectid) as number from project where Project_status='testing'";
       return totalAll($query,"number");

   }

   function prototypingProject(){
    $query="SELECT DISTINCT count(Projectid) as number from project where Project_status='Prototyping'";
    return totalAll($query,"number");

   }

   function inoperationProjects(){
    $query="SELECT DISTINCT count(Projectid) as number from project where Project_status='in-operation'";
    return totalAll($query,"number");

   }

   function totalEngineeringProjects(){}




   function displayProjects(){

    $result = projectInfoByAStatus();
        // Project.projectid,Project.Project_name, Individuals.fname, Individuals.lname,Stakeholders.contact,Project.Project_description, Project.Project_location
        if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['projectid'];
                $projectName = $row['Project_name'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $contact = $row['contact'];
                $description= $row['Project_description'];
                $location = $row['Project_location'];

                echo "<tr> <td>
        <span class='custom-checkbox'>
            <input type='checkbox' id='checkbox1' name='options[]' value='$id'>
            <label for='checkbox1'></label>
        </span>
    </td>
    <td>$projectName </td>
    <td>$fname</td>
    <td>$lname</td>
    <td>$contact</td>
    <td>$description</td>
    <td>$location</td>
    <td>
        <a href='#editEmployeeModal' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit' on>&#xE254;</i></a>

        <a href='#deleteEmployeeModal' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete' >&#xE872;</i></a>
    </td>
</tr>";
            }
        }

    
}



function projectSDG(){
    $query="Select project.Projectid ,project.Project_name,sdg.SD_goals, project.Project_status, concat(individuals.fname,' ', individuals.lname) as name,project.Project_type ,project.Project_industry from project,individuals,stakeholder_project,sdg,stakeholders,sdg_project where project.Projectid=stakeholder_project.projectid and stakeholders.stakeholderid=stakeholder_project.stakeholderid and individuals.stakeholderid=stakeholders.stakeholderid and sdg_project.SDG_ID=sdg.SDG_ID and project.Projectid=sdg_project.Projectid and stakeholder_project.stakeholder_type='Coaches'";
    return select($query);
}


function displayProjectSDG(){

    $result = projectSDG();
        // th>Project Name</th>
        //<th>Project SDG</th>
        //<th>Project Status</th>
        //<th>Project Coach/Mentor</th>
        //<th>Project Type</th>
        //<th>Project Industry</th>
        if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['projectid'];
                $projectName = $row['Project_name'];
                $SD_goals = $row['SD_goals'];
                $Project_status = $row['Project_status'];
                $name = $row['name'];
                $Ptype = $row['Project_type'];
                $Project_industry= $row['Project_industry'];
                
                echo "<tr> <td>
        <span class='custom-checkbox'>
            <input type='checkbox' id='checkbox1' name='options[]' value='$id'>
            <label for='checkbox1'></label>
        </span>
    </td>
    <td>$projectName </td>
    <td>$SD_goals</td>
    <td>$Project_status</td>
    <td>$name</td>
    <td>$Ptype</td>
    <td>$Project_industry</td>
    <td>
        <a href='#editEmployeeModal' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit' on>&#xE254;</i></a>

        <a href='#deleteEmployeeModal' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete' >&#xE872;</i></a>
    </td>
</tr>";
            }
        }

    
}








?>


