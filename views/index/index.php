

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
								
								<div class="col-md-2">
											
									<?php
		                        		if(!empty($val["foruns"])) {
		                            		foreach ($val["foruns"] as $k => $v):
		                        	
		                        	?>
		                        		<div class="col-md-7">
											<?=$v->getNome()?>
										</div>
										
										<div class="col-md-3">
											Usuário
										</div>
										
										<div class="col-md-1">
											<a href="/forum/?r=forum/index&id=<?=$v->getIdForum()?>" class="btn btn-xs btn-default">Editar</a>
										</div>

                				</div>


								<div class="col-md-1">
											
									<?php
                                        if($tipo < 3) {
                					?>
                							<a href="/forum/?r=categoria/edita&id=<?=$val["idCategoria"]?>" class="btn btn-xs btn-default">Editar</a>
									<?php
										}
									?>

                				</div>

								<div class="col-md-1">
								
									<?php
                                        if($tipo < 2) {
                					?>
                							<a href="/forum/?r=categoria/exclui&id=<?=$val["idCategoria"]?>" class="btn btn-xs btn-danger">Excluir</a>
									<?php
										}
									?>
									
                				</div>
                				<?php
                					endforeach;
                				}
                				?>
							</div>				

						</div>	
						
						<?php
	                  		if(!empty($val["foruns"])) {
	                        		foreach ($val["foruns"] as $k => $v):
	                    	
	                   	?>

								<ul class="list-group">

									<li class="list-group-item">
										<div class="row">	

			                        		<div class="col-md-7">
												<a href="/forum/?r=forum/index&id=<?=$v->getIdForum()?>"><?=$v->getNome()?></a>
											</div>
											
											<div class="col-md-3">
												Usuário
											</div>
											
											<div class="col-md-1">
											
												<?php
			                                        if($tipo < 3) {
			                					?>
			                							<a href="/forum/?r=forum/edita&id=<?=$v->getIdForum()?>" class="btn btn-xs btn-default">Editar</a>
												<?php
													}
												?>

			                				</div>

											<div class="col-md-1">
											
												<?php
			                                        if($tipo < 2) {
			                					?>
			                							<a href="/forum/?r=forum/exclui&id=<?=$v->getIdForum()?>" class="btn btn-xs btn-danger">Excluir</a>
												<?php
													}
												?>
												
			                				</div>
										</div>
									</li>
								</ul>
						<?php
								endforeach;
				         } else {
				         	echo "Nenhum fórum cadastrado";
				         } ?>		            		
		            		
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
