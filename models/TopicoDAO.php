<?php
class TopicoDAO extends DAO{
	
    public function insere(Topico $topico){
        
        $sql = "INSERT INTO topico
                    (nome,
                        dataCriacao,
                        idUser,
                        idForum
                    )
                VALUES
                    (:nome,
                        NOW(),
                        :idUser,
                        :idForum
                    )
                ";
        
        $query = $this->db()->prepare($sql);
        
        $query->execute(array(
            ':nome' => $topico->getNome(),
            ':idUser' => $topico->getUser()->getIdUser(),
            ':idForum' => $topico->getForum()->getIdForum()
        ));
        
        return $this->db()->lastInsertId();
                    
    }
    
    
    public function getLista($idForum){
        
        $sql = "SELECT 
                    t.idTopico,
                    t.nome as topico_nome,
                    t.dataCriacao,
                    t.dataAtualizacao,
                    u.idUser,
                    u.nome
                FROM topico t 
                    INNER JOIN usuario u
                        ON(t.idUser = u.idUser);
                WHERE t.idForum = :idForum;
                ORDER BY t.nome ASC";        
        
        $query = $this->db()->prepare($sql);
        
        $query->execute(array(':idForum' => $idForum))

        $listaTopico = array();
        
        foreach ($query as $dadosTopico){
            
            $topico = new Topico($dadosTopico['topico_nome'], new User($dadosTopico['nome']));
            $topico->setIdTopico($dadosTopico['idTopico']);
            $topico->setDataCriacao($dadosTopico['dataCriacao']);
            $topico->setDataAtualizacao($dadosTopico['dataAtualizacao']);
            $topico->getUser()->setUser($dadosTopico['idUser']);

            array_push($listaTopico, $topico);
        }
        
        return $listaTopico;
    }
    
    /*    CONTINUAR DAQUI     */
    
    public function getTopico($id){
        
        $sql = "SELECT 
                    t.idTopico,
                    t.nome as topico_nome,
                    t.dataCriacao,
                    t.dataAtualizacao,
                    u.idUser,
                    u.nome
                FROM topico t 
                    INNER JOIN usuario u
                        ON(t.idUser = u.idUser)
                WHERE t.idTopico = :id";

        $query = $this->db()->prepare($sql);
        
        $query->execute(array(':id' => $id));
        
        $dadosTopico = $query->fetch(PDO::FETCH_ASSOC);

        $topico = new Topico($dadosTopico['topico_nome'], new User($dadosTopico['nome']));
        $topico->setIdTopico($dadosTopico['idTopico']);
        $topico->setNome($dadosTopico['nome']);
        $topico->setDataCriacao($dadosTopico['dataCriacao']);
        $topico->setDataAtualizacao($dadosTopico['dataAtualizacao']);
        $topico->getUser()->setUser($dadosTopico['idUser']);
            
        return $topico;
        
    }
    
    
    public function atualiza(Topico $topico){
        
        $sql = "UPDATE topico 
                SET 
                    nome=:nome
                WHERE 
                    idTopico = :id";
            
        $query = $this->db()->prepare($sql);
            
        return $query->execute(array(
            ':id' => $topico->getidTopico(),
            ':nome' => $topico->getNome()
        ));
        
    }
    
    public function excluiTopico($id){
        
        $sql = "delete from topico where idTopico = :id";
            
        $query = $this->db()->prepare($sql);
            
        return $query->execute(array(':id' => $id));
        
    }
    
    
    
}   