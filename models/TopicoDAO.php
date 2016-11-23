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
    
    
    public function getLista(){
        
        $sql = "SELECT 
                    t.nome,
                    t.dataCriacao,
                    t.dataAtualizacao,
                    u.Nome
                FROM topico t 
                    INNER JOIN usuario u
                        ON(t.idUser = u.idUser);
                WHERE t.idForum = :idForum;
                ORDER BY t.nome ASC";        
        
        $query = $this->db()->query($sql);
        
        $listaTopico = array();
        
        foreach ($query as $dadosTopico){
            
            $topico = new Topico();
                $topico->setIdTopico($dadosTopico['idTopico']);
                $topico->setNome($dadosTopico['nome']);
                $topico->setDataCriacao($dadosTopico['dataCriacao']);
                $topico->setDataAtualizacao($dadosTopico['dataAtualizacao']);
                $topico->setUser($dadosTopico['user']);

            array_push($listaTopico, $topico);
        }
        
        return $listaTopico;
    }
    
    /*    CONTINUAR DAQUI     */
    
    public function getTopico($id){
        
        $sql = "SELECT * from topico where idTopico = :id";        
        $query = $this->db()->prepare($sql);
        
        $query->execute(array(':id' => $id));
        
        $dadosTopico = $query->fetch(PDO::FETCH_ASSOC);

        $topico = new Topico();
            $topico->setIdTopico($dadosTopico['idTopico']);
            $topico->setNome($dadosTopico['nome']);
            $topico->setDataCriacao($dadosTopico['dataCriacao']);
                
        return $topico;
        
    }
    
    
    public function atualiza(Topico $topico){
        
        $sql = "update topico 
                set 
                    nome = :nome,
                    dataCriacao = :dataCriacao,
                    dataAtualizacao = :dataAtualizacao,
                where 
                    idTopico = :id";
            
        $query = $this->db()->prepare($sql);
            
        return $query->execute(array(
            ':id' => $topico->getidTopico(),
            ':nome' => $topico->getNome(),
            ':dataCriacao' => $topico->getDataCriacao(),
        ));
        
    }
    
    public function excluiTopico($id){
        
        $sql = "delete from topico where idTopico = :id";
            
        $query = $this->db()->prepare($sql);
            
        return $query->execute(array(':id' => $id));
        
    }
    
    
    
}   