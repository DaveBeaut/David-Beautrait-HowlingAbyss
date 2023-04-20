<?php

    namespace HApp\Controller;

    use HApp\Model\UserModel;

    class UserController
    {
        public function login()
        {

            // Vérifie si l'utilisateur a soumis un formulaire avec une adresse e-mail et un mot de passe
            if (isset($_POST['email']) && isset($_POST['password'])) {
                //Récupère l'email et le mot de passe
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                
                $userModel = new UserModel();
                $user = $userModel->getUserByEmailAndPassword($email, $password);

                if ($user) {
                    $_SESSION['user_id'] = $user['idutilisateur'];
                    $_SESSION['username'] = $user['comptelol'];

                    $gameDataModel = new UserModel();
                    $lastFiveGames = $gameDataModel->getLastFiveGames($user['idutilisateur']);

                    require_once __DIR__ . '/../View/user/user.php';
                } else {
                    $errorMessage = "Mail or password incorrect.";
                    $homeController = new HomeController();
                    $homeController->index($errorMessage);
                }

            } else {

                require_once __DIR__ . '/../View/user/login.php';

            }

        }

        public function register()
        {

            if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmpassword'])) {
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $confirmpassword = htmlspecialchars($_POST['confirmpassword']);

                if ($password !== $confirmpassword) {
                    die("Passwords does not match.");
                }

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $userModel = new UserModel();

                if ($userModel->registerUser($username, $email, $hashed_password)) {
                    echo "User successfully registered.";

                } else {
                    echo "Error registering user.";
                }

            }

        }

        // Déconnecter l'user
        public function logout()
        {

            if (isset($_SESSION['username'])) {
                unset($_SESSION['username']);
            }

            session_destroy();
            
            header("Location: index.php");
            exit;

        }

        // Faire apparaître les 5 dernières game d'un user
        public function showLastFiveGames()
        {

            if (isset($_SESSION['user_id'])) {
                $UserModel = new UserModel();
                $lastFiveGames = $UserModel->getLastFiveGames($_SESSION['user_id']);
                require_once __DIR__ . '/../View/user/user.php';
                
            } else {
                header("Location: index.php");
            }

        }

        // Charger la page userPage
        public function userPage()
        {
            require_once __DIR__ . '/../View/user/user.php';
        }
        

    }
