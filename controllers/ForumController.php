<?php
class ForumController {
    public function index() {
        $dao = new ForumDAO();
        $lista = $dao->getLista();

        require_once __DIR__."/../views/forum/index.php";
    }

	public function cadastra() {
        if (isset($_POST["nome"], $_POST["categoria"])){
            $categoria = new Categoria();
            $categoria->setIdCategoria($_POST["categoria"]);

            $forum = new Forum($_POST["nome"], $categoria);

            $dao = new ForumDAO();
            $dao->insere($forum);

            $mensagem = "Usuário salvo com sucesso";
            require_once __DIR__."/../views/mensagem.php";
        }
        else{
            $categoriaDAO = new CategoriaDAO();

            $categorias = $categoriaDAO->getLista();

            require_once __DIR__."/../views/forum/formCadastro.php";
        }
	}

    public function lista(){
        $dao = new UserDAO();
        $lista = $dao->getLista();

        if (!empty($lista)){
            require_once __DIR__."/../views/user/lista.php";
        } else {
            $mensagem = "Nenhum usuário cadastrado";
            require_once __DIR__."/../views/mensagem.php";
        }
    }

    public function edita(){
        if (isset($_POST["nome"])) {
            $forumDAO = new ForumDAO();

            $categoria = new Categoria();
            $categoria->setIdCategoria($_POST["categoria"]);

            $forum = new Forum($_POST["nome"], $categoria);
            $forum->setIdForum($_POST["idForum"]);

            if ($forumDAO->atualiza($forum)){
                $mensagem = "Fórum atualizado com sucesso!";
            } else {
                $mensagem = "Ocorreu um erro";
            }

            require_once __DIR__."/../views/mensagem.php";
        } else {
            $id = $_GET["id"];

            $forumDAO = new ForumDAO();
            $categoriaDAO = new CategoriaDAO();

            $forum = $forumDAO->getForum($id);
            $categorias = $categoriaDAO->getLista();

            require_once __DIR__."/../views/forum/formCadastro.php";
        }
    }

    public function exclui(){

        $id = $_GET["id"];

        $dao = new UserrDAO();

        if ($user = $dao->excluiUser($id)){

            $mensagem = "Excluído com sucesso";
        }else{
            $mensagem = "Problemas";
        }

        require_once __DIR__."/../views/mensagem.php";

    }


}
