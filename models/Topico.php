<?php
class User {
	
	protected $idTopico;
	protected $nome;
	protected $dataCriacao;
	protected $dataAtualizacao;

	

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
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    protected function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Gets the value of dataCriacao.
     *
     * @return mixed
     */
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    /**
     * Sets the value of dataCriacao.
     *
     * @param mixed $dataCriacao the data criacao
     *
     * @return self
     */
    protected function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;

        return $this;
    }

    /**
     * Gets the value of dataAtualizacao.
     *
     * @return mixed
     */
    public function getDataAtualizacao()
    {
        return $this->dataAtualizacao;
    }

    /**
     * Sets the value of dataAtualizacao.
     *
     * @param mixed $dataAtualizacao the data atualizacao
     *
     * @return self
     */
    protected function setDataAtualizacao($dataAtualizacao)
    {
        $this->dataAtualizacao = $dataAtualizacao;

        return $this;
    }
}
