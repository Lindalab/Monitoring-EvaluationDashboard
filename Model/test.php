<?php


require_once "..\Model\createNewEntities.php";
// echo displayTotalGrantsRecieved();
$result=departmentshows();
if($result->num_rows > 0){
    echo "yes";
}
?>
