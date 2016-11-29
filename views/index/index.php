<ul>
	<?php
		if (!empty($lista)) {
	?>
	    <?foreach ($lista as $forum): ?>
	        <li>
	        	<div><?=$forum->getNome()?> (<?=$forum->getCategoria()->getNome()?>)</div>

	        	<?php
	        		$tipo = $forum->tipo;

	        		if($tipo < 3) {
				?>
						<a href="/index/?r=index/edita&id=<?=$forum->getIdForum()?>">Editar</a>
					
					<?php
						if($tipo < 2) {
					?>
							<a href="/index/?r=index/exclui&id=<?=$forum->getIdForum()?>">(Excluir)</a>		
					<?php
						}
	        		}
	        	?>
	        </li>
	    <? endforeach; ?>
	<?php
		} else {
	?>
			<li>Nenhum fórum cadastrado</li>
	<?php
		}
	?>
</ul>