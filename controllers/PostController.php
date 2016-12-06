<?php
class UserController {

	public function cadastra() {

        if (isset($_POST['nome'], $_POST['salario'], $_POST['comissao'])){

            $user = new User();
            $user->setNome($_POST['nome']);

            $dao = new UserDAO();
            $dao->insere($user);
            $mensagem = 'Usuário salvo com sucesso';
            require_once __DIR__.'/../views/mensagem.php';
        }
        else{
            $user = new User();
            require_once __DIR__.'/../views/user/formCadastro.php';
        }


	}


    public function lista(){

        $dao = new UserDAO();
        $lista = $dao->getLista();

        if (!empty($lista)){
            require_once __DIR__.'/../views/user/lista.php';
        }
        else{
            $mensagem = 'Nenhum usuário cadastrado';
            require_once __DIR__.'/../views/mensagem.php';
        }


    }

    public function edita(){

        if (isset($_POST['idUser'], $_POST['nome'])){

            $user = new User();
            $user->setIdUser($_POST['idUser']);
            $user->setNome($_POST['nome']);


            $dao = new UserDAO();
            if ($dao->atualiza($user)){

                $mensagem = "Usuário atualziado";

            }else{
                $mensagem = "Ocorreu um erro";
            }

            require_once __DIR__.'/../views/mensagem.php';

        } else {

            $id = $_GET['id'];

            $dao = new UserDAO();
            $user = $dao->getUser($id);

            require_once __DIR__.'/../views/user/formCadastro.php';
        }

    }

    public function exclui() {
        $id = $_GET['id'];

        $postDAO = new postDAO();

        if ($postDAO->exclui($id)) {
            $mensagem = "Post excluído com sucesso!";
        } else {
            $mensagem = "Problemas";
        }

        require_once __DIR__.'/../views/mensagem.php';

    }


}
