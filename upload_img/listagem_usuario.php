<?php

session_start();

if((!isset($_SESSION['email'])) && (!isset($_SESSION['logado'])))
{

header("Location:index.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}


include "conecta.php";

$sql = "select * from pessoa order by codpessoa";


$resultado = mysqli_query($conexao,$sql);

while($linha=mysqli_fetch_assoc($resultado)) {

?>
<section>
<form action="edicao_usuario.php" method="post" enctype="multipart/form-data">
<p>ID: <?php echo $linha['codpessoa']; ?></p>
<input type ="hidden" name = "codpessoa" value="<?php echo $linha['codpessoa']?>">
<p>Nome:  <input type="text" name="nome" value="<?php echo $linha['nome']?>"></p>
<p>Email:<input type ="text" name = "email" value="<?php echo $linha['email']?>"></p> 
<p>CPF: <input type ="text" name = "cpf" value="<?php echo $linha['cpf']?>" ?></p>
<p>Senha: <input type ="password" name = "senha" value="<?php echo $linha['senha']?>" ?></p>
<p>Foto: <img src="imagens/<?php echo $linha['imagem'];?>" width='100px' height='100px'/></p>
<p>Editar Foto: <input type="file" name="arquivo"></p>
<button type="submit" name="acao" value="editar"> Editar </button>
<button type="submit" name="acao" value="excluir" onclick = "return confirma_excluir()"> Deletar </button> 
</form>                                                         
</section>
<?php
}
?>
<a href='form_cad_usuario.php'>Voltar </a>


