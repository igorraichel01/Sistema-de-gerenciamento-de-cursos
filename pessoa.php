 <?php

class pessoa
{
	private $pdo;
 //conexao com o banco de dados
     public function __construct($dbname,$host,$user,$senha)
    {
       try
       {
       	$this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
       }
      catch(PDOException $e)
      {
           echo "Erro com banco de dados: ".$e->getMessage();
           exit();
      } 
      catch(Exception $e)
      {
      	echo "Erro generico:".$e->getMessage();
      	exit();

      }  
    }
   // essa funçao é para buscar os dadose colocar na tela as informaçoes
    public function buscar()
    {    
    	$res=array();
    	$cmd = $this->pdo->query("SELECT * FROM alunos ORDER BY nome");
    	$res =$cmd->fetchAll(PDO::FETCH_ASSOC);
    	return $res;
    }

     public function buscarADM()
    {    
      $res=array();
      $cmd = $this->pdo->query("SELECT * FROM cursos ORDER BY nomecurso");
      $res =$cmd->fetchAll(PDO::FETCH_ASSOC);
      return $res;
    }

    


   public function cadastrarpessoa($usuario,$nome,$email,$senha)
   {

   	//antes de cadastrar verificar se ja tem cadastrado 

   	$cmd =$this->pdo->prepare("SELECT id FROM alunos WHERE nome =:e ");

   	$cmd->bindValue(":e",$nome);
   	$cmd->execute();
   	if($cmd->rowCount() >0)
   	{
   		return false;
   	}
   	else// nao foi encontrado email
   	{

       $cmd = $this->pdo->prepare("INSERT INTO alunos(usuario,nome,email,senha)VALUES(:u,:n,:e,:s)");
       $cmd->bindValue(":u",$usuario);
       $cmd->bindValue(":n",$nome);
       $cmd->bindValue(":e",$email);
        $cmd->bindValue(":s",$senha);
       $cmd->execute();
       return true;
   	}

   }
   //

    public function cadastraradm($nome,$senha)
   {

    //antes de cadastrar verificar se ja tem cadastrado 

    $cmd =$this->pdo->prepare("SELECT idadm FROM adm WHERE nomeadm =:e ");

    $cmd->bindValue(":e",$nome);
    $cmd->execute();
    if($cmd->rowCount() >0)
    {
      return false;
    }
    else// nao foi encontrado email
    {

       $cmd = $this->pdo->prepare("INSERT INTO adm(nomeadm,senhaadm)VALUES(:n,:s)");
       
       $cmd->bindValue(":n",$nome);
        $cmd->bindValue(":s",$senha);
       $cmd->execute();
       return true;
    }

   }


     public function cadastrarcursos($nome,$id)
   {

    $cmd = $this->pdo->prepare("SELECT idcurso FROM cursos WHERE nomecurso = :e ");

    $cmd->bindValue(":e",$id);
    $cmd->execute();
    if($cmd->rowCount() > 0)
    {
      return false;
    }
    else// nao foi encontrado email
    {

       $cmd = $this->pdo->prepare("INSERT INTO cursos(idcurso,nomecurso)VALUES(:c,:i)");
       $cmd->bindValue(":c",$nome);
       $cmd->bindValue(":i",$id);
       $cmd->execute();
       return true;
    }

   }
   public function excluir($id){
    $cmd=$this->pdo->prepare("DELETE from cursos WHERE idcurso=:id");
    $cmd->bindValue(":id",$id);
    $cmd->execute();

   }


 


}




 ?>
