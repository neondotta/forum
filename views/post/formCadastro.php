<div class="row">
    <div class="col-xs-12">
        <h3>Responder a este tópico</h3>

        <form method="post">
            <?php
                if(isset($topico)):
            ?>
                    <input type="hidden" name="idTopico" value="<?=$topico->getIdTopico()?>">
            <?php
                endif;
            ?>

            <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION['login']->getIdUser(); ?>">

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Preencha o titulo">
            </div>

            <div class="form-group">
                <label for="texto">Texto</label>
                <textarea name="texto" class="form-control" id="texto" placeholder="Preencha o texto"></textarea>
            </div>

            <div class="form-inline">
                <button type="reset" class="btn btn-default">Limpar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
