<?php

if(isset($_POST['admin'])&& !empty($_POST['admin']) && isset($_POST['senha'])&& !empty($_POST['senha'])){
  
require '..\classe1.php';
require '..\usuarioC.php';


$u = new Usuario();

$admin = addslashes($_POST['admin']);
$senha = addslashes($_POST['senha']);

   if($u->login($admin,$senha) == true){
    
      if(isset($_SESSION['idUSER'])){
   	
        header("Location:admcursos.php");

   	}
   	else{
   		header("Location:..\adm1.php");

   	}

    }
    else{
    	  header("Location:..\adm1.php");
    	}

}
else
{
     header("Location:..\adm1.php");
}

?>