<?php
class CategoriaController {
	public function cadastra() {
		if (isset($_POST["nome"])) {
			$categoria = new Categoria();
			$categoria->setNome($_POST["nome"]);

			$dao = new CategoriaDAO();
			$dao->insere($categoria);

			$mensagem = "Categoria salva com sucesso";
			require_once __DIR__."/../views/mensagem.php";
		} else {
			$user = new User();
			require_once __DIR__."/../views/categoria/formCadastro.php";
		}
	}

    public function lista() {
        $dao = new UserDAO();
        $lista = $dao->getLista();

        if (!empty($lista)){
            require_once __DIR__."/../views/user/lista.php";
        } else {
            $mensagem = "Nenhuma categoria cadastrado";
            require_once __DIR__."/../views/mensagem.php";
        }
    }

    public function edita() {
        if (isset($_POST["nome"])){
			$categoriaDAO = new CategoriaDAO();

			$categoria = new Categoria();
			$categoria->setIdCategoria($_POST["idCategoria"]);
            $categoria->setNome($_POST["nome"]);

            if ($categoriaDAO->atualiza($categoria)){
                $mensagem = "Categoria atualizada com sucesso!";
            } else {
                $mensagem = "Ocorreu um erro";
            }

            require_once __DIR__."/../views/mensagem.php";
        } else {
            $id = $_GET["id"];

            $categoriaDAO = new CategoriaDAO();
            $categoria = $categoriaDAO->getCategoria($id);

            require_once __DIR__."/../views/categoria/formCadastro.php";
        }
    }

    public function exclui() {
        $id = $_GET["id"];
        $categoria = new categoriaDAO();

        if ($categoria->exclui($id)) {
            $mensagem = "Excluído com sucesso";
        } else {
            $mensagem = "Problemas";
        }

        require_once __DIR__."/../views/mensagem.php";
    }
}
