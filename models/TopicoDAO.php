<?php
class TopicoDAO extends DAO{
	
    public function insere(Topico $topico){
        
        $sql = "INSERT INTO topico
                    (   idPost,
                        idForum
                    )
                VALUES
                    (   :idPost,
                        :idForum
                    )
                ";
        
        $query = $this->db()->prepare($sql);
        
        $query->execute(array(
            ':idUser' => $topico->getPost()->getIdPost(),
            ':idForum' => $topico->getForum()->getIdForum()
        ));
        
        return $this->db()->lastInsertId();
                    
    }
    
    
    public function getLista($idForum){
        
        $sql = "SELECT 
                    t.idTopico,
                    t.idPost,
                    t.idForum,
                    p.titulo,
                    p.dataAtualizacao,
                    u.nome
                FROM topico t 
<<<<<<< HEAD
                    INNER JOIN usuario u
                        ON(t.idUser = u.idUser)
                WHERE t.idForum = :idForum
                ORDER BY t.nome ASC";        
=======
                    INNER JOIN post p
                        USING(idPost)
                    INNER JOIN user u
                        USING(idUser)
                WHERE t.idForum = :idForum;
                ORDER BY p.dataAtualizacao DESC";        
>>>>>>> 49cb3fdaf5cd4fa46618799091c254cceed10698
        
        $query = $this->db()->prepare($sql);
        
        $query->execute(array(':idForum' => $idForum))

        $listaTopico = array();
        
        foreach ($query as $dadosTopico){

            $post = new Post($dadosTopico['titulo'], new User($dadosTopico['nome']);
            $post->setDataAtualizacao($dadosTopico['dataAtualizacao']);
            
<<<<<<< HEAD
            $topico = new Topico();
                $topico = new Post($dadosTopico['nome'], new User($dadosTopico['nome']));
                $topico->setIdTopico($dadosTopico['idTopico']);
                $topico->setDataCriacao($dadosTopico['dataCriacao']);
                $topico->setDataAtualizacao($dadosTopico['dataAtualizacao']);
                $topico->getUser->setIdUser($dadosTopico['idUser']);
=======
            $topico = new Topico($post);
            $topico->setIdTopico($dadosTopico['idTopico']);
>>>>>>> 49cb3fdaf5cd4fa46618799091c254cceed10698

            array_push($listaTopico, $topico);
        }
        
        return $listaTopico;
    }
    
    /*    CONTINUAR DAQUI     */
    
    public function getTopico($id){
        
<<<<<<< HEAD
        $sql = "SELECT
            t.idTopico,
            t.nome,
            t.dataCriacao,
            t.dataAtualizacao,
            u.idUser,
            u.Nome
        FROM topico t 
            INNER JOIN usuario u
                ON(t.idUser = u.idUser)
        WHERE t.Topico = :id";       
        
=======
        $sql = "SELECT 
                    t.idTopico,
                    t.idPost,
                    t.idForum,
                    p.titulo,
                    p.dataAtualizacao
                FROM topico t 
                    INNER JOIN post p
                        USING(idPost);
                WHERE t.idTopico = :id";

>>>>>>> 49cb3fdaf5cd4fa46618799091c254cceed10698
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