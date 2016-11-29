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
			':idCategoria' => $forum->getIdCategoria()>getIdTopico()
		));

		return $this->db()->lastInsertId();

	}

	public function getLista() {
		$sql = 'SELECT f.idForum, f.nome AS forumNome, f.idCategoria, c.nome
				FROM forum f
					INNER JOIN categoria c
						USING (idCategoria)
				ORDER BY c.nome ASC;
				';

		$query = $this->db()->query($sql);

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

    	$forum = new Forum($dadosForum['nomeForum'], new Categoria($dadosForum['nome']]));
    	$forum->setIdForum($dadosForum['idForum']);

    	$return $forum;

    }



}



?>