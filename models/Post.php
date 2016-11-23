<?php
class Post {
	private $idPost;
	private $titulo;
	private $texto;
	private $dataCriacao;
	private $dataAtualizacao;
	private $user;
	private $topico;

	function __construct($titulo, $texto, $user) {
		$this->setTitulo($titulo);
		$this->setTexto($texto);
		$this->setIdUser($user);
	}

    /**
     * Get the value of Id Post
     *
     * @return mixed
     */
    public function getIdPost()
    {
        return $this->idPost;
    }

    /**
     * Set the value of Id Post
     *
     * @param mixed idPost
     *
     * @return self
     */
    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;

        return $this;
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
     * Get the value of User
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of User
     *
     * @param mixed user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of Topico
     *
     * @return mixed
     */
    public function getTopico()
    {
        return $this->topico;
    }

    /**
     * Set the value of Topico
     *
     * @param mixed topico
     *
     * @return self
     */
    public function setTopico($topico)
    {
        $this->topico = $topico;

        return $this;
    }

}
