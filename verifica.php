<?php
require 'classe1.php';

if(isset($_SESSION['idUSER'])&&!empty($_SESSION['idUSER'])){
	

require_once 'usuarioC.php';
$u = new usuario();

$usuarioLogado = $u->logado($_SESSION['idUSER']);
//echo $usuarioLogado['nome'];
//echo $usuarioLogado['id'];
//echo $usuarioLogado['email'];

}else{
	header("Location: index.php");
}
  

  ?>