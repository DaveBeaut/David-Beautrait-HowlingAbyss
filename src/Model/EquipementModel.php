<?php

    namespace HApp\Model;

    use PDO;
    use PDOException;
    
    class EquipementModel extends DbConnection {

        public function insertEquipement($nomEquipement) 
        {

            try {

                $stmt = $this->pdo->prepare(
                    "INSERT INTO equipements (nomequipement) 
                    VALUES (:nomequipement)"
                );

                $stmt->bindParam(':nomequipement', $nomEquipement);

                $stmt->execute();

                return $this->pdo->lastInsertId();
                
            } catch (PDOException $e) {

                echo "Erreur lors de l'insertion de l'équipement : " . $e->getMessage();
                return false;
                
            }
        }
    }

?>
