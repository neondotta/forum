<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Fórum</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="/forum/css/bootstrap.min.css">  		
  		<link rel="stylesheet" href="/forum/css/custom.css">  
  		<script src="/forum/js/jquery.min.js"></script>
  		<script src="/forum/js/bootstrap.min.js"></script>

	</head>

	<body>

		<?php
			global $tipo;
			if($_SESSION):
		?>


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
					    
					    <li class="active"><a href="/forum/">Home</a></li>			    
					    
						<?php
                        	if($tipo < 3) {
        				?>
        						<li><a href="/forum/?r=user/lista">Usuários</a></li>
						<?php
							}
						?>

					    <?php
                        	if($tipo < 3) {
        				?>
        						<li><a href="/forum/?r=categoria/cadastra">Categorias</a></li>
						<?php
							}
						?>

				    
					    
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
		<?php
			endif;
		?>

