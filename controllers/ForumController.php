<?php
class ForumController {

    public function index() {
        $dao = new ForumDAO();
        $lista = $dao->getLista();

        require_once __DIR__.'/../views/forum/index.php';
    }

	public function cadastra() {
        if (isset($_POST['nome'], $_POST['categoria'])){
            $categoria = new Categoria();
            $categoria->setIdCategoria($_POST['categoria']);

            $forum = new Forum($_POST['nome'], $categoria);

            $dao = new ForumDAO();
            $dao->insere($forum);
            $mensagem = 'Usuário salvo com sucesso';
            require_once __DIR__.'/../views/mensagem.php';
        }
        else{
            $forum = new Forum();
            $categoriaDAO = new CategoriaDAO();
            $categorias = $categoriaDAO->getLista();

            require_once __DIR__.'/../views/forum/formCadastro.php';
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

        }
        else{

            $id = $_GET['id'];

            $dao = new UserDAO();
            $user = $dao->getUser($id);

            require_once __DIR__.'/../views/user/formCadastro.php';
        }

    }

    public function exclui(){

        $id = $_GET['id'];

        $dao = new UserrDAO();

        if ($user = $dao->excluiUser($id)){

            $mensagem = "Excluído com sucesso";
        }else{
            $mensagem = "Problemas";
        }

        require_once __DIR__.'/../views/mensagem.php';

    }


}
