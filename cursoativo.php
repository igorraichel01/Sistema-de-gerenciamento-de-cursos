

<?php
  require 'verifica.php';
  if(isset($_SESSION['idUSER']) && !empty($_SESSION['idUSER']))

   require_once 'usuarioC.php';
 //  require_once 'cursosC.php';
 $p = new usuario();
// $c= new curso("dbphp7","localhost","root","");
?>



<html lang="pt-br">
<head>

	   <meta charset="utf-8">
  <title>Cursos</title>
	   <link rel="stylesheet" href="estilo1.css">
</head>
<body>
	<h1> Cursos Ativos </h1>
<form action="certificado.php" method="POST" >



    <section id="esquerda">

 	<table>
 		  
         <td> <?php  
           echo $usuarioLogado['nome'];
         ?>  </td>
           <td> <?php  
           echo $usuarioLogado['id'];
         ?>  </td>
           <td> <?php  
           echo $usuarioLogado['email'];
         ?>  </td>
          <?php $nome=$usuarioLogado['nome'];?>

       </tr>
       <input type="text" name="texto" value="<?php echo $nome?>">
      </table>

    <?php
    $name=$usuarioLogado['nome'];

    $dados = $p->buscarCurso($name);
    if(count($dados) > 0)
    {
       for ($i =0; $i < count($dados); $i++){
        echo "<tr>";
        foreach ($dados[$i] as $k => $v){
          if($k != "id")
          {

              




          ?><br><td><a>Concluído </a><input type="radio" name="cursos"  value="<?php echo $v;?>"></td><?php
                   echo "<td>".$v."</td>";
              
                 
      $curso=$v;
    

     ?><?php
          }
         /* //<?php echo $i;?>*///<?php echo $v
        }
        
        echo "</tr>";
       }

       
           }
       else
       {
          echo " Não há pessoas cursos cadastrados";
       }
    
     ?>
    
         
           
          </td>

 
 </section>

  
 <input type="submit" name="<php echo $name;?>" value="Certificado" > 
</form>
	
  <footer><div class="afooter">  <a href="index.php">Sair</a></div></footer>
</body>
</html>

