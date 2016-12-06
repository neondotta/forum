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

                                    <?php
                                        if($tipo < 3) {
                					?>
                							<a href="/index/?r=forum/edita&id=<?=$v->getIdForum()?>">Editar</a>

                						<?php
                							if($tipo < 2) {
                						?>
                								<a href="/index/?r=forum/exclui&id=<?=$v->getIdForum()?>">Excluir</a>
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
