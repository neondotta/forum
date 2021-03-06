<?php

class CategoriaDAO extends DAO {
	public function insere(Categoria $categoria) {
		$sql = "INSERT INTO categoria
					(nome)
				VALUES
					(:nome)";

		$query = $this->db()->prepare($sql);

		$query->execute(array(
			':nome' => $categoria->getNome()
		));

		return $this->db()->lastInsertId();
	}

	public function getLista() {
		$sql = "SELECT idCategoria, nome FROM categoria";
		$query = $this->db()->query($sql);

		$listaCategoria = array();

		foreach ($query->fetchAll() as $key => $dadosCategoria) {
			$categoria = new Categoria();
			$categoria->setIdCategoria($dadosCategoria['idCategoria']);
			$categoria->setNome($dadosCategoria['nome']);

			array_push($listaCategoria, $categoria);
		}

		return $listaCategoria;
	}

	public function getCategoria($id) {
		$sql = "SELECT * FROM categoria WHERE idCategoria = :id";

		$query = $this->db()->prepare($sql);

		$query->execute(array(':id' => $id));

		$dadosCategoria = $query->fetch();

		$categoria = new Categoria();
		$categoria->setIdCategoria($dadosCategoria['idCategoria']);
		$categoria->setNome($dadosCategoria['nome']);

		return $categoria;
	}

	public function atualiza(Categoria $categoria) {
		$sql = "UPDATE categoria
				SET nome = :nome
				WHERE idCategoria = :id";

		$query = $this->db()->prepare($sql);

		return $query->execute(
			array(
				":nome" => $categoria->getNome(),
				":id" => $categoria->getIdCategoria()
			)
		);
	}

	public function exclui($id) {
		$forumDAO = new ForumDAO();

		$foruns = $forumDAO->getLista($id);

		if(!empty($foruns)) {
			foreach ($foruns as $key => $v) {
				$forumDAO->exclui($v->getIdForum());
			}
		}

		$sql = "DELETE FROM categoria
				WHERE idCategoria = :id";

		$query = $this->db()->prepare($sql);

		return $query->execute(array(':id' => $id));
	}
}
