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

	public function getLista($idCategoria){
		$sql = 'SELECT f.nome AS forumNome, c.nome
				FROM forum f
					INNER JOIN categoria c
						USING (idCategoria)
				ORDER BY c.nome ASC;
				';

		$query = $this->db()->query($sql);

		$listaForum = array();

		foreach($query as $dadosForum){
			
			$forum = new Forum($dadosForum['forumNome'], new Categoria($dadosForum['nome']));
			$forum->setIdForum($dadosForum['IdForum']);
			$forum->getCategoria()->setIdCategoria($dadosForum['idCategoria']);

			array_push($listaForum, $forum);
		}

		return $listaForum;

	}

	


}



?>