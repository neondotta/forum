<div class="container">
    <h2>Cadastro da Categoria</h2>

    <form method="post">
        <?php
            if(isset($categoria)):
        ?>
                <input type="hidden" name="idCategoria" value="<?=$categoria->getIdCategoria()?>">
        <?php
            endif;
        ?>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Preencha o nome" value="<?=isset($categoria) ? $categoria->getNome() : ""?>">
        </div>

        <div class="form-inline">
            <a href="/forum/" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
