<?php

    namespace HApp\Model;

    use PDO;
    use PDOException;

    class UserModel extends DbConnection
    {

        public function getUserByEmailAndPassword($email, $password)
        {
            $query = $this->pdo->prepare(
                "SELECT * FROM utilisateurs 
                WHERE email = :email"
            );
            
            $query->bindParam(':email', $email);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['motdepasse'])) {

                return $user;

            } else {

                return null;

            }
        }

        public function registerUser($username, $email, $hashed_password)
        {
            $query = $this->pdo->prepare(
                "INSERT INTO utilisateurs (comptelol, email, motdepasse) 
                VALUES (:username, :email, :hashed_password)"
                );

            $query->bindParam(':username', $username);
            $query->bindParam(':email', $email);
            $query->bindParam(':hashed_password', $hashed_password);
    
            return $query->execute();
        }

        
        public function getLastFiveGames($userId)
        {
            $query = $this->pdo->prepare(
                "SELECT p.resultatpartie, p.datepartie, c.nomchampion 
                FROM parties p 
                JOIN champions c 
                ON p.idchampion = c.idchampion 
                WHERE p.idutilisateur = :userId 
                ORDER BY p.datepartie 
                DESC LIMIT 5");
                
            $query->bindParam(':userId', $userId);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function updateEmail(){

            $query = $this->pdo->prepare(
                "UPDATE utilisateurs 
                SET email = :email 
                WHERE idutilisateur = :userId"
            );
    
            $query->bindParam(':email', $newEmail, PDO::PARAM_STR);
            $query->bindParam(':userId', $userId, PDO::PARAM_INT);
    
            return $query->execute();
        }

        public function deleteUser($userId) {

            $query = $this->pdo->prepare(
                "DELETE FROM utilisateurs 
                WHERE idutilisateur = :userId"
            );

            $query->bindParam(':userId', $userId, PDO::PARAM_INT);

            return $query->execute();

        }
            
    }

?>
