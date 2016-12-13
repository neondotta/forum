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
                        :tipo)";

        $query = $this->db()->prepare($sql);

        $query->execute(array(
            ':nome' => $user->getNome(),
            ':email' => $user->getEmail(),
            ':senha' => md5($user->getSenha()),
            ':dataNascimento' => $user->getDataNascimento(),
            ':tipo' => $user->getTipo()
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

        $dadosUser = $query->fetch();

        $user = new User();
            $user->setIdUser($dadosUser['idUser']);
            $user->setNome($dadosUser['nome']);
            $user->setEmail($dadosUser['email']);
            $user->setSenha($dadosUser['senha']);
            $user->setDataNascimento($dadosUser['dataNascimento']);
            $user->setTipo($dadosUser['tipo']);

        return $user;

    }

    public function getLogin($email, $senha){

        $sql = "SELECT * FROM user 
                    WHERE email = :email 
                    AND senha = :senha";

        $query = $this->db()->prepare($sql);
        $query->execute(array(':email' => $email, ':senha' =>md5($senha)));

        $dadosUser = $query->fetch();

        if(empty($dadosUser)){
            return false;
        }else{
            $user = new User();
            $user->setIdUser($dadosUser['idUser']);
            $user->setNome($dadosUser['nome']);
            $user->setEmail($dadosUser['email']);
            $user->setDataNascimento($dadosUser['dataNascimento']);
            $user->setTipo($dadosUser['tipo']);
        
            session_start();
            $_SESSION['login'] = $user;
            return true;
        }

    }

    public function atualiza(User $user){

        $sql = "update user
                set
                    nome = :nome,
                    email = :email,";

        if(!empty($user->getSenha())){            
            $sql .= "senha = :senha,";
        }

        $sql .= "
                    dataNascimento = :dataNascimento,
                    tipo = :tipo
                where
                    idUser = :id";

        $query = $this->db()->prepare($sql);

        $query->bindParam(':id', $user->getIdUser(), PDO::PARAM_INT);
        $query->bindParam(':nome', $user->getNome(), PDO::PARAM_STR);
        $query->bindParam(':dataNascimento', $user->getdataNascimento(), PDO::PARAM_STR);
        $query->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);

        if(!empty($user->getSenha())){
            $query->bindParam(':senha', md5($user->getSenha()), PDO::PARAM_STR);
        }
        
        $query->bindParam(':tipo', $user->getTipo(), PDO::PARAM_INT);

        return $query->execute();

    }

    public function excluiUser($id){

        $sql = "delete from user where idUser = :id";

        $query = $this->db()->prepare($sql);

        return $query->execute(array(':id' => $id));

    }



}
