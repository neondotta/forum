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
								<div class="row">
									<div class="col-xs-8">
										<h4>Título: <?=$post->getTitulo()?></h4>
									</div>

									<div class="col-xs-4">
										<?php
							        		global $tipo;

							        		if($tipo < 3) {
										?>
											<div class="btn-group pull-right" role="group">
												<!-- <a href="/forum/?r=topico/edita&id=<?=$post->getIdPost()?>" class="btn btn-xs btn-default">Editar</a> -->

											<?php if($tipo < 2) { ?>
													<a href="/forum/?r=post/exclui&id=<?=$post->getIdPost()?>&topico=<?=$topico->getIdTopico()?>" class="btn btn-xs btn-danger confirm">Excluir</a>
											<?php } ?>
											</div>
										<?php } ?>
									</div>
								</div>
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

		if($tipo < 4):
			require_once "views/post/formCadastro.php";
		else:
	?>
			<h3>Você precisa estar logado para responder a este tópico! <a href="/forum/?r=index/login" class="btn btn-success">Login</a></h3>
	<?php
		endif;
	?>
</div>
