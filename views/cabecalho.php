<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Fórum</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="/forum/css/bootstrap.min.css">
  		<link rel="stylesheet" href="/forum/css/custom.css">
	</head>

	<body>
		<?php
			global $tipo;
			if(isset($_SESSION["login"]) && !empty($_SESSION["login"])):
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
						<a class="navbar-brand" href="/forum/">Fórum PHP</a>
					</div>

					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="/forum/">Home</a></li>

							<?php if($tipo < 3) { ?>
							<li><a href="/forum/?r=user/lista">Usuários</a></li>
							<li><a href="/forum/?r=categoria/cadastra">Categorias</a></li>
							<?php } ?>
						</ul>

						<ul class="nav navbar-nav pull-right">
							<li class="dropdown pull-right">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<?=$_SESSION["login"]->getNome()?> <span class="caret"></span>
								</a>

								<ul class="dropdown-menu">
									<li><a href="/forum/?r=user/logout">Logout</a></li>
								</ul>
							</li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</nav>
		<?php
			endif;
		?>
