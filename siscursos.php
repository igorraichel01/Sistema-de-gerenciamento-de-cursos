

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
	<h1> Seleção de cursos </h1>
<form method="POST" >

<section id="direita">
  <table>
     <tr id="titulo">
      <div class="container">
         <div id ="menu" > 
          <a href="cursoativo.php">Meus cursos ativos e concluídos</a>
          <a href="index.php">Voltar</a>
        </div>
      </div>
    </tr>
     

  </table>
 </section>

    <section id="esquerda">

 	<table>
 		  <td>nome</td>
          <td>id</td>
          <td>email</td>

            
          <tr>
         <td> <?php  
           echo $usuarioLogado['nome'];
         ?>  </td>
           <td> <?php  
           echo $usuarioLogado['id'];
         ?>  </td>
           <td> <?php  
           echo $usuarioLogado['email'];

         ?>  </td>
          
       </tr>       
 	</table>
 <p><strong> Cursos Disponíveis</strong></p>



  <?php
    $dados = $p->buscar();
    if(count($dados) > 0)
    {
       for ($i =0; $i < count($dados); $i++){
        echo "<tr>";
        foreach ($dados[$i] as $k => $v){
          if($k != "id")
          {   
            ?><br><td> <input type="checkbox" name="<?php echo $i;?>" value="<?php echo $v;?>">  </td><?php
                   echo "<td>".$v."</td>";
                    
     $name=$usuarioLogado['nome'];
      $curso=$v;
      if(isset($_POST["$i"])){
      

        if($p->cadastrarcursando($name,$curso))
          {
               ?><div class="msgalerta1">
                 <td>cursos ativados com sucesso</td>
              </div>
                <?php
          }  
          else{
                   ?><div class="msgalerta2">
                 <td>Você já está ativo nesse curso</td>
              </div>
                <?php
              
          }    
      
     

    }
    

     ?><?php
          }
          
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
  <input type="submit"value="Ativar">

</form>

	
  <footer>  </footer>
</body>
</html>

