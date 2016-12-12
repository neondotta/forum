<?php

class TopicoDAO extends DAO {
    public function insere(Topico $topico) {
        $sql = "INSERT INTO topico (idPost, idForum) VALUES (:idPost, :idForum)";

        $query = $this->db()->prepare($sql);

        $query->execute(array(
            ":idPost" => $topico->getPost()->getIdPost(),
            ":idForum" => $topico->getForum()->getIdForum()
        ));

        return $this->db()->lastInsertId();
    }

    public function getLista($idForum) {
        $sql = "SELECT
                    t.idTopico,
                    t.idPost,
                    t.idForum,
                    p.titulo,
                    p.dataAtualizacao,
                    u.nome
                FROM topico t
                    JOIN post p
                        USING(idPost)
                    JOIN user u
                        USING(idUser)
                WHERE t.idForum = :idForum
                ORDER BY p.dataAtualizacao DESC";

        $query = $this->db()->prepare($sql);

        $query->execute(array(":idForum" => $idForum));

        $listaTopico = array();

        foreach ($query as $dadosTopico) {
            $post = new Post($dadosTopico["titulo"], new User($dadosTopico["nome"]));
            $post->setDataAtualizacao($dadosTopico["dataAtualizacao"]);

            $topico = new Topico($post);
            $topico->setIdTopico($dadosTopico["idTopico"]);

            array_push($listaTopico, $topico);
        }

        return $listaTopico;
    }

    public function getTopico($id) {
        $sql = "SELECT
                    t.idPost,
                    t.idForum,
                    t.idTopico,
                    p.texto,
                    p.titulo,
                    p.dataAtualizacao,
                    u.nome
                FROM topico t
                JOIN post p
                    USING(idPost)
                JOIN user u
                    USING(idUser)
                WHERE t.idTopico = :id";

        $query = $this->db()->prepare($sql);

        $query->execute(array(":id" => $id));

        $dadosTopico = $query->fetch();

        $post = new Post($dadosTopico["titulo"], new User($dadosTopico["nome"]));
        $post->setTexto($dadosTopico["texto"]);
        $post->setIdPost($dadosTopico["idPost"]);
        $post->setDataAtualizacao($dadosTopico["dataAtualizacao"]);

        $topico = new Topico($post);
        $topico->setIdTopico($dadosTopico["idTopico"]);

        return $topico;
    }

    public function atualiza(Topico $topico) {
        $sql = "UPDATE post
                SET titulo = :titulo, texto = :texto
                WHERE idPost = :id";

        $query = $this->db()->prepare($sql);

        return $query->execute(array(
            ":titulo" => $topico->getPost()->getTitulo(),
            ":texto" => $topico->getPost()->getTexto(),
            ":id" => $topico->getPost()->getIdPost()
        ));
    }

    public function exclui($id){
        $postDAO = new PostDAO();

		$posts = $postDAO->getLista($id);

		if(!empty($posts)) {
			foreach ($posts as $key => $v) {
				$postDAO->exclui($v->getIdPost());
			}
		}

		$sql = "DELETE FROM topico
				WHERE idTopico = :id";

		$query = $this->db()->prepare($sql);

		return $query->execute(array(':id' => $id));
    }
}
