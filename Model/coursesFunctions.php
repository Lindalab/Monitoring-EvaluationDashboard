<?php
require ("sqlfunctions.php");
function showCoursesAndModules(){
    $query="Select  modules.module_name As Modules , modules.module_description As Description,
    Courses.course_name AS Courses,Courses.course_status As CourseStatus
    from Courses, modules
    where Courses.course_id=modules.course_id";
    return select($query);

}

function eventOccurrance(){
    $query=" Select  Courses.course_name AS Courses,Courses.course_status As CourseStatus,
    count(modules.module_name) As Modules 
    from Courses, modules
    where Courses.course_id=modules.course_id";
    return select($query);
}

function projectCoaches(){
    $query="select Stakeholders.fname, Stakeholders.lname, Stakeholders.contact, Stakeholders.email, Stakeholders.gender
    from Stakeholders, Coaches_Project, Roles
    where  Stakeholders.stakeholderid= Coaches_Project.stakeholderid
    and  Stakeholders.role_id= Roles.role_id
    and Roles.role_name = 'Company_coache_grants' or 'Company_coache' or 'Individual_Coache' ";
    return select($query);
}

function companyCoaches(){
    $query="select Stakeholders.fname, Stakeholders.lname, Stakeholders.contact, Stakeholders.email, Stakeholders.gender
    from Stakeholders, Coaches_Project, Roles
    where  Stakeholders.stakeholderid= Coaches_Project.stakeholderid
    and  Stakeholders.role_id= Roles.role_id
    and Roles.role_name = 'Company_Coaches' and 'Company_coache_grants' ";
    return select($query);  
}





?>