<?php

require_once "sqlfunctions.php";

function departmentshows(){
    $query="SELECT depart_id, depart_name from department";
    return select($query);
}

function createNewDepartment($dapartmentname){
    $query="INSERT INTO `department`(`depart_name`) VALUES ('$dapartmentname')";
    return insert($query);
}
function addNewRoles($rolename){
    $query="INSERT INTO `roles`(`role_name`) VALUES ('$rolename')";
    return insert($query);
}

function totalDepartment(){
    $query = "SELECT count(depart_id)  as number FROM `department`;";
    return totalAll($query,"number");

}



function infoDepartmentProj(){
    $query= "SELECT department.depart_id ,department.depart_name , count(project.Projectid) as number1
    FROM department,events,project  where department.depart_id=project.department_id";
    return select($query);
    

}

function infoDepartmentEvent(){
    $query= "SELECT department.depart_id ,department.depart_name , count(events.eventid) as number2
    FROM department,events,project  where  department.depart_id=events.department_id";
    return select($query);
    

}

function displayDeptProj(){

    $result = infoDepartmentProj();
        // eventid	department_id	event_name	event_start_date	event_end_date	event_target_group	event_type	event_description 
        if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['depart_id'];
                $depart_name = $row['depart_name'];
                $totalProjects = $row['number1'];
                // $totalEvents = $row['number2'];
                

                echo "<tr> <td>
        <span class='custom-checkbox'>
            <input type='checkbox' id='checkbox1' name='options[]' value='$id'>
            <label for='checkbox1'></label>
        </span>
    </td>

    <td>$depart_name</td>
    <td>$totalProjects</td>
   
    
    <td>
        <a href='#editEmployeeModal' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit' on>&#xE254;</i></a>

        <a href='#deleteEmployeeModal' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete' >&#xE872;</i></a>
    </td>
</tr>";
            }
        }

}






function displaySelectDepartment(){
    $result = departmentshows();
    if($result->num_rows > 0){
        while($row = mysqli_fetch_assoc($result)){
            $depart_id = $row['depart_id'];
            $depart_name = $row['depart_name'];

            echo "<option value='$depart_id'>$depart_name</option>";
        }
    }
}

?>