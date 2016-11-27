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
			':idCategoria' => $forum->getIdCategoria()
		));

		return $this->db()->lastInsertId();

	}

	public function getLista($idCategoria){
		$sql = 'SELECT f.nome, c.nome
				FROM forum f
					INNER JOIN categoria c
						USING (idCategoria)
				WHERE c.idCategoria = :idCategoria
				';

		$query = $this->db()->prepare($sql);

		$query->execute(array(':idForum' => $idForum));

		$listaForum = array();

		foreach($query as $dadosForum){
			
		}

	}




}



?>