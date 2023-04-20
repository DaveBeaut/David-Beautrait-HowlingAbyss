<?php

    namespace HApp\Model;

    use PDO;
    use PDOException;

    class PartieModel extends DbConnection {

        public function insertPartie($idChampion, $idUtilisateur, $datePartie, $resultatPartie) 
        {

            try {
        
                $stmt = $this->pdo->prepare(
                    "INSERT INTO parties (idchampion, idutilisateur, datepartie, resultatpartie) 
                    VALUES (:idchampion, :idutilisateur, NOW(), :resultatpartie)"
                );
        
                $stmt->bindParam(':idchampion', $idChampion);
                $stmt->bindParam(':idutilisateur', $idUtilisateur);
                $stmt->bindParam(':resultatpartie', $resultatPartie);
        
                $stmt->execute();
        
                return $this->pdo->lastInsertId();
        
            } catch (PDOException $e) {
        
                echo "Erreur lors de l'insertion de la partie : " . $e->getMessage();
                return false;
        
            }

        }
        
    }

?>
