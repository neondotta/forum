<?php
class UserDAO extends DAO{
	
    public function insere(User $user){
        
        $sql = "INSERT INTO user
                    (nome,
                        email,
                        senha,
                        dataNascimento,
                        tipo)
                VALUES
                    (:nome,
                        :email,
                        :senha,
                        :dataNascimento,
                        :tipo)
                ";
        
        $query = $this->db()->prepare($sql);
        
        $query->execute(array(
            ':nome' => $user->getNome(),
            ':email' => $user->getEmail(),
            ':senha' => $user->getSenha(),
            ':dataNascimento' => $user->getDataNascimento(),
            ':tipo' => $user->getTipo()
        ));
        
        return $this->db()->lastInsertId();
        
        var_dump($query);
    }
    
    
    public function getLista(){
        
        $sql = "SELECT * from user order by nome";        
        
        $query = $this->db()->query($sql);
        
        $listaUsers = array();
        
        foreach ($query as $dadosUser){
            
            $user = new User();
                $user->setIdUser($dadosUser['idUser']);
                $user->setNome($dadosUser['nome']);
                $user->setEmail($dadosUser['email']);
                $user->setSenha($dadosUser['senha']);
                $user->setDataNascimento($dadosUser['dataNascimento']);
                $user->setTipo($dadosUser['tipo']);
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
            $user->setEmail($dadosUser['email']);
            $user->setSenha($dadosUser['senha']);
            $user->setDataNascimento($dadosUser['dataNascimento']);
            $user->setTipo($dadosUser['tipo']);
                
        return $user;
        
    }
    
    
    public function atualiza(User $user){
        
        $sql = "update user 
                set 
                    nome = :nome,
                    email = :email,
                    senha = :senha,
                    dataNascimento = :dataNascimento,
                    tipo = :tipo
                where 
                    idUser = :id";
            
        $query = $this->db()->prepare($sql);
            
        return $query->execute(array(
            ':id' => $user->getIdUser(),
            ':nome' => $user->getNome(),
            ':email' => $user->getEmail(),
            ':senha' => $user->getSenha(),
            ':dataNascimento' => $user->getDataNascimento(),
            ':tipo' => $user->getTipo()
        ));
        
    }
    
    public function excluiUser($id){
        
        $sql = "delete from user where idUser = :id";
            
        $query = $this->db()->prepare($sql);
            
        return $query->execute(array(':id' => $id));
        
    }
    
    
    
}   