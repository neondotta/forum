	<?php require_once 'cabecalho.php'; ?>
<div class="container">
	
	<form action="index.php?user/login" method="post">
		<div class="form-group">
			<label>E-mail</label>
			<input type="text" class="form-control" name="email" id="email" placeholder="E-mail">			
		</div>
		<div class="form-group">
			<label>Senha</label>
			<input type="password" class="form-control" name="senha" id="senha" placeholder="senha">
		</div>
		<input type="reset" value="Apagar">
		<input type="submit" value="Enviar">
	
	</form>

</div>
	<?php require_once 'rodape.php'; ?>