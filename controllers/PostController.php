<?php
class PostController {

    public function edita() {

        if (isset($_POST["idUser"], $_POST["nome"])){

            $user = new User();
            $user->setIdUser($_POST["idUser"]);
            $user->setNome($_POST["nome"]);


            $dao = new UserDAO();
            if ($dao->atualiza($user)){

                $mensagem = "Usuário atualziado";

            }else{
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

        $postDAO = new postDAO();

        $redirect = "?r=topico/index&id={$_GET['topico']}";

        if ($postDAO->exclui($id)) {
            $mensagem = "Post excluído com sucesso!";
        } else {
            $mensagem = "Problemas";
        }

        require_once __DIR__."/../views/mensagem.php";

    }


}
