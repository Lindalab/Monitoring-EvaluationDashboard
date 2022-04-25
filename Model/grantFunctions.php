<?php

require "stakeholders.php";
require "sqlfunctions.php";

function inforAboutGrant(){
    $query="SELECT `Grantid`, `stakeholderid`, `Grant_name`, `Grant_Amount`, `Date_Recieved`, `Medium_recieved` FROM `grants`";
    return select($query);
}
function projectUnderGrants(){
    $query = "select grants.Grantid, project.Projectid ,grants.Grant_name,project.Project_name,grant_project.Amountgiven\n"

    . "FROM grants,grant_project,project\n"

    . "WHERE grants.Grantid=grant_project.Grantid\n"

    . "and project.Projectid=grant_project.Projectid";

    return select($query);

}

function eventsUnderAGrants($Grant_id){
    $query="SELECT grants.Grantid, events.eventid,events.event_name,events.event_type
     FROM events,grant_event,grants 
     WHERE events.eventid=grant_event.eventid
      and grants.Grantid=grant_event.Grantid 
      and grants.Grantid = '$Grant_id'";
    return select($query);
}
function eventsAndGrants(){
    $query= "select grants.Grantid, events.eventid, events.event_name ,grants.Grant_name , 
    grant_event.Amountgiven from events,grants,grant_event where grants.Grantid=grant_event.Grantid 
    and events.eventid= grant_event.eventid";
    return select($query);
}



function viewCompanyGrant(){
    $query = "
    SELECT grants.Grantid, grants.stakeholderid, company_name,`Grant_name`, `Grant_Amount`, `Date_Recieved`, `Medium_recieved` FROM `grants`, companies,potential_sponsors, stakeholders WHERE stakeholders.stakeholderid= potential_sponsors.stakeholderid and potential_sponsors.stakeholderid = grants.stakeholderid and stakeholders.stakeholderid=companies.stakeholderid";

    return select($query);
}

function createPotentialSponsor($stakeholderid, $Date_ccontacted, $Contact_Status, $Medium_contact, $Reason_for_contact){
    $query="INSERT INTO `potential_sponsors`(`stakeholderid`, `Date_contacted`, `Contact_Status`, `Medium_contact`, `Reason_for_contact`) VALUES ('$stakeholderid','$Date_ccontacted','$Contact_Status','$Medium_contact','$Reason_for_contact')";
    return insert($query);
}

function addNewGrant($stakeholderid, $Grant_name, $Grant_amount, $Date_received, $medium_received){
    $query = "INSERT INTO `grants`(`stakeholderid`, `Grant_name`, `Grant_Amount`, `Date_Recieved`, `Medium_recieved`) VALUES ('$stakeholderid','$Grant_name','$Grant_amount','$Date_received','$medium_received')";
     return insert($query);   
}

function totalGrantRecieved(){
    $name= "Total Grants";
    $query="SELECT sum(grants.Grant_Amount) as $name  FROM grants";
    return select($query);
}

function totalDepartmentUnderGrant(){
    $query = "SELECT COUNT(DISTINCT department_id) as total FROM `grant_department` WHERE 1";
    return select($query);
}


function departmentTotalGrant(){
    $query = "SELECT department.depart_id, department.depart_name, SUM(`Amountgiven`) FROM `grant_department`, department, grants WHERE grant_department.department_id = department.depart_id and grants.Grantid = grant_department.Grantid GROUP BY department.depart_id";

    return select($query);
}

function grantForDepartment(){
    $query = "SELECT department.depart_id, grants.Grantid, grants.Grant_name, department.depart_name, `Amountgiven` FROM `grant_department`, department, grants WHERE grant_department.department_id = department.depart_id and grants.Grantid = grant_department.Grantid";

    return select($query);
}

function projectTotalGrantReceived(){
    $query = "SELECT `Grantid`, project.Project_name, project.Projectid, SUM(`Amountgiven`) FROM `grant_project`, project WHERE grant_project.Projectid = project.Projectid GROUP BY grant_project.Projectid";

    return select($query);
}



?>














