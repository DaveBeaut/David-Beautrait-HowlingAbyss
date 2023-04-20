<?php

    namespace HApp\Controller;

    class FooterController
    {
        // Charger la page About
        public function about($errorMessage = null)
        {
            require_once __DIR__ . '/../View/footer/about.php';
        }

        // Charger la page Legal
        public function legal($errorMessage = null)
        {
            require_once __DIR__ . '/../View/footer/legal.php';
        }
    }

?>
