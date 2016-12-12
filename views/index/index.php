<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
				if (!empty($foruns)) {
					global $tipo;

					foreach ($foruns as $key => $val):
			?>
				    <div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class='col-md-8'>
									<?=$val["nome"]?>
								</div>

								<div class="col-md-4">
									<?php if($_SESSION['login']->getTipo() < 3): ?>
										<div class="btn-group pull-right" role="group">
											<a href="/forum/?r=categoria/edita&id=<?=$key?>" class="btn btn-xs btn-default">Editar</a>

											<?php if($_SESSION['login']->getTipo() < 2): ?>
		                							<a href="/forum/?r=categoria/exclui&id=<?=$key?>" class="btn btn-xs btn-danger">Excluir</a>
											<?php endif; ?>
										</div>

										<a href="/forum/?r=forum/cadastra&catId=<?=$key?>" class="btn btn-xs btn-success button-side pull-right">Criar fórum</a>
									<?php endif; ?>
                				</div>
							</div>

						</div>

						<ul class="list-group">
							<?php
		                  		if(!empty($val["foruns"])) {
	                        		foreach ($val["foruns"] as $k => $v):
		                   	?>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-7">
												<a href="/forum/?r=forum/index&id=<?=$v->getIdForum()?>"><?=$v->getNome()?></a>
											</div>

											<div class="col-md-3">Usuário</div>

											<div class="col-md-2">
												<?php if($_SESSION['login']->getTipo() < 3): ?>
													<div class="btn-group pull-right" role="group">
														<a href="/forum/?r=forum/edita&id=<?=$v->getIdForum()?>" class="btn btn-xs btn-default">Editar</a>

														<?php if($_SESSION['login']->getTipo() < 2): ?>
															<a href="/forum/?r=forum/exclui&id=<?=$v->getIdForum()?>" class="btn btn-xs btn-danger">Excluir</a>
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
								<li class="list-group-item">
									<div class="row">
										<div class="col-md-12">Nenhum fórum cadastrado</div>
									</div>
								</li>
						<?php
					         }
						 ?>
						 </ul>
		            </div>

			   <?php
			    	endforeach;
				} else {
			?>
					<li>Nenhuma categoria cadastrada</li>
			<?php
				}
			?>
		</div>
	</div>
</div>
