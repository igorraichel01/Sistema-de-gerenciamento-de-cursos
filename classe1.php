<?php

session_start();

$host="localhost";
$user ="root";
$senha="";
$nomeBD ="dbphp7";
 global $pdo;

try{
 $pdo = new PDO("mysql:dbname=".$nomeBD.";host=".$host,$user,$senha);
}

catch(PDOException $e)
{
	echo "Erro :".$e->getMessage();

}

?>
