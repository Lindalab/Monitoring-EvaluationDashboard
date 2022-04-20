<?php

function projectInfoStatus(){
    $query="Select  Project.Project_name, Stakeholders.fname, Stakeholders.lname ,Stakeholders.contact, Project.Project_status 
    from  Project , Stakeholders, Student_Project
    where Project.projectid= Student_Project.projectid
    and  Stakeholders.stakeholderid= Student_Project.stakeholderid";
    return select($query);
}

function projectInfoByAStatus($Project_status){
    $query="Select  Project.Project_name, Stakeholders.fname, Stakeholders.lname ,Stakeholders.contact 
    from  Project , Stakeholders, Student_Project
    where Project.projectid= Student_Project.projectid
    and  Stakeholders.stakeholderid= Student_Project.stakeholderid
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

?>