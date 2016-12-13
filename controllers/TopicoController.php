<?php
class TopicoController {
	public function index() {
        if (isset($_GET["id"])) {
			$id = $_GET["id"];

			// Verifica se é POST (Se está adicionando)
			if (isset($_POST["titulo"], $_POST["texto"])) {
				$user = new User($_SESSION["login"]->getNome());
	            $user->setIdUser($_SESSION["login"]->getIdUser());

				$post = new Post($_POST["titulo"], $user);
				$post->setTexto($_POST["texto"]);

				$topico = new Topico($post);
				$topico->setIdTopico($_POST["idTopico"]);

				$post->setTopico($topico);

				$postDAO = new PostDAO();
				$postDAO->insere($post);

				// Tela de mensagem
				$redirect = "?r=topico/index&id={$id}";
				$mensagem = "Post adicionado com sucesso";

	            require_once __DIR__."/../views/mensagem.php";
			} else {
				// Se não for POST, mostra o conteúdo
	            $postDAO = new PostDAO();
	            $topicoDAO = new TopicoDAO();

	            $topico = $topicoDAO->getTopico($id);
	            $posts = $postDAO->getLista($id, $topico->getPost()->getIdPost());

	            require_once __DIR__."/../views/topico/index.php";
			}
        } else {
			// Caso não existir o parâmetro ID na URL
            $mensagem = "Fórum inválido.";

            require_once __DIR__."/../views/mensagem.php";
        }
    }

	public function cadastra() {
		if (isset($_GET["forum"])) {
			if (isset($_POST["titulo"], $_POST["texto"])) {
				$postDAO = new PostDAO();
				$topicoDAO = new TopicoDAO();

				$user = new User($_SESSION["login"]->getNome());
				$user->setIdUser($_SESSION["login"]->getIdUser());

				$post = new Post($_POST["titulo"], $user);
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

				$redirect = "?r=forum/index&id={$_GET["forum"]}";
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
		if(isset($_GET["id"]) && !empty($_GET["id"])) {
			$id = $_GET["id"];

			if (isset($_POST["titulo"], $_POST["texto"])) {
				$topicoDAO = new TopicoDAO();

				$user = new User($_SESSION["login"]->getNome());
				$user->setIdUser($_SESSION["login"]->getIdUser());

				$post = new Post($_POST["titulo"], $user);
				$post->setTexto($_POST["texto"]);
				$post->setIdPost($_POST["idPost"]);

				$topico = new Topico($post);
				$topico->setIdTopico($_POST["idTopico"]);

				$redirect = "?r=forum/index&id={$id}";

	            if ($topicoDAO->atualiza($topico)) {
	                $mensagem = "Tópico atualizado com sucesso!";
	            } else {
	                $mensagem = "Ocorreu um erro";
	            }

	            require_once __DIR__."/../views/mensagem.php";
	        } else {
				$postDAO = new PostDAO();
				$topicoDAO = new TopicoDAO();

				$topico = $topicoDAO->getTopico($id);

	            require_once __DIR__."/../views/topico/formCadastro.php";
	        }
		} else {
			$mensagem = "Tópico inválido.";

            require_once __DIR__."/../views/mensagem.php";
		}
    }

    public function exclui() {
        $id = $_GET["id"];

        $topicoDAO = new TopicoDAO();

		$redirect = "?r=forum/index&id={$_GET['forum']}";

        if ($topicoDAO->exclui($id)) {
            $mensagem = "Tópico excluído com sucesso";
        } else {
            $mensagem = "Problemas";
        }

        require_once __DIR__."/../views/mensagem.php";
    }
}
