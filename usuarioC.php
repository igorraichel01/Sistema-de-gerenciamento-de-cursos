<?php
/**
 * 
 */
class Usuario
{     private $pdo;
      public $msgErro= "";

    public function conectar($nome,$host,$usuario,$senha)
  {
      global $pdo;
      global $msgErro;
      try
      {
          $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
      }catch(PDOException $e)
       {
           $msgErro = $e->getMessage();
       }
    }

public function cadastrar($usuario,$nome,$email,$senha)
  {
     global $pdo;
     $sql =$pdo->prepare("SELECT id FROM alunos WHERE usuario = :e");
     $sql->bindValue(":e",$usuario);
     $sql->execute();
     if($sql->rowCount() > 0)
     {
      return false;
     }
     else
     {
             $sql=$pdo->prepare("INSERT INTO alunos( usuario,nome,email,senha) VALUES(:n,:u,:e,:s)");
                 $sql->bindValue(":n",$usuario);
                 $sql->bindValue(":u",$nome);
                 $sql->bindValue(":e",$email);
                 $sql->bindValue(":s",$senha);
                 $sql->execute();
                return true;
     }

  }

  public function cadastrarcursando($nome,$nomecurso)
  {
     global $pdo;
     $sql =$pdo->prepare("SELECT idcursando FROM cursando WHERE nomeCursando = :e AND nomeAlu=:n");
      $sql->bindValue(":n",$nome);
     $sql->bindValue(":e",$nomecurso);
     $sql->execute();
     if($sql->rowCount() > 0)
     {
      return false;
     }
     else
     {
             $sql=$pdo->prepare("INSERT INTO cursando( nomeAlu,nomeCursando) VALUES(:n,:u)");
                 $sql->bindValue(":n",$nome);
                 $sql->bindValue(":u",$nomecurso);
                  $sql->execute();
                return true;
     }

  }


   public function login($usuario,$senha){
   	global $pdo;

   	$sql = "SELECT * FROM alunos WHERE usuario = :usuario AND senha = :senha";
   	$sql = $pdo->prepare($sql);
   	$sql->bindValue("usuario",$usuario);
   	$sql->bindValue("senha",$senha);
   	$sql->execute();
     
     if($sql->rowCount() > 0){
     	$dado = $sql->fetCh();

     	
     	$_SESSION['idUSER']=$dado['id'];
     	return true;
     }
     else{
     	return false;
     }

   }

   public function logado($id){
   	global $pdo;

   	$array= array();

   	$sql = "SELECT nome,id,email FROM alunos WHERE id = :id";
   	$sql = $pdo->prepare($sql);
   	$sql->bindValue("id",$id);
   	$sql->execute();

   	if($sql->rowCount() >0){
   		 $array = $sql->fetch();
   	}
   	return $array;
   }



     public function buscar()
    {    global $pdo;
      $res=array();
      $sql = $pdo->query("SELECT nomecurso from  cursos ORDER BY nomecurso");
      $res =$sql->fetchAll(PDO::FETCH_ASSOC);
      return $res;
    }
   



     public function buscarCurso($nome)
    {    global $pdo;
      $res=array();
      $sql = $pdo->prepare("SELECT nomeCursando from  cursando WHERE nomeAlu=:n");
        $sql->bindValue("n",$nome);
        $sql->execute();
      $res =$sql->fetchAll(PDO::FETCH_ASSOC);
      return $res;
    }

}



?>