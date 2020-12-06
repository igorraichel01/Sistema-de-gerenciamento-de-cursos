<?php

if(isset($_POST['usuario'])&& !empty($_POST['usuario']) && isset($_POST['senha'])&& !empty($_POST['senha'])){
  
require 'classe1.php';
require 'usuarioC.php';


$u = new Usuario();

$usuario = addslashes($_POST['usuario']);
$senha = addslashes($_POST['senha']);

   if($u->login($usuario,$senha) == true){

   	if(isset($_SESSION['idUSER'])){
        header("Location:siscursos.php");

   	}
   	else{
   		header("Location:index.php");

   	}

    }
    else{
    	  header("Location:index.php");
    	}

}
else
{
     header("Location:index.php");
}

?>