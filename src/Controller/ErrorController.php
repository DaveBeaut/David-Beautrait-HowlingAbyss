<?php

    namespace HApp\Controller;

    class ErrorController
    {
        public function notFound()
        {
            // Charger la page d'erreur 404 
            require_once __DIR__ . '/../View/errors/404.php';
        }
    }

?>
