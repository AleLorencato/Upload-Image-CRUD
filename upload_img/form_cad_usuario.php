<?php
session_start();

if((!isset($_SESSION['email'])) && (!isset($_SESSION['logado'])))
{

header("Location:index.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

?>

<form action="cadastro_usuario.php" method="POST" enctype="multipart/form-data">
<p>Nome : <input type="text" name="nome"></p>
<p>CPF: <input type="text" name="cpf"></p>
<p>Email : <input type="text" name="email"></p>
<p>Senha: <input type="password" name="senha"></p>
<p>Foto: <input type="file" name="arquivo"></p>
<p><input type="reset" name="botao" value="Limpar">
<input type="submit" name="botao" value="Enviar"></p>
</form>

<a href='listagem_usuario.php'>Edição de Usuários</a> <br>
<a href='sair.php'>Sair</a>