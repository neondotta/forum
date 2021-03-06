<?php
class PostDAO extends DAO {

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
            ':idTopico' => $post->getTopico() ? $post->getTopico()->getIdTopico() : null
        ));

        return $this->db()->lastInsertId();
    }

    public function getLista($idTopico, $idPost) {
        $sql = "SELECT p.idPost, p.titulo, p.texto, p.dataCriacao, p.dataAtualizacao, u.idUser, u.nome FROM post p
                LEFT JOIN user u ON (p.idUser = u.idUser)
                WHERE p.idTopico = :idTopico AND p.idPost != :idPost
                ORDER BY idPost ASC";

        $query = $this->db()->prepare($sql);

        $query->execute(array(':idTopico' => $idTopico, ':idPost' => $idPost));

        $listaPosts = array();

        foreach ($query as $dadosPost) {
            $usuario = new User($dadosPost['nome']);

            $post = new Post($dadosPost['titulo'], $usuario);
            $post->setIdPost($dadosPost['idPost']);
            $post->setTexto($dadosPost['texto']);
            $post->setDataCriacao($dadosPost['dataCriacao']);
            $post->setDataAtualizacao($dadosPost['dataAtualizacao']);
            $post->getUser()->setIdUser($dadosPost['idUser']);

            array_push($listaPosts, $post);
        }

        return $listaPosts;
    }

    public function getPost($id) {
        $sql = "SELECT p.idPost, p.titulo, p.texto, p.dataCriacao, p.dataAtualizacao, u.idUser, u.nome FROM post p
                JOIN user u ON (p.idUser = u.idUser)
                WHERE p.idPost = :id";

        $query = $this->db()->prepare($sql);

        $query->execute(array(':id' => $id));

        $dadosPost = $query->fetch();

        $post = new Post($dadosPost['titulo'], new User($dadosPost['nome']));
        $post->setIdPost($dadosPost['idPost']);
        $post->setText($dadosPost['texto']);
        $post->setDataCriacao($dadosPost['dataCriacao']);
        $post->setDataAtualizacao($dadosPost['dataAtualizacao']);
        $post->getUser()->setIdUser($dadosPost['idUser']);

        return $post;
    }

    public function atualiza(Post $post) {
        $sql = "UPDATE post p
                SET p.titulo=:titulo, p.texto=:texto
                WHERE p.idPost = :id";

        $query = $this->db()->prepare($sql);

        return $query->execute(array(
            ':titulo' => $post->getTitulo(),
            ':texto' => $post->getTexto(),
            ':id' => $post->getIdPost()
        ));
    }

    public function atualizaTopico(Post $post) {
        $sql = "UPDATE post p
                SET p.idTopico = :topico
                WHERE p.idPost = :id";

        $query = $this->db()->prepare($sql);

        return $query->execute(array(
            ':topico' => $post->getTopico()->getIdTopico(),
            ':id' => $post->getIdPost()
        ));
    }

    public function exclui($id) {
        $sql = "DELETE FROM post WHERE idPost = :id";

        $query = $this->db()->prepare($sql);

        return $query->execute(array(':id' => $id));
    }
}
