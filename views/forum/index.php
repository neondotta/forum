<h1>Fórum: <?=$forum->getNome()?></h1>

<a href="/forum/?r=topico/cadastra&forum=<?=$forum->getIdForum()?>">Criar tópico</a>

<ul>
	<?php
		if (!empty($topicos)) {

			foreach ($topicos as $key => $topico):
	?>

		        <li>
		        	<?=$topico->getPost()->getTitulo()?> (Autor: <?=$topico->getPost()->getUser()->getNome()?>)

		        	<?php
		        		global $tipo;

		        		if($tipo < 3) {
					?>
							<a href="/forum/?r=topico/edita&id=<?=$topico->getIdTopico()?>">Editar</a>

						<?php
							if($tipo < 2) {
						?>
								<a href="/forum/?r=topico/exclui&id=<?=$topico->getIdTopico()?>">Excluir</a>
						<?php
							}
		        		}
		        	?>
		        </li>

	    <?php
	    	endforeach;

		} else {
	?>
			<li>Nenhum tópico cadastrado</li>
	<?php
		}
	?>
</ul>
