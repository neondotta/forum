<?php
class TopicoController {
	public function index() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $postDAO = new PostDAO();
            $topicoDAO = new TopicoDAO();

            $topico = $topicoDAO->getTopico($id);
            $posts = $postDAO->getLista($id, $topico->getIdTopico());

            require_once __DIR__."/../views/topico/index.php";
        } else {
            $mensagem = "Fórum inválido.";

            require_once __DIR__."/../views/mensagem.php";
        }
    }

	public function cadastra() {
		if (isset($_GET["forum"])) {
			if (isset($_POST["titulo"], $_POST["texto"])) {
				$postDAO = new PostDAO();
				$topicoDAO = new TopicoDAO();

				// @todo Modificar usuário para pegar o da sessão do login
				$post = new Post($_POST["titulo"], new User("eduardo"));
				$post->setTexto($_POST["texto"]);

				$idPost = $postDAO->insere($post);

				$post->setIdPost($idPost);

				// Forum
				$forum = new Forum();
				$forum->setIdForum($_GET["forum"]);

				// Topico
				$topico = new Topico($post);
				$topico->setForum($forum);

				$idTopico = $topicoDAO->insere($topico);

				$topico->setIdTopico($idTopico);
				$post->setTopico($topico);

				// Atualiza post com o ID do topico
				$postDAO->atualizaTopico($post);

	            $mensagem = "Tópico criado com sucesso";
	            require_once __DIR__."/../views/mensagem.php";
	        } else {
	            $user = new User();
	            require_once __DIR__."/../views/topico/formCadastro.php";
	        }
        } else {
            $mensagem = "Fórum inválido.";

            require_once __DIR__."/../views/mensagem.php";
        }
	}


    public function lista() {
        $dao = new UserDAO();
        $lista = $dao->getLista();

        if (!empty($lista)){
            require_once __DIR__."/../views/user/lista.php";
        }
        else{
            $mensagem = "Nenhum usuário cadastrado";
            require_once __DIR__."/../views/mensagem.php";
        }
    }

    public function edita() {
        if (isset($_POST["titulo"], $_POST["texto"])) {
			$topicoDAO = new TopicoDAO();

			// @todo adicionar usuário
			$post = new Post($_POST["titulo"], new User("eduardo"));
			$post->setTexto($_POST["texto"]);
			$post->setIdPost($_POST["idPost"]);

			$topico = new Topico($post);
			$topico->setIdTopico($_POST["idTopico"]);

            if ($topicoDAO->atualiza($topico)) {
                $mensagem = "Tópico atualizado com sucesso!";
            } else {
                $mensagem = "Ocorreu um erro";
            }

            require_once __DIR__."/../views/mensagem.php";
        } else {
            $id = $_GET["id"];

			$postDAO = new PostDAO();
			$topicoDAO = new TopicoDAO();

			$topico = $topicoDAO->getTopico($id);

            require_once __DIR__."/../views/topico/formCadastro.php";
        }
    }

    public function exclui() {
        $id = $_GET["id"];

        $topicoDAO = new TopicoDAO();

        if ($topicoDAO->exclui($id)) {
            $mensagem = "Tópico excluído com sucesso";
        } else {
            $mensagem = "Problemas";
        }

        require_once __DIR__."/../views/mensagem.php";
    }
}
