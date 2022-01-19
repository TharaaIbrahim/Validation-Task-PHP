<?php
session_start();
include_once("../connection.php"); 
if($_SERVER["REQUEST_METHOD"]==="GET"){
    $delete=$_GET['id'];
    $sql="Delete FROM userdata WHERE id='$delete'";
    $result=$connection->prepare($sql);
    $result->execute(); 
    header('Location:tables.php');
}

?>