<?php
include "conecta.php";
include "config_upload.php";

if($_POST['acao']=='editar')
{

    $codpessoa= $_POST['codpessoa'];
    $nome= $_POST['nome'];
    $email=$_POST['email'];
    $cpf=$_POST['cpf'];
    $senha=$_POST['senha'];
    $nome_arquivo=$_FILES['arquivo']['name'];
    $tamanho_arquivo=$_FILES['arquivo']['size']; 
    $arquivo_temporario=$_FILES['arquivo']['tmp_name']; 

    
    $SQL= "update pessoa set nome='$nome', email='$email', cpf='$cpf', senha='$senha' , imagem='$nome_arquivo' where codpessoa = '$codpessoa'";
    $SQL_without_img= "update pessoa set nome='$nome', email='$email', cpf='$cpf', senha='$senha' where codpessoa = '$codpessoa'";

  if($nome_arquivo){
    $resultado = mysqli_query($conexao,$SQL);
    
    if (move_uploaded_file($arquivo_temporario, "imagens/$nome_arquivo"))
    {
      echo " Upload do arquivo: ". $nome_arquivo." foi concluído com sucesso <br>";
    }
    else
    {
      echo "Arquivo não pode ser copiado para o servidor.";
      $nome_arquivo='foto.png';
    }
  } else {
    $resultado = mysqli_query($conexao,$SQL_without_img);
  }

    if($resultado)
    {
       echo "Alteração Efetuada com sucesso";
    }
    else
    {
       echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
       echo 'Mensagem de erro:'.mysqli_error( $conexao).'<br>';
    }

}
else
{


  if($_POST['acao']=='excluir')
  {

    $codpessoa= $_POST['codpessoa'];

    $SQL= "delete from pessoa where codpessoa = '$codpessoa'";
    //echo $SQL;

    $resultado=mysqli_query($conexao,$SQL);

    if($resultado)
    {
       echo "Exclusão Efetuada com sucesso";
    }
    else
    {
       echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
       echo 'Mensagem de erro:'.mysqli_error( $conexao).'<br>';
    }

}
}
?>
<br><a href='listagem_usuario.php'>Voltar </a>


