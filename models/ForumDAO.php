<?php

class ForumDAO extends DAO {
	
	public function insere(Forum $forum) {
		$sql = "INSERT INTO forum
					(nome, idCategoria)
				VALUES
					(:nome, :idCategoria);
				";

		$query = $this->db()->prepare($sql);

		$query->execute(array(
			':nome' => $forum->getNome(),
			':idCategoria' => $forum->getCategoria()->getIdCategoria()
		));

		return $this->db()->lastInsertId();
	}

	public function getLista($categoria = '') {
		$sql = "SELECT f.idForum, f.nome AS forumNome, f.idCategoria, c.nome, (select u.nome from post p, topico t, user u where t.idTopico = p.idTopico and u.idUser = p.idUser and t.idForum = f.idForum order by p.idPost desc limit 1) as userUltimoPost
				FROM forum f
				INNER JOIN categoria c
					USING (idCategoria)";

		if(!empty($categoria))
			$sql .= " WHERE f.idCategoria = :idCategoria";

		$sql .= " ORDER BY c.nome ASC";

		if(!empty($categoria)) {
			$query = $this->db()->prepare($sql);

	    	$query->execute(array(':idCategoria' => $categoria));
		} else {
			$query = $this->db()->query($sql);
		}

		$listaForum = array();

		foreach($query as $dadosForum) {
			$categoria = new Categoria();
			$categoria->setIdCategoria($dadosForum['idCategoria']);
			$categoria->setNome($dadosForum['nome']);

			$forum = new Forum($dadosForum['forumNome'], $categoria);
			$forum->setIdForum($dadosForum['idForum']);
			$forum->setUserUltimoPost($dadosForum['userUltimoPost']);

			array_push($listaForum, $forum);
		}

		return $listaForum;
	}

    public function getForum($id){
    	$sql = "SELECT f.idForum, f.nome AS nomeForum, c.idCategoria, c.nome, 
    				(select u.nome from post p, topico t, user u where t.idTopico = p.idTopico and u.idUser = p.idUser and t.idForum = f.idForum order by p.idPost desc limit 1) as userUltimoPost
    			FROM forum f
    			INNER JOIN categoria c
    				USING(idCategoria)
    			WHERE f.IdForum = :id";

    	$query = $this->db()->prepare($sql);

    	$query->execute(array(':id' => $id));

    	$dadosForum = $query->fetch();

		$categoria = new Categoria();
		$categoria->setIdCategoria($dadosForum['idCategoria']);
		$categoria->setNome($dadosForum['nome']);

    	$forum = new Forum($dadosForum['nomeForum'], $categoria);
    	$forum->setIdForum($dadosForum['idForum']);
    	$forum->setUserUltimoPost($dadosForum['userUltimoPost']);

    	return $forum;
    }

    public function atualiza(Forum $forum){
    	$sql = "UPDATE forum
    			SET nome=:nome, idCategoria=:categoria
    			WHERE idForum = :id";

    	$query = $this->db()->prepare($sql);

    	return $query->execute(array(
    		':nome' => $forum->getNome(),
    		':categoria' => $forum->getCategoria()->getIdCategoria(),
    		':id' => $forum->getIdForum()
    	));
    }

    public function exclui($id){
		$topicoDAO = new TopicoDAO();

		$topicos = $topicoDAO->getLista($id);

		if(!empty($topicos)) {
			foreach ($topicos as $key => $v) {
				$topicoDAO->exclui($v->getIdTopico());
			}
		}

		$sql = "DELETE FROM forum
				WHERE idForum = :id";

		$query = $this->db()->prepare($sql);

		return $query->execute(array(':id' => $id));
    }
}
