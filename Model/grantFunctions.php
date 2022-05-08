<?php


require_once "sqlfunctions.php";

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
    $query="SELECT sum(grants.Grant_Amount) as amount FROM grants";
    return select($query);
}

function totalDepartmentUnderGrant(){
    $query = "SELECT COUNT(DISTINCT department_id) as total FROM `grant_department` WHERE 1";
    return select($query);
}


function departmentTotalGrant(){
    $query = "SELECT department.depart_id, department.depart_name as Department, SUM(`Amountgiven`) as total_grant FROM `grant_department`, department, grants WHERE grant_department.department_id = department.depart_id and grants.Grantid = grant_department.Grantid GROUP BY department.depart_id";

    return select($query);
}

function grantForDepartment(){
    $query = "SELECT department.depart_id, grants.Grantid, grants.Grant_name, department.depart_name, `Amountgiven` FROM `grant_department`, department, grants WHERE grant_department.department_id = department.depart_id and grants.Grantid = grant_department.Grantid";

    return select($query);
}

function projectTotalGrantReceived(){
    $query = "SELECT `Grantid`, project.Project_name, project.Projectid, SUM(`Amountgiven`) as total FROM `grant_project`, project WHERE grant_project.Projectid = project.Projectid";

    return totalAll($query,"total");
}



function displayTotalGrantsRecieved(){
   $result =  totalGrantRecieved();

   if($result->num_rows > 0){
       $row = mysqli_fetch_assoc($result);
       return $row['amount'];
   }
}

function displayTotalProjectUnderGrants(){
    $query = "SELECT COUNT(DISTINCT`Projectid`) as number FROM `grant_project`";
    return totalAll($query,"number");
}

function displayTableData(){
    $result = inforAboutGrant();

    //SELECT `Grantid`, `stakeholderid`, `Grant_name`, `Grant_Amount`, `Date_Recieved`, `Medium_recieved` FROM `grants`";

    if($result->num_rows > 0){
        while($row = mysqli_fetch_assoc($result)){
            $Grant_id = $row['Grantid'];
            $stakeholderid = $row['stakeholderid'];
            $Grant_name = $row['Grant_name'];
            $Grant_amount = $row['Grant_Amount'];
            $Date_received = $row['Date_Recieved'];
            $medium_received = $row['Medium_recieved'];
            echo "<tr>
            <form>
            <td>
                <span class='custom-checkbox'>
                <input type='checkbox' id='checkbox1' name='options[]' value='1'>
                <label for='checkbox1'></label>
                    <input type='hidden' name='id' value=$Grant_id>
                    <input type='hidden' name='id' value=$stakeholderid>
                  
                </span>
            </td>
            <td>$Grant_name</td>
            <td>$Grant_amount</td>
            <td>$Date_received</td>
        
            <td>$medium_received</td>
            <td>
                <a href='#editEmployeeModal' class='edit' type = 'submit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                <a href='#deleteEmployeeModal' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>
            </td>
            </form>
        </tr>";
        
        }
    }
}

function displayPotentialSponsors(){
    $sql = 'SELECT stakeholders.stakeholderid as id, Concat(individuals.fname," ", individuals.lname) as name from stakeholders, individuals, potential_sponsors where stakeholders.stakeholderid = individuals.stakeholderid and stakeholders.stakeholderid = potential_sponsors.stakeholderid';

    $query = 'SELECT stakeholders.stakeholderid as id, companies.company_name as name from stakeholders, companies, potential_sponsors where stakeholders.stakeholderid = companies.stakeholderid and stakeholders.stakeholderid = potential_sponsors.stakeholderid';

    $result = select($sql);
    $result2 = select($query);

    if($result->num_rows > 0){
        while($row = mysqli_fetch_assoc($result)){
            $name = $row['name'];
            $id = $row['id'];
            echo "<option value='$id'>$name</option>";
        }
    }
    if($result2->num_rows > 0){
        while($row = mysqli_fetch_assoc($result2)){
            $name = $row['name'];
            $id = $row['id'];
            echo "<option value='$id'>$name</option>";
        }
    }

}

function createGrant( $stakeholderid,$Grant_name, $Grant_amount, $Date_received, $medium_received){
    $sql = "INSERT INTO `grants`(`stakeholderid`, `Grant_name`, `Grant_Amount`, `Date_Recieved`, `Medium_recieved`) VALUES ('$stakeholderid','$Grant_name','$Grant_amount','$Date_received','$medium_received')";
    $lastid = getLastInsertedID($query);
    grant_department($department_id, $lastid, $Grant_amount);
    return $lastid; 
}


function grant_department($department_id, $Grant_id, $amount){
    $sql = "INSERT INTO `grant_department`(`department_id`, `Grantid`, `Amountgiven`) VALUES ('$department_id','$Grant_id','$amount')";
    $result = select($sql);

}

function companyPartner(){
  $sql = "SELECT COUNT(companies.stakeholderid) as number FROM `grants`, companies,potential_sponsors, stakeholders WHERE stakeholders.stakeholderid= potential_sponsors.stakeholderid and potential_sponsors.stakeholderid = grants.stakeholderid and stakeholders.stakeholderid=companies.stakeholderid"; 
  
  return totalAll($sql, "number");
}
?>


















