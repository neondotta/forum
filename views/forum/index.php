<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-8">
							Fórum: <?=$forum->getNome()?>
						</div>

						<div class="col-md-4">
							<?php 
								global $tipo;

								if($tipo < 3):
							?>
								<div class="btn-group pull-right" role="group">
									<a href="/forum/?r=forum/edita&id=<?=$forum->getIdForum()?>" class="btn btn-xs btn-default">Editar</a>

									<?php if($tipo < 2): ?>
											<a href="/forum/?r=forum/exclui&id=<?=$forum->getIdForum()?>" class="btn btn-xs btn-danger confirm">Excluir</a>
									<?php endif; ?>
								</div>
							<?php 
								endif;

								if($tipo < 4):
									$link = "/forum/?r=topico/cadastra&forum={$forum->getIdForum()}";
								else:
									$link = "/forum/?r=index/login";
								endif;	
							?>
								<a href="<?=$link?>" class="btn btn-xs btn-success pull-right button-side">
									Criar tópico
								</a>
						</div>
					</div>
				</div>

				<ul class="list-group">
					<?php
						if (!empty($topicos)) {
							foreach ($topicos as $key => $topico):
					?>
						        <li class="list-group-item">
									<div class="row">
										<div class="col-xs-4">
											<a href="/forum/?r=topico/index&id=<?=$topico->getIdTopico()?>">
												<?=$topico->getPost()->getTitulo()?></a>
											</a>
										</div>

										<div class="col-xs-4">
											Autor: <?=$topico->getPost()->getUser()->getNome()?>
										</div>

										<div class="col-md-4">
											<?php if($tipo < 3): ?>
												<div class="btn-group pull-right" role="group">
													<a href="/forum/?r=topico/edita&id=<?=$topico->getIdTopico()?>" class="btn btn-xs btn-default">Editar</a>

													<?php if($tipo < 2): ?>
				                							<a href="/forum/?r=topico/exclui&id=<?=$topico->getIdTopico()?>&forum=<?=$forum->getIdForum()?>" class="btn btn-xs btn-danger confirm">Excluir</a>
													<?php endif; ?>
												</div>
											<?php endif; ?>
		                				</div>
									</div>
						        </li>
					    <?php
					    	endforeach;
						} else {
					?>
							<li class="list-group-item">Nenhum tópico cadastrado</li>
					<?php
						}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>
