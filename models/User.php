<?php
class User {

    protected $idUser;
    protected $nome;
	protected $email;
	protected $senha;
	protected $dataNascimento;
	protected $tipo;

	function __construct($nome) {
		$this->setNome($nome);
	}

	public function getIdUser() {
		return $this->idUser;
	}

	public function setIdUser($idUser) {
		$this->idUser = $idUser;
	}


    public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    protected function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of senha.
     *
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Sets the value of senha.
     *
     * @param mixed $senha the senha
     *
     * @return self
     */
    protected function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Gets the value of dataNascimento.
     *
     * @return mixed
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * Sets the value of dataNascimento.
     *
     * @param mixed $dataNascimento the data nascimento
     *
     * @return self
     */
    protected function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Gets the value of tipo.
     *
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Sets the value of tipo.
     *
     * @param mixed $tipo the tipo
     *
     * @return self
     */
    protected function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
}
