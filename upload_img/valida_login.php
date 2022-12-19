<?php
session_start();

$email=$_POST["email"];
$senha=$_POST["senha"];

if (!(empty($email) OR empty($senha))) // testa se os campos do formulário não estão vazios
{
	include "conecta.php";
	$sql="SELECT * from pessoa WHERE email='$email' and senha='$senha'";
	$resultado = mysqli_query($conexao,$sql);

	if (mysqli_num_rows($resultado)== 1) // testa se retornou uma linha de resultado da tabela pessoa com email e senha válidos
	{
	$_SESSION["logado"]=true; // armazena TRUE na variável de sessão logado
	$_SESSION["email"]=$email; // armazena na variável de sessão email o conteúdo do campo email do formulário
	header("Location:form_cad_usuario.php"); // direciona para o cadastro de usuarios
	}
	else
	{
		$_SESSION["msg"]="Usuário ou senha inválidos"; // caso não exista uma linha na tabela pessoa com o email e a senha válidos uma mensagem é armazenada na variável de sessão msg
		header("Location:index.php"); // o fluxo da aplicação é direcionado novamente parvo formulário de login - onde a variável de sessão contendo a mensagem será exibida
	}
}
else // else correspondente ao resultado da função !empty 
{
	$_SESSION["msg"]="Preencha campos email e senha"; // caso contrário, ou seja, os campos do formulário email e senha estejam vazios, a mensagem é armazenada na variável msg
	header("Location:index.php"); // o fluxo da aplicação é direcionado novamente para o formulário de login - onde a variável de sessão contendo a mensagem será exibida
}

