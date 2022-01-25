<?php
session_start();
include_once("../connection.php"); 

    if($_SERVER["REQUEST_METHOD"]==="GET"){
    $delete=$_GET['id'];
    if($_GET['name']==="pro"){
         $sql="Delete FROM products WHERE id='$delete'";
          $result=$connection->prepare($sql);
          $result->execute(); 
    }else if($_GET['name']==="category"){
        $sql="Delete FROM products WHERE category_Id='$delete'";
        $result=$connection->prepare($sql);
        $result->execute(); 

        $sql="Delete FROM category WHERE id='$delete'";
          $result=$connection->prepare($sql);
          $result->execute(); 
    }
   else{
    $sql="Delete FROM userdata WHERE id='$delete'";
    $result=$connection->prepare($sql);
          $result->execute();
   }
  
    header('Location:tables.php');
}

?>