<?php

class UserController {

	public function cadastra() {
        if (isset($_POST["nome"],$_POST["email"], $_POST["senha"], $_POST["dataNascimento"])) {
            $user = new User();
            $user->setNome($_POST["nome"]);
            $user->setEmail($_POST["email"]);
            $user->setSenha($_POST["senha"]);
            $user->setDataNascimento($_POST["dataNascimento"]);
            $user->setTipo($_POST["tipo"]);
            //var_dump($_POST);exit;

            $dao = new UserDAO();
            $dao->insere($user);
            $mensagem = "Usuário salvo com sucesso";
            require_once __DIR__."/../views/mensagem.php";
        } else {
            $user = new User();
            require_once __DIR__."/../views/user/formCadastro.php";
            // var_dump($_POST);die;
        }
	}

    public function login() {
        $dao = new UserDAO();
        $lista = $dao->getLogin($_POST["email"], $_POST["senha"]);

        if ($lista) {
            header("Location: /forum/index.php");
        } else {
            $mensagem = "Dados inválidos";
            require_once __DIR__."/../views/mensagem.php";
        }
    }

	public function logout() {
		session_start();
		unset($_SESSION["login"]);
		session_destroy();

		header('Location: /forum/views/login.php');
	}

    public function lista() {
        $dao = new UserDAO();
        $lista = $dao->getLista();

        if (!empty($lista)) {
            require_once __DIR__."/../views/user/index.php";
        } else {
            $mensagem = "Nenhum usuário cadastrado";
            require_once __DIR__."/../views/mensagem.php";
        }
    }

    public function edita() {
        if (isset($_POST["idUser"], $_POST["nome"])) {
            $user = new User();
            $user->setIdUser($_POST["idUser"]);
            $user->setNome($_POST["nome"]);

            $dao = new UserDAO();

            if ($dao->atualiza($user)) {
                $mensagem = "Usuário atualziado";
            } else {
                $mensagem = "Ocorreu um erro";
            }

            require_once __DIR__."/../views/mensagem.php";
        } else {
            $id = $_GET["id"];

            $dao = new UserDAO();
            $user = $dao->getUser($id);

            require_once __DIR__."/../views/user/formCadastro.php";
        }
    }

    public function exclui() {
        $id = $_GET["id"];

        $dao = new UserrDAO();

        if ($user = $dao->excluiUser($id)) {
            $mensagem = "Excluído com sucesso";
        } else {
            $mensagem = "Problemas";
        }

        require_once __DIR__."/../views/mensagem.php";
    }
}
