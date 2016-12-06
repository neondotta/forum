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
		        	<div>
                        <span><?=$val["nome"]?></span>

    		        	<?php
    		        		global $tipo;

    		        		if($tipo < 3) {
    					?>
    							<a href="/index/?r=categoria/edita&id=<?=$key?>">Editar</a>

    						<?php
    							if($tipo < 2) {
    						?>
    								<a href="/index/?r=categoria/exclui&id=<?=$key?>">Excluir</a>
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
                                    <?=$v->getNome()?>
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
			<li>Nenhum fórum cadastrado</li>
	<?php
		}
	?>
</ul>
