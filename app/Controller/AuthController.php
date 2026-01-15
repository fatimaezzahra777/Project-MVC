<?php
session_start();
require_once __DIR__ . '/../Models/User.php';

class AuthController {

    public function login() {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->login($email, $password);

            if ($user) {
                $_SESSION['id_user'] = $user->getId();
                $_SESSION['nom']     = $user->getNom();
                $_SESSION['role']    = $user->getRole();

                if ($user->getRole() === 'sportif') {
                    header('Location: /sportif/reserv');
                } elseif ($user->getRole() === 'coach') {
                    header('Location: /coach/dashboardC');
                } else {
                    header('Location: /');
                }
                exit;
            } else {
                $error = "Email ou mot de passe incorrect.";
            }
        }

        require __DIR__ . '/../View/authentification/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: /login');
        exit;
    }
}
