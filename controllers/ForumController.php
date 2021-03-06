<?php
class ForumController {
    
    public function index() {
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $id = $_GET["id"];

            $forumDAO = new ForumDAO();
            $topicoDAO = new TopicoDAO();

            $forum = $forumDAO->getForum($id);
            $topicos = $topicoDAO->getLista($id);

            require_once __DIR__."/../views/forum/index.php";
        } else {
            $mensagem = "Fórum inválido.";

            require_once __DIR__."/../views/mensagem.php";
        }
    }

	public function cadastra() {
        if (isset($_POST["nome"], $_POST["categoria"])){
            $categoria = new Categoria();
            $categoria->setIdCategoria($_POST["categoria"]);

            $forum = new Forum($_POST["nome"], $categoria);

            $dao = new ForumDAO();
            $dao->insere($forum);

            $mensagem = "Fórum adicionado com sucesso!";
            require_once __DIR__."/../views/mensagem.php";
        } else {
            if(isset($_GET["catId"])) {
                $catId = $_GET["catId"];
            }

            $categoriaDAO = new CategoriaDAO();

            $categorias = $categoriaDAO->getLista();

            require_once __DIR__."/../views/forum/formCadastro.php";
        }
	}

    public function edita() {
        if (isset($_POST["nome"])) {
            $forumDAO = new ForumDAO();

            $categoria = new Categoria();
            $categoria->setIdCategoria($_POST["categoria"]);

            $forum = new Forum($_POST["nome"], $categoria);
            $forum->setIdForum($_POST["idForum"]);

            if ($forumDAO->atualiza($forum)){
                $mensagem = "Fórum atualizado com sucesso!";
            } else {
                $mensagem = "Erro ao editar o fórum.";
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

    public function exclui() {
        $id = $_GET["id"];

        $forumDAO = new ForumDAO();

        $redirect = "";

        if($forumDAO->exclui($id)) {
            $mensagem = "Fórum excluído com sucesso!";
        } else {
            $mensagem = "Erro ao excluir o fórum.";
        }

        require_once __DIR__."/../views/mensagem.php";
    }
}
