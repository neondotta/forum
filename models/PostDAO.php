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
            ':senha' => $post->getDataCriacao(),
            ':idUser' => $post->getIdUser(),
            ':idTopico' => $post->getIdTopico(),
        ));

        return $this->db()->lastInsertId();
    }


    public function getLista() {
        $sql = "SELECT p.idPost, p.titulo, u.nome FROM post p
                JOIN user u ON (p.idUser = u.idUser)
                ORDER BY idPost DESC";

        $query = $this->db()->query($sql);

        $listaPosts = array();

        foreach ($query as $dadosPost){
            $post = new Post();
            $post->setIdUser($dadosPost['idPost']);
            $post->setTitulo($dadosPost['titulo']);
            $post->setUser(new User($dadosPost['nome']));

            array_push($listaPosts, $post);
        }

        return $listaPosts;
    }


    public function getUser($id){

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
