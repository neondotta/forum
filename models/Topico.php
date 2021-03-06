<?php
class Topico {

	private $idTopico;
    private $post;
	private $forum;

	function __construct($post){
        $this->setPost($post);
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
    public function setIdTopico($idTopico)
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
    public function setPost(Post $post)
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
    public function setForum(Forum $forum)
    {
        $this->forum = $forum;

        return $this;
    }
}
