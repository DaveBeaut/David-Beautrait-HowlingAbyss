<?php

    namespace HApp\Model;

    use PDO;
    use PDOException;

    class ChampionModel extends DbConnection {

        public function insertChampion($nomchampion){
            
            try {

                $stmt = $this->pdo->prepare(
                    "INSERT INTO champions (nomchampion) 
                    VALUES (:nomchampion)"
                );

                $stmt->bindParam(':nomchampion', $nomchampion);

                $stmt->execute();

                return $this->pdo->lastInsertId();

            } catch (PDOException $e) {

                echo "Erreur lors de l'insertion du champion : " . $e->getMessage();

                return false;

            }
        }
    }

?>