<ul>
    <li><a href="/forum/?r=user/cadastra">Cadastrar Usuário</a></li>
    <li><a href="/forum/?r=user/lista">Consultar Usuário</a></li>


    <li><a href="/forum/?r=categoria/cadastra">Cadastrar Categoria</a></li>

    <li><a href="/forum/?r=forum/cadastra">Cadastrar Forum</a></li>


	<?php
		if (!empty($lista)) {

			foreach ($lista as $forum):
	?>

		        <li>
		        	<div><?=$forum->getNome()?> (<?=$forum->getCategoria()->getNome()?>)</div>

		        	<?php
		        		global $tipo;

		        		if($tipo < 3) {
					?>
							<a href="/index/?r=forum/edita&id=<?=$forum->getIdForum()?>">Editar</a>
						
						<?php
							if($tipo < 2) {
						?>
								<a href="/index/?r=forum/exclui&id=<?=$forum->getIdForum()?>">Excluir</a>		
						<?php
							}
		        		}
		        	?>
		        </li>

	    <?php
	    	endforeach;

		} else {
	?>
			<li>Nenhum fórum cadastrado</li>
	<?php
		}
	?>
</ul>