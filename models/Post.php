<?php
class Post {
	private $titulo;
	private $texto;
	private $idUser;
	private $idTopico;

	function __construct($titulo, $texto, $idUser, $idTopico) {
		$this->setTitulo($titulo);
		$this->setTexto($texto);
		$this->setIdUser($idUser);
		$this->setIdTopico($idTopico);
	}

    /**
     * Get the value of Titulo
     *
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of Titulo
     *
     * @param mixed titulo
     *
     * @return self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of Texto
     *
     * @return mixed
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of Texto
     *
     * @param mixed texto
     *
     * @return self
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get the value of Id User
     *
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of Id User
     *
     * @param mixed idUser
     *
     * @return self
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of Id Topico
     *
     * @return mixed
     */
    public function getIdTopico()
    {
        return $this->idTopico;
    }

    /**
     * Set the value of Id Topico
     *
     * @param mixed idTopico
     *
     * @return self
     */
    public function setIdTopico($idTopico)
    {
        $this->idTopico = $idTopico;

        return $this;
    }

}
