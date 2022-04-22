<?php

function inforAboutGrant(){
    $query="";
    return select($query);
}
function projectUnderGrants(){}
function programUnderGrants(){}
function grantForDepartment(){}
function allProjectAndGrant(){}

function addNewGrant(){
    $query="";
    return insert($query);
}



?>

INSERT INTO `grants`(`Grantid`, `stakeholderid`, `Grant_name`, `Grant_Amount`, `Date_Recieved`, 
`Medium_recieved`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]',
'[value-6]')
