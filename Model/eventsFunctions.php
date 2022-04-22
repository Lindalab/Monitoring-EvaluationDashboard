<?php


require ("sqlfunctions.php");
// check number of times various events has happen
function eventOccurrance(){
    $query="select *, count(event_name) from Events group by event_name";
    return select($query);
}

//check events Occurance by a type 
function eventOccurranceByType($eventType){
    $query="select *, count(event_name) from Events where event_name = '$eventType'";
    return select($query);
}



function eventsAttendByAParticularIndividualsGender($role_id){
    $query="select Individuals.gender, count(Individuals.stakeholderid) as number_of_Attendees , Events.event_type
    from Events, Individuals, Stakeholder_Event 
    where  Stakeholder_Event.eventid= Events.eventid
    and Stakeholder_Event.stakeholderid= Individuals.stakeholderid 
    and Individuals.role_id = '$role_id'
    group by Individuals.gender";
    return select($query);

}

function eventTypeAttendByAParticluarStakeholderGender($role_id,$eventType){
    $query="select Individuals.gender, count(Individuals.stakeholderid) as number_of_Attendees 
    from Events, Individuals, Stakeholder_Event 
    where  Stakeholder_Event.eventid= Events.eventid
    and Stakeholder_Event.stakeholderid= Individuals.stakeholderid 
    and Individuals.role_id = '$role_id'
    and Events.event_type= '$eventType'
     group by Individuals.gender";
    return select($query);

}

function eventTypeAndAllStakeholders($eventType){
    $query="select Individuals.fname,Individuals.lname,Roles.role_name, Stakeholders.email
    from Individuals, Events,Roles, Stakeholder_Event, Stakeholders
    where  Stakeholder_Event.eventid= Events.eventid
    and Stakeholder_Event.stakeholderid= Individuals.stakeholderid
    and Stakeholders. stakeholderid= Individuals.stakeholderid
    and Events.event_type= '$eventType'
    and Individuals.role_id= Roles.role_id
     group by Roles.role_name";
    return select($query);

}



function eventTypeAttendByAParticluarStakeholder($role_id,$eventType){
    $query="select Individuals.fname,Individuals.lname,Roles.role_name, Stakeholders.email
    from Individuals, Events,Roles, Stakeholder_Event, Stakeholders
    where  Stakeholder_Event.eventid= Events.eventid
    and Stakeholder_Event.stakeholderid= Individuals.stakeholderid
    and Stakeholders. stakeholderid= Individuals.stakeholderid
    and Individuals.role_id= Roles.role_id
    and Events.event_type= '$eventType'
    and Individuals.role_id= '$role_id' 
    ";
    
    return select($query);

}


function deleteAnEvent($eventid){
    $query="DELETE FROM `events` WHERE eventid = '$eventid' ";
    return delete($query);
}

function updateAnEventName($eventid, $event_name){
    $query=" UPDATE `events` SET `event_name`='$event_name' WHERE eventid ='$eventid' ";
    return delete($query);
}

function updateEventType($eventid, $event_type){
    $query="UPDATE `events` SET `event_type`='$event_type' WHERE eventid= '$eventid' ";
    return delete($query);
}

function updateEventDescription($eventid, $event_description){
    $query="UPDATE `events` SET `event_description`='$event_description' WHERE eventid= '$eventid' ";
    return delete($query);
}

function insertintoEvent($department_id,$event_name, $event_start_date, $event_end_date,
$event_target_group,$event_type,$event_description){
    $query= " INSERT INTO `events`(`department_id`, `event_name`, `event_start_date`, `event_end_date`, `event_target_group`,`event_type`, `event_description`)
     VALUES ('$department_id','$event_name','$event_start_date',' $event_end_date','$event_target_group','$event_type','$event_description')";
    return insert($query);
}









?>
