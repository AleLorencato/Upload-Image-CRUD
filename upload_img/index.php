<?php
session_start();

?>

<form action="valida_login.php" method="POST">
Email : <input type="text" name="email">
Senha : <input type="password" name="senha">
<input type="reset" name="botao" value="Limpar">
<input type="submit" name="botao" value="Logar">
</form>

<div id='msg'>
<?php 
if(isset($_SESSION['msg']))
{ 
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}
?>
</div>

