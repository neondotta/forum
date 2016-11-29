<?php
class User {
	
    protected $idForum;
    protected $nome;
	protected $categoria;
    
    function __construct($nome, $categoria){
        $this->setNome($nome);
        $this->setCategoria($categoria);
    }

	public function getIdForum() {
		return $this->idForum;
	}

	public function setIdForum($idForum) {
		$this->idForum = $idForum;
	}
        
    
    public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

    /**
     * Gets the value of categoria.
     *
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Sets the value of categoria.
     *
     * @param mixed $categoria the categoria
     *
     * @return self
     */
    protected function setCategoria(Categoria $categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }
}
