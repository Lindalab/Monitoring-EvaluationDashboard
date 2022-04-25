<?php

require "sqlfunctions.php";
function createNewDepartment($dapartmentname){
    $query="INSERT INTO `department`(`depart_name`) VALUES ('$dapartmentname')";
    return insert($query);
}
function addNewRoles($rolename){
    $query="INSERT INTO `roles`(`role_name`) VALUES ('$rolename')";
    return insert($query);
}

function selectAllFromTable($tablename){
    $query="SELECT * FROM `$tablename` ";
    return select($query);

}
?>