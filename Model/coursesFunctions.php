<?php
require ("sqlfunctions.php");
// delete update

function showCoursesAndModules(){
    $query="Select  modules.module_name As Modules , modules.module_description As Description,
    Courses.course_name AS Courses,Courses.course_status As CourseStatus
    from Courses, modules
    where Courses.course_id=modules.course_id";
    return select($query);

}

function coursesAndNumberOfModules(){
    $query=" Select  Courses.course_name AS Courses,Courses.course_status As CourseStatus,
    count(modules.module_name) As Modules 
    from Courses, modules
    where Courses.course_id=modules.course_id";
    return select($query);
}

function modulesUnderParticularCourse($Course){
    $query=" Select  modules.module_name As Modules , modules.module_description As Description
    from Courses, modules
    where Courses.course_id=modules.course_id
    and Courses.course_name= '$Course'";
    return select($Course);
}

function deleteACourse($courseid){
    $query="Delete from Courses where course_id = '$courseid' ";
    return delete($query);
}

function updateACourseName($courseid, $courseName){
    $query="Update Courses set `course_name`='$courseName' where 'course_id' = '$courseid' ";
    return delete($query);
}

function updateACourseStatus($courseid, $courseStatus){
    $query="Update  `courses` set 'course_status' ='$courseStatus' where 'course_id' = '$courseid' ";
    return delete($query);
}

function insertintoCourse($courseName,$courseDate, $courseStatus, $courseDescription){
    $query= "insert into `courses`(`course_name`, `date_started`, `course_status`, `course_description`) 
    VALUES('$courseName','$courseDate','$courseStatus', '$courseDescription') ";
    return insert($query);
}

/* Modules */

function deleteAModules($module_id){
    $query="Delete from modules where module_id = '$module_id' ";
    return delete($query);
}

function updateAModuleName($module_id, $module_name){
    $query="Update modules set `module_name`='$module_name' where 'module_id' = '$module_id' ";
    return delete($query);
}

function insertintoModules($course_id,$module_name, $module_description){
    $query= "INSERT INTO `modules`(`course_id`, `module_name`, `module_description`) 
    VALUES ('$course_id','$module_name','$module_description') ";
    return insert($query);
}

?>