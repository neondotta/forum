<?php
	session_start();
	require_once 'cabecalho.php';

	if(!empty($_SESSION["login"])) {
		header('Location: /forum/index.php');
	}
?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 login">
			<h1>Login</h1>

			<form action="/forum/index.php?r=user/login" method="post">
				<div class="form-group">
					<label>E-mail</label>
					<input type="text" class="form-control login" name="email" id="email" placeholder="E-mail">
				</div>
				<div class="form-group">
					<label>Senha</label>
					<input type="password" class="form-control login" name="senha" id="senha" placeholder="senha">
				</div>

				<input type="reset" class="btn btn-default" value="Apagar">
				<input type="submit" class="btn btn-primary" value="Enviar">
			</form>
		</div>
	</div>
</div>

<?php require_once 'rodape.php'; ?>
