<?php

class ForumDAO extends DAO{

	public function insere(Forum $forum){

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
		$sql = "SELECT f.idForum, f.nome AS forumNome, f.idCategoria, c.nome
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

		foreach($query as $dadosForum){

			$forum = new Forum($dadosForum['forumNome'], new Categoria($dadosForum['nome']));
			$forum->setIdForum($dadosForum['idForum']);
			$forum->getCategoria()->setIdCategoria($dadosForum['idCategoria']);

			array_push($listaForum, $forum);
		}

		return $listaForum;

	}

    public function getPost($id){
    	$sql = "SELECT f.idForum, f.nome AS nomeForum, c.idCategoria, c.nome;
    			FROM forum f
    			INNER JOIN categoria c
    				USING(idCategoria)
    			WHERE p.IdForum = :id";

    	$query = $this->db()->prepare($sql);

    	$query->execute(array(':id' => $id));

    	$dadosForum = $query->fetch(PDO::FETCH_ASSOC);

    	$forum = new Forum($dadosForum['nomeForum'], new Categoria($dadosForum['nome']));
    	$forum->setIdForum($dadosForum['idForum']);

    	return $forum;

    }

    public function atualiza(Forum $forum){
    	$sql = "UPDATE forum
    			SET nome=:nome, categoria=:categoria
    			WHERE idForum = :id";

    	$query = $this->db()->prepare($sql);

    	return $query->execute(array(
    		':nome' => $forum->getNome(),
    		':categoria' => $forum->getCategoria()->getIdCategoria(),
    		':id' => $forum->getIdForum()
    	));

    }

    public function exclui($id){
    	$sql = "DELETE FROM forum
    			WHERE idForum = :id";

    	$query = $this->db()->prepare($sql);

    	$query->execute(array(':id' => $id));
    }


}



?>
