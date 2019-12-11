<?php

function is_Logged(){
    if (!$_SESSION['user']){
        return false;
    }
    return true;
}
function is_Guest(){
    if ($_SESSION['user']){
return false;
    }
    return true;
}

// gt anything from db
function get($table,$limit=0,$orderBy=0,$desc=0){
    global $conn;
    $sql = "SELECT * FROM `$table` ";
    if ($limit){
        $sql.= " LIMIT $limit";
    }
    if ($orderBy){
        $sql.= " ORDER BY $orderBy";
    }
    if ($desc){
        $sql.= " DESC";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch();
}