<div class="container">
    <h2>Forum</h2>

    <form action="#" method="post">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Preencha o nome">
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria">
                <?php
                    foreach ($categorias as $key => $val):
                ?>
                        <option value="<?=$val->getIdCategoria()?>"><?=$val->getNome()?></option>
                <?php
                    endforeach;
                ?>
            </select>
        </div>

        <div class="form-inline">
            <a href="/forum/" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
