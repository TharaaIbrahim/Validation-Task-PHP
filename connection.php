<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "store";
	try{
        $connection=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOExecption $e){
        echo $sql . "<br>" . $e->getMessage();
    }
?>