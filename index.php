<?php

    require_once 'vendor/autoload.php';

    // Charger les variables d'environnement
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    session_start();

    use HApp\Controller\HomeController;
    use HApp\Controller\ChampionController;
    use HApp\Controller\ErrorController;
    use HApp\Controller\UserController;
    use HApp\Controller\GameDataController;
    use HApp\Controller\FooterController;

    // Vérifier si 'action' est défini dans l'URL
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        // Créez une instance du contrôleur approprié en fonction de l'action
        switch ($action) {

            case 'home':
                $homeController = new HomeController();
                $homeController->index();
                break;

            case 'championDetail':
                $championController = new ChampionController();
                $championController->show(urldecode($_GET['champion']));
                break;

            case 'userPage':
                $userPage = new UserController();
                $userPage->showLastFiveGames();
                break;

            case 'about':
                $legalPage = new FooterController();
                $legalPage->about();
                break;

            case 'legal':
                $legalPage = new FooterController();
                $legalPage->legal();
                break;

            case 'login':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $userController = new UserController();
                    $userController->login();
                }
                break;

            case 'logout':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $userController = new UserController();
                    $userController->logout();
                    break;
                }
                break;

            case 'submitGameData':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $gameDataController = new GameDataController();
                    $gameDataController->submitGameData($_POST);
                }
                break;

            case 'registerUser':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $userController = new UserController();
                    $userController->register();
                }
                break;

            default:
                $errorController = new ErrorController();
                $errorController->notFound();
                break;
        }

    } else {
        // Si aucune action n'est spécifiée, affichez la page d'accueil
        $homeController = new HomeController();
        $homeController->index();
    }