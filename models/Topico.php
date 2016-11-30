<?php
class Topico {
	
	protected $idTopico;
    protected $post;
	protected $forum;

<<<<<<< HEAD
	function __construct($nome, $user){
		$this->setNome($nome);
        $this->idUser($user);
=======
	function __construct($post){
        $this->setPost($post);
>>>>>>> 49cb3fdaf5cd4fa46618799091c254cceed10698
	}

    /**
     * Gets the value of idTopico.
     *
     * @return mixed
     */
    public function getIdTopico()
    {
        return $this->idTopico;
    }

    /**
     * Sets the value of idTopico.
     *
     * @param mixed $idTopico the id topico
     *
     * @return self
     */
    protected function setIdTopico($idTopico)
    {
        $this->idTopico = $idTopico;

        return $this;
    }

    /**
     * Gets the value of post.
     *
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Sets the value of post.
     *
     * @param mixed $post the post
     *
     * @return self
     */
    protected function setPost(Post $post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Gets the value of forum.
     *
     * @return mixed
     */
    public function getForum()
    {
        return $this->forum;
    }

    /**
     * Sets the value of forum.
     *
     * @param mixed $forum the forum
     *
     * @return self
     */
    protected function setForum(Forum $forum)
    {
        $this->forum = $forum;

        return $this;
    }
}
