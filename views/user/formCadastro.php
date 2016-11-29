
<div class="container">
  
  <h2>Cadastro do Usuário</h2>

	<form method="post">


		<div class="form-group">
	  		<label for="nome">Nome</label>
	  		<input type="text" class="form-control" id="nome" placeholder="Preencha o nome">
		</div>

	    <div class="form-group">
	      <label for="email">Email</label>
	      <input type="email" class="form-control" id="email" placeholder="Preencha o email">
	    </div>

	    <div class="form-group">
	      <label for="dataNascimento">Data Nascimento</label>
	      <input type="date" class="form-control" id="dataNascimento" placeholder="Preencha a data de nascimento">
	    </div>

				
		<div class="form-group">
      		<label for="tipo">Tipo</label>
      		<select class="form-control" id="tipo" name="tipo">
        		<option value="1">Administrador</option>
        		<option value="2">Moderador</option>
        		<option value="3">Usuário</option>        		
      		</select>
      	</div>

     	<div class="form-group">
	  		<label for="senha">Senha:</label>
	  		<input type="password" class="form-control" id="senha" placeholder="Preencha a senha">
		</div>

		<div class="form-inline">

			<a href="/forum/" class="btn btn-default">Cancelar</a>
			<button type="submit" class="btn btn-primary">Salvar</button>
			
		</div>

	</form>

</div>


