

<?php

require_once 'pessoa.php';
$u = new pessoa("dbphp7","localhost","root","");
?>



<!DOCTYPE html>

<html lang="pt-br">
     <head>
     	<meta charset="utf-8">
     	<title>Plataforma de cursos</title>
     	<link rel="stylesheet" href="estilo.css">
     </head>	
     <body>

     	<h1>Cursos Tabajara</h1>
     	<section id="center">
       	      <form method="POST" >
     	      	  <h2>Cadastro de aluno</h2>
                    <input type="user"  name ="usuario" placeholder=" Nome que deseja ser chamado"> 
                    <input type="nome" name ="nome" placeholder="Nome completo"> 
                     <input type="E-mail" name="email" placeholder="E-mail">
                     <input type="password" name ="senha" placeholder="Senha">
                      <input type="password" name="confsenha" placeholder="Confirma Senha">
                      <input type="submit"value="CADASTRAR">
                      <a href= "index.php"><strong>voltar</strong></a>

             </form>
       </section>
 

      <?php
     if(isset($_POST['nome']))
     {
      $usuario=addslashes($_POST['usuario']);
      $nome=addslashes($_POST['nome']);
      $email=addslashes($_POST['email']);
      $senha=addslashes($_POST['senha']);
       $confsenha=addslashes($_POST['confsenha']);


      if(!empty($usuario) && !empty($nome) && !empty($email)&& !empty($senha))
      {       if($senha==$confsenha)
              if(!$u->cadastrarpessoa($usuario,$nome,$email,$senha))
              {
                   echo "email ja esta cadastrado";
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


