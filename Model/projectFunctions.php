<?php

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

function projectInfoByAStatus($Project_status){
    $query="Select  Project.Project_name, Individuals.fname, Individuals.lname,Stakeholders.contact,Project.Project_description 
    from  Project , Stakeholders, Stakholder_Project, Individuals
    where Project.projectid= Stakholder_Project.projectid
    and Stakeholders.stakeholderid=Stakholder_Project.stakeholderid
    and  Stakeholders.stakeholderid= Individuals.stakeholderid
    and Stakholder_Project.stakholder_type = 'Owner'
    and  Project.Project_status= '$Project_status'";
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

function projectUnderADepartmentAndStatus($department){
    $query=" Select Project. Project_name , Project.Project_status 
    from Project, Department
    where Project.department_id=Department.depart_id
    and depart_name= '$department' ";
    return select($query);
}

function projectUnderADepartmentSDG($department){
    $query= "Select Project.Project_name , SDG.SD_goals 
    from Project, SDG ,SDG_Project, Department
    where Project.Projectid= SDG_Project.Projectid
    and  SDG.SDG_ID= SDG_Project.SDG_ID
    and Project.department_id=Department.depart_id
    and depart_name= '$department'";
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

?>


