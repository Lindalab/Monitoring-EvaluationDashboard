<?php


require ("dbconnect.php");


function select($sqlSelectQuery){
    require ("dbconnect.php");
    $runQuery=$conn->query($sqlSelectQuery);
    $resultArray=array();
    if($runQuery->num_rows > 0){
    while($row = $conn->fetch_assoc($runQuery)) { 
        $resultArray[] = $row; 
    }
    return $resultArray;
    }
    
    return -1;
}


function insert($sqlInsert){
    require ("dbconnect.php");
    $insertResult=$conn->query($sqlInsert);
    if($insertResult === True){
        return true;
    }
    else{
       return false;
    }
  }

function delete($sqlDelete){
  require ("dbconnect.php");
  $deleteResult=$conn->query($sqlDelete);
  if($deleteResult === True){
       return true;
  }
     return false;
}

function getLastInsertedID($sql){
    require ("dbconnect.php");
    $result = $conn->query($sql);
    if($result === TRUE){
        return $conn->insert_id;
    }
    return -1;

}

function update($sqlUpdate){
    require ("dbconnect.php");
    $updateResult=$conn->query($sqlUpdate);
    if($updateResult === True){
        return true;
    }
       return false;
  }

   function selectAllFromTable($tablename){
       $query="SELECT * FROM `$tablename` ";
       return select($query);

   }

  
  $updatetest="DELETE FROM `product` WHERE 'id' = '1'";

delete($updatetest);




?>