
<div class="container">
	<div class="row">
		<div class="col-md-12">	
				        
			<div class="panel panel-primary">						

				<div class="panel-heading">

					<div class="row">
						<div class='col-md-10'>
							Usuários	
						</div>
						
						<div class="col-md-2">														
	    					<a href="/forum/?r=forum/cadastra" class="btn btn-xs btn-success">Incluir</a>
	    				</div>
					</div>				

				</div>	
						
				<?php
					<?foreach ($lista as $user): ?>
					?>

						<ul class="list-group">

							<li class="list-group-item">
								<div class="row">	

	                        		<div class="col-md-10">
										<?=$user->getNome()?>
									</div>
									
								
									<div class="col-md-1">
									
										<a href="/forum/?r=user/edita&id=<?=$user->getIdUser()?>" class="btn btn-xs btn-default">Editar</a>
	                				</div>

									<div class="col-md-1">
	              						<a href="/forum/?r=user/exclui&id=<?=$user->getIdUser()?>" class="btn btn-xs btn-danger">Excluir</a>										
	                				</div>
								</div>
							</li>
						</ul>
					<?php
							endforeach;
			         } ?>		            		
	            		
		        </div>	              

		</div>

	</div>	
</div>

<a href="/forum/">Voltar</a>