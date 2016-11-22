<?php
class UserDAO extends DAO{
	
    public function insere(User $user){
        
        $sql = "INSERT INTO user
                    (nome)
                VALUES
                    (:nome)";
        
        $query = $this->db()->prepare($sql);
        
        $query->execute(array(
            ':nome' => $user->getNome()
        ));
        
        return $this->db()->lastInsertId();
                    
    }
    
    
    public function getLista(){
        
        $sql = "SELECT * from user order by nome";        
        
        $query = $this->db()->query($sql);
        
        $listaUsers = array();
        
        foreach ($query as $dadosUser){
            
            $user = new User();
            $user->setIdUser($dadosUser['idUser']);
            $user->setNome($dadosUser['nome']);
            array_push($listaUsers, $user);
        }
        
        return $listaUsers;
    }
    
    
    public function getUser($id){
        
        $sql = "SELECT * from user where idUser = :id";        
        $query = $this->db()->prepare($sql);
        
        $query->execute(array(':id' => $id));
        
        $dadosUser = $query->fetch(PDO::FETCH_ASSOC);

        $user = new User();
        $user->setIdUser($dadosUser['idUser']);
        $user->setNome($dadosUser['nome']);
                
        return $user;
        
    }
    
    
    public function atualiza(User $user){
        
        $sql = "update user set nome = :nome where idUser = :id";
            
        $query = $this->db()->prepare($sql);
            
        return $query->execute(array(
            ':nome' => $user->getNome(),
            ':id' => $user->getIdUser()
        ));
        
    }
    
    public function excluiUser($id){
        
        $sql = "delete from user where idUser = :id";
            
        $query = $this->db()->prepare($sql);
            
        return $query->execute(array(':id' => $id));
        
    }
    
    
    
}   