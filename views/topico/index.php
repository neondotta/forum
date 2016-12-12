<div class="container topic">
	<div class="row">
		<div class="col-md-12 topic-author-post">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2>Tópico: <?=$topico->getPost()->getTitulo()?></h2>
				</div>

				<div class="panel-body">
					<div class="row post">
						<div class="col-md-2">
							<div class="post-author">Autor: <?=$topico->getPost()->getUser()->getNome();?></div>
						</div>

						<div class="col-md-10">
							<p class="post-text"><?=$topico->getPost()->getTexto();?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		if (!empty($posts)) {
			foreach ($posts as $key => $post):
	?>
				<div class="row">
					<div class="col-md-12 topic-author-post">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4>Título: <?=$post->getTitulo()?></h4>

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
							</div>

							<div class="panel-body">
								<div class="row post">
									<div class="col-md-2">
										<div class="post-author">Autor: <?=$post->getUser()->getNome();?></div>
									</div>

									<div class="col-md-10">
										<p class="post-text"><?=$post->getTexto();?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	    <?php
	    	endforeach;

		} else {
	?>
			<div>Nenhuma resposta para este tópico</div>
	<?php
		}
	?>
</div>
