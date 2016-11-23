<?php
class PostDAO extends DAO
{

    public function insere(Post $post) {
        $sql = "INSERT INTO post
                    (titulo, texto, dataCriacao, idUser, idTopico)
                VALUES
                    (:titulo, :texto, NOW(), :idUser, :idTopico)";

        $query = $this->db()->prepare($sql);

        $query->execute(array(
            ':titulo' => $post->getTitulo(),
            ':texto' => $post->getTexto(),
            ':idUser' => $post->getUser()->getIdUser(),
            ':idTopico' => $post->getTopico()->getIdTopico(),
        ));

        return $this->db()->lastInsertId();
    }

    public function getLista($idTopico) {
        $sql = "SELECT p.idPost, p.titulo, p.texto, p.dataCriacao, p.dataAtualizacao, u.idUser, u.nome FROM post p
                JOIN user u ON (p.idUser = u.idUser)
                WHERE p.idTopico = :idTopico
                ORDER BY idPost DESC";

        $query = $this->db()->prepare($sql);

        $query->execute(array(':idTopico' => $idTopico));

        $listaPosts = array();

        foreach ($query as $dadosPost) {
            $post = new Post($dadosPost['titulo'], $dadosPost['texto'], new User($dadosPost['nome']));
            $post->setIdPost($dadosPost['idPost']);
            $post->setDataCriacao($dadosPost['dataCriacao']);
            $post->setDataAtualizacao($dadosPost['dataAtualizacao']);
            $post->getUser()->setIdUser($dadosPost['idUser']);

            array_push($listaPosts, $post);
        }

        return $listaPosts;
    }

    public function getPost($id) {
        $sql = "SELECT * from user where idUser = :id";
        $query = $this->db()->prepare($sql);

        $query->execute(array(':id' => $id));

        $dadosUser = $query->fetch(PDO::FETCH_ASSOC);

        $user = new User();
        $user->setIdUser($dadosUser['idUser']);
        $user->setNome($dadosUser['nome']);

        return $user;

    }


    public function atualiza(User $user){

        $sql = "update user set nome = :nome where idUser = :id";

        $query = $this->db()->prepare($sql);

        return $query->execute(array(
            ':nome' => $user->getNome(),
            ':id' => $user->getIdUser()
        ));

    }

    public function excluiUser($id){

        $sql = "delete from user where idUser = :id";

        $query = $this->db()->prepare($sql);

        return $query->execute(array(':id' => $id));

    }



}
