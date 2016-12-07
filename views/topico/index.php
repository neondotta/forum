<h1>Tópico: <?=$topico->getPost()->getTitulo()?></h1>

<div>
	<div><?=$topico->getPost()->getTitulo();?></div>
	<p><?=$topico->getPost()->getTexto();?></p>
</div>

<hr>

<ul>
	<?php
		if (!empty($posts)) {

			foreach ($posts as $key => $post):
	?>

		        <li>
		        	<h3><?=$post->getTitulo()?></h1>

					<div>
						<div><?=$post->getTitulo();?></div>
						<p><?=$post->getTexto();?></p>
					</div>

		        	<?php
		        		global $tipo;

		        		if($tipo < 3) {
					?>
							<a href="/forum/?r=topico/edita&id=<?=$post->getIdPost()?>">Editar</a>

						<?php
							if($tipo < 2) {
						?>
								<a href="/forum/?r=topico/exclui&id=<?=$post->getIdPost()?>">Excluir</a>
						<?php
							}
		        		}
		        	?>

		        	<hr>
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
