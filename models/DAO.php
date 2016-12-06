<?php
class DAO {
	protected $conexao;

    function __construct() {
        try {
			$this->conexao = new PDO("mysql:host=localhost;dbname=forum",
				"root", "");

			$this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }
        catch (PDOException $e)	{
            print "Falhou ao conectar: ".$e->getMessage();
        }
	}

    public function db(){
        return $this->conexao;
    }
}
