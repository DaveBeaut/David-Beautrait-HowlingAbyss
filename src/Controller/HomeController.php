<?php

    namespace HApp\Controller;

    class HomeController
    {
        
        //Charge la page d'index
        public function index($errorMessage = null)
        {
            require_once __DIR__ . '/../View/home/home.php';
        }
        
    }

?>
