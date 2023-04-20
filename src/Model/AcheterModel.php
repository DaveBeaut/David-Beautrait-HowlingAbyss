<?php

    namespace HApp\Model;

    use PDO;
    use PDOException;

    class AcheterModel extends DbConnection {
 
        public function insertAcheter($idPartie, $idEquipement) {
            
            try {

                $stmt = $this->pdo->prepare(
                    "INSERT INTO acheter (idpartie, idequipement) 
                    VALUES (:idpartie, :idequipement)"
                );

                $stmt->bindParam(':idpartie', $idPartie);
                $stmt->bindParam(':idequipement', $idEquipement);

                $stmt->execute();

            } catch (PDOException $e) {

                echo "Erreur lors de l'insertion des données dans la table Acheter : " . $e->getMessage();
                return false;

            }

        }
        
    }

?>
