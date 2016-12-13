
<div class="container">
  
  <h2>Cadastro do Usuário</h2>

	 <form action="#" method="post">


		<div class="form-group">
	  		<label for="nome">Nome</label>
	  		<input type="text" class="form-control" id="nome" name="nome" placeholder="Preencha o nome" value="<?=isset($id) ? $user->getNome() : ""?>">
		</div>

	    <div class="form-group">
	      <label for="email">Email</label>
	      <input type="email" class="form-control" id="email" name="email" placeholder="Preencha o email" value="<?=isset($id) ? $user->getEmail() : ""?>">
	    </div>

	    <div class="form-group">
	      <label for="dataNascimento">Data Nascimento</label>
	      <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" placeholder="Preencha a data de nascimento" value="<?=isset($id) ? $user->getDataNascimento() : ""?>">
	    </div>

				
		<div class="form-group">
      		<label for="tipo">Tipo</label>
      		<select class="form-control" id="tipo" name="tipo">
        		<option value="3" <?=isset($id) == $user->getTipo() ? "selected" :""?> >Usuário</option>        		
        		<option value="2" <?=isset($id) == $user->getTipo() ? "selected" :""?>>Moderador</option>
        		<option value="1" <?=isset($id) == $user->getTipo() ? "selected" :""?>>Administrador</option>
      		</select>
      	</div>

     	<div class="form-group">
	  		<label for="senha">Senha:</label>
	  		<input type="password" class="form-control" id="senha" name="senha" placeholder="Preencha a senha">
		</div>

		<div class="form-inline">

			<a href="/forum/" class="btn btn-default">Cancelar</a>
			<button type="submit" class="btn btn-primary">Salvar</button>
			
		</div>

	</form>

</div>


