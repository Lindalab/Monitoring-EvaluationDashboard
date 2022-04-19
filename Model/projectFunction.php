<?php

function projectInfoStatus(){
    $query="Select  Project.Project_name, Stakeholders.fname, Stakeholders.lname ,Stakeholders.contact, Project.Project_status 
    from  Project , Stakeholders, Student_Project
    where Project.projectid= Student_Project.projectid
    and  Stakeholders.stakeholderid= Student_Project.stakeholderid";
    return select($query);
}

function projectInfo(){
    $query="Select  Project.Project_name, Stakeholders.fname, Stakeholders.lname ,Stakeholders.contact, Project.Project_status 
    from  Project , Stakeholders, Student_Project
    where Project.projectid= Student_Project.projectid
    and  Stakeholders.stakeholderid= Student_Project.stakeholderid";
    return select($query);
}
?>