<?php
require_once '..\pessoa.php';
$p = new pessoa("dbphp7","localhost","root","");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

	   <meta charset="utf-8">
	   <title>adm</title>
	   <link rel="stylesheet" href="..\estilo.css">

</head>
<body>
	<?php
     if(isset($_POST['nome']))
     {
     	$nome=addslashes($_POST['nome']);
     	$id=addslashes($_POST['num']);
     
     	if(!empty($nome)&& !empty($id) )
     	{
              if(!$p->cadastrarcursos($nome,$id))
              {
                   echo "curso já cadastrado!";
              }
              
     	}
     	else 
     	{
           echo "Preencha o campo";
     	}
     }

	?>
 <section id="esquerda">
 	<form method="POST">
 		<h2>Cadastro de cursos</h2>
 		<label for="nome">Nome</label>
 		<input type="text" name="nome" id="nome">

    <label for="num">digite um id </label>
    <input type="text" name="num" id="num">
 		<input type="submit" value="Cadastrar">
     <a href= "adm1.php"><strong>voltar</strong></a>
 	</form>	
 </section>


 <section id="direita">
 	<table>
 		 <tr id="titulo">
          <td>curso</td>
         

 	  </tr>
 	<?php
 	  $dados = $p->buscarADM();
 	  if(count($dados) > 0)
 	  {
 	  	 for ($i =0; $i < count($dados); $i++){
 	  	 	echo "<tr>";
 	  	 	foreach ($dados[$i] as $k => $v){
 	  	 		if($k != "id")
 	  	 		{
                   echo "<td>".$v."</td>";
 	  	 		}

 	  	 	}
 	  	 	?><td>
         <a href="admcursos.php?id=<?php echo $dados[$i]['id'];?>">Excluir</a></td><?php
 	  	 	echo "</tr>";
 	  	 }

 	  	 
 	  }
       else
       {
          echo " lista vazia";
       }
 	  
 	   ?>
 

 	</table>
 </section>

</body>
</html>

<?php
if(isset($_GET['id']))
{

   $id_curso = addslashes($_GET['id']);
   $p-> excluir($id_curso);
   header("location: admcursos.php");

}

?>