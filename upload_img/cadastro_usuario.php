<?php
include "config_upload.php";

$nome=$_POST['nome'];
$email=$_POST['email'];
$cpf=$_POST['cpf'];
$senha=$_POST['senha'];
$nome_arquivo=$_FILES['arquivo']['name'];  
$tamanho_arquivo=$_FILES['arquivo']['size']; 
$arquivo_temporario=$_FILES['arquivo']['tmp_name']; 

if($sobrescrever=="não" && file_exists("$caminho/$nome_arquivo"))
die("Arquivo já existe");

if($limitar_tamanho=="sim" && ($tamanho_arquivo > $tamanho_bytes) )
die("Arquivo deve ter o no máximo $tamanho_bytes bytes");

$ext = strrchr($nome_arquivo , '.');
if (($limitar_ext == "sim") && !in_array($ext,$extensoes_validas))
die("Extensão de arquivo inválida para upload");

if (move_uploaded_file($arquivo_temporario, "imagens/$nome_arquivo"))
{
	echo " Upload do arquivo: ". $nome_arquivo." foi concluído com sucesso <br>";
}
else
{
	echo "Arquivo não pode ser copiado para o servidor.";
	$nome_arquivo='foto.png';

}

include "conecta.php";

$sql="insert into pessoa (nome,email,cpf,senha,imagem) values ('$nome','$email','$cpf','$senha','$nome_arquivo')";

//echo $sql;

$resultado = mysqli_query($conexao,$sql);

if($resultado)
{
   echo "Cadastro Efetuado com sucesso";
}
else
{
   echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
   echo 'Mensagem de erro:'.mysqli_error( $conexao).'<br>';
}

?>
<br><a href='form_cad_usuario.php'>Voltar </a>