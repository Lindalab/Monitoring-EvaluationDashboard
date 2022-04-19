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



function eventsAttendByAParticularStakeholderGender($role_id){
    $query="select Stakeholders.gender, count(Stakeholders.stakeholderid) as number_of_Attendees , Events.event_type
    from Events, Stakeholders, Stakeholder_Event 
    where  Stakeholder_Event.eventid= Events.eventid
    and Stakeholder_Event.stakeholderid= Stakeholders.stakeholderid 
    and Stakeholders.role_id = $role_id
     group by Stakeholders.gender";
    return select($query);

}

function eventTypeAttendByAParticluarStakeholderGender($role_id,$eventType){
    $query="select Stakeholders.gender, count(Stakeholders.stakeholderid) as number_of_Attendees 
    from Events, Stakeholders, Stakeholder_Event 
    where  Stakeholder_Event.eventid= Events.eventid
    and Stakeholder_Event.stakeholderid= Stakeholders.stakeholderid 
    and Stakeholders.role_id = $role_id
    and Events.event_type= $eventType
     group by Stakeholders.gender";
    return select($query);

}

function eventTypeAndAllStakeholders($eventType){
    $query="select Stakeholders.gender, count(Stakeholders.stakeholderid) as number_of_Attendees,
    from Events, Stakeholders, Stakeholder_Event 
    where  Stakeholder_Event.eventid= Events.eventid
    and Stakeholder_Event.stakeholderid= Stakeholders.stakeholderid 
    and Events.event_type= $eventType
     group by Stakeholders.gender";
    return select($query);

}

function eventsAttendByAParticularStakeholder($role_id){
    $query="select Stakeholders.gender, count(Stakeholders.stakeholderid) as number_of_Attendees , Events.event_type
    from Events, Stakeholders, Stakeholder_Event 
    where  Stakeholder_Event.eventid= Events.eventid
    and Stakeholder_Event.stakeholderid= Stakeholders.stakeholderid 
    and Stakeholders.role_id = $role_id";
    return select($query);

}

function eventTypeAttendByAParticluarStakeholder($role_id,$eventType){
    $query="select Stakeholders.gender, count(Stakeholders.stakeholderid) as number_of_Attendees 
    from Events, Stakeholders, Stakeholder_Event 
    where  Stakeholder_Event.eventid= Events.eventid
    and Stakeholder_Event.stakeholderid= Stakeholders.stakeholderid 
    and Stakeholders.role_id = $role_id
    and Events.event_type= $eventType";
    return select($query);

}









?>
