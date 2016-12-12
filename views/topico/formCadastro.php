<div class="container">
    <h2>Cadastro de Tópico</h2>

    <form method="post">
        <?php
            if(isset($topico)):
        ?>
                <input type="hidden" name="idTopico" value="<?=$topico->getIdTopico()?>">
                <input type="hidden" name="idPost" value="<?=$topico->getPost()->getIdPost()?>">
        <?php
            endif;
        ?>

        <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION['login']->getIdUser(); ?>">

        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Preencha o titulo" value="<?=isset($topico) ? $topico->getPost()->getTitulo() : ""?>">
        </div>

        <div class="form-group">
            <label for="texto">Texto</label>
            <textarea name="texto" class="form-control" id="texto" placeholder="Preencha o texto"><?=isset($topico) ? $topico->getPost()->getTexto() : ""?></textarea>
        </div>

        <div class="form-inline">
            <a href="/forum/" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
