<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Fórum PHP</a>
    </div>
		
		<div id="navbar" class="navbar-collapse collapse">
		  
			<ul class="nav navbar-nav">
			    
			    <li class="active"><a href="#">Home</a></li>
			    <li><a href="#about">About</a></li>
			    <li><a href="#contact">Contact</a></li>			    
			    <li class="dropdown">
			      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
			     	<ul class="dropdown-menu">
			        <li><a href="#">Action</a></li>
			        <li><a href="#">Another action</a></li>
			        <li><a href="#">Something else here</a></li>
			        <li role="separator" class="divider"></li>
			        <li class="dropdown-header">Nav header</li>
			        <li><a href="#">Separated link</a></li>
			        <li><a href="#">One more separated link</a></li>
			      </ul>
			    </li>
      		</ul>
    	</div><!--/.nav-collapse -->
	</div>
</nav>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel panel-primary">
				<!-- Default panel contents -->
				<div class="panel-heading">Categoria</div>

				<!-- List group -->
				<ul class="list-group">
					
					<li class="list-group-item">
						<div class="row">	
							<div class="col-md-7">
								Forum1
							</div>
							<div class="col-md-3">
								rafaellima
							</div>
							<div class="col-md-1">
								<a href="/forum/" class="btn btn-xs btn-default">Editar</a>
							</div>

							<div class="col-md-1">
								<a href="/forum/" class="btn btn-xs btn-danger">Excluir</a>
							</div>
						</div>
					</li>

				</ul>
			</div>

		</div>
	</div>	
</div>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<?php
				if (!empty($foruns)) {

					foreach ($foruns as $key => $val):
			?>
				        
				    <div class="panel panel-primary">
						

						<div class="panel-heading"><?=$val["nome"]?></div>	
						
						<ul class="list-group">

							<li class="list-group-item">
								<div class="row">	

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
											<a href="/forum/?r=forum/index&id=<?=$v->getIdForum()?>"" class="btn btn-xs btn-default">Editar</a>
										</div>

										<div class="col-md-1">
											<a href="/forum/" class="btn btn-xs btn-danger">Excluir</a>
										</div>	




									<div class="col-md-7">
										Forum1
									</div>

				        
				        <li>
				        	
		                    <?php
		                        if(!empty($val["foruns"])) {
		                            foreach ($val["foruns"] as $k => $v):
		                        ?>
		                                <div>
		                                    <a href="/forum/?r=forum/index&id=<?=$v->getIdForum()?>"><?=$v->getNome()?></a>

		                                    <?php
		                                        if($tipo < 3) {
		                					?>
		                							<a href="/forum/?r=forum/edita&id=<?=$v->getIdForum()?>">Editar</a>

		                						<?php
		                							if($tipo < 2) {
		                						?>
		                								<a href="/forum/?r=forum/exclui&id=<?=$v->getIdForum()?>">Excluir</a>
		                						<?php
		                							}
		                		        		}
		                		        	?>
		                                </div>
		                        <?php
		                            endforeach;
		                        } else {
		                            echo "Nenhum fórum cadastrado";
		                        }
		                    ?>
				        </li>

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









<ul>
    <li><a href="/forum/?r=user/cadastra">Cadastrar Usuário</a></li>
    <li><a href="/forum/?r=user/lista">Consultar Usuário</a></li>
    <li><a href="/forum/?r=categoria/cadastra">Cadastrar Categoria</a></li>
    <li><a href="/forum/?r=forum/cadastra">Cadastrar Forum</a></li>


	<?php
		if (!empty($foruns)) {

			foreach ($foruns as $key => $val):
	?>
		        <li>
		        	<div style="background-color: #CCC;">
                        <span><?=$val["nome"]?></span>

    		        	<?php
    		        		global $tipo;

    		        		if($tipo < 3) {
    					?>
    							<a href="/forum/?r=categoria/edita&id=<?=$key?>">Editar</a>

    						<?php
    							if($tipo < 2) {
    						?>
    								<a href="/forum/?r=categoria/exclui&id=<?=$key?>">Excluir</a>
    						<?php
    							}
    		        		}
    		        	?>
                    </div>

                    <?php
                        if(!empty($val["foruns"])) {
                            foreach ($val["foruns"] as $k => $v):
                        ?>
                                <div>
                                    <a href="/forum/?r=forum/index&id=<?=$v->getIdForum()?>"><?=$v->getNome()?></a>

                                    <?php
                                        if($tipo < 3) {
                					?>
                							<a href="/forum/?r=forum/edita&id=<?=$v->getIdForum()?>">Editar</a>

                						<?php
                							if($tipo < 2) {
                						?>
                								<a href="/forum/?r=forum/exclui&id=<?=$v->getIdForum()?>">Excluir</a>
                						<?php
                							}
                		        		}
                		        	?>
                                </div>
                        <?php
                            endforeach;
                        } else {
                            echo "Nenhum fórum cadastrado";
                        }
                    ?>
		        </li>
	    <?php
	    	endforeach;

		} else {
	?>
			<li>Nenhuma categoria cadastrada</li>
	<?php
		}
	?>
</ul>
