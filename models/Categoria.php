<?php
class Categoria {
    protected $idCategoria;
    protected $nome;
	
	public function getIdCategoria() {
		return $this->idCategoria;
	}

	public function setIdCategoria($idCategoria) {
		$this->idCategoria = $idCategoria;
	}
    
    public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}
}
