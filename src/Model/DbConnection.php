<?php

    namespace HApp\Model;

    use PDO;
    use PDOException;
    use Dotenv\Dotenv;

    class DbConnection {
        
        protected $pdo;

        public function __construct()
        {
            $host = $_ENV['DB_HOST'];
            $dbname = $_ENV['DB_NAME'];
            $user = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASSWORD'];

            try {
                $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // echo "Connexion à la base de données établie";
            } catch (PDOException $e) {

                die("Erreur de connexion à la base de données : " . $e->getMessage());
                
            }
        }
    }

?>
