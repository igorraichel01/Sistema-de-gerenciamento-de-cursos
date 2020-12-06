

<?php

require_once '..\pessoa.php';
$u = new pessoa("dbphp7","localhost","root","");
?>



<!DOCTYPE html>

<html lang="pt-br">
     <head>
     	<meta charset="utf-8">
     	<title>Plataforma de cursos</title>
     	<link rel="stylesheet" href="..\estilo.css">
     </head>	
     <body>

     	<h1>Cursos Tabajara</h1>
     	<section id="center">
       	      <form method="POST" >
     	      	  <h2>Cadastro de administrador</h2>
                   
                    <input type="nome" name ="nome" placeholder="Nome completo"> 
                     <input type="password" name ="senha" placeholder="Senha">
                      <input type="password" name="confsenha" placeholder="Confirma Senha">
                      <input type="submit"value="CADASTRAR">
                      <a href= "adm1.php"><strong>voltar</strong></a>
                       <a href="..\index.php">Adminstrador</a>  

             </form>
       </section>
 

      <?php
     if(isset($_POST['nome']))
     {
      
      $nome=addslashes($_POST['nome']);
     
      $senha=addslashes($_POST['senha']);
       $confsenha=addslashes($_POST['confsenha']);


      if(!empty($nome) && !empty($confsenha)&& !empty($senha))
      {       if($senha==$confsenha)
              if(!$u->cadastraradm($nome,$senha))
              {
                   echo "administrador ja esta cadastrado";
              }
              else
                {
                  echo "Cadastro Realizado com sucesso.";
                }

         }
      else 
      {
           echo "Preencha todos os campos";
      }
     }
   

  ?>
 
      
      
     </body>	



</html>


