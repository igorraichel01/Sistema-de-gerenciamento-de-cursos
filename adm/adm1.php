<?php
//require_once 'aluno.php';
//$a = new aluno("dbphp7","localhost","root","");
//?>


<!DOCTYPE html>
<html lang="pt-br">
<head>

	   <meta charset="utf-8">
	   <title>cursos</title>
	   <link rel="stylesheet" href="..\estilo.css">

</head>
<body>

	
	 <header>
	 	<h1>Cursos Tabajara</h1>
         <div id="menu">
         <a href="..\index.php">Adminstrador</a>	

         </div>
     </header>
 	<h2> MODO ADMINISTRADOR</h2>
  <br>
 
 <section id="esquerda">
 	<form  action="admcursos.php" method="POST" >
 		<h2>Entrar</h2>
 		<label for="usuario">Admin</label>
 		<input type="text" name="admin" id="nome">
 		<label for="Senha">senha</label>
 		<input type="text" name="senha" id=senha> 		
 		<input type="submit" value="Entrar">
 		<a href= "adm2.php"><strong>Cadastrar</strong></a>

 	</form>	
 	
 </section>
 
</body>
</html>

