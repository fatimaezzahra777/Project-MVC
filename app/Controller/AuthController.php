<?php

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../../config/database.php';

class AuthController
{
    private User $userModel;

    public function __construct()
    {
        $db = Database::getConnection();
        $this->userModel = new User($db);
    }

    public function login()
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {

                $_SESSION['user'] = [
                    'id'   => $user['id_user'],
                    'nom'  => $user['nom'],
                    'role' => $user['role']
                ];

                if ($user['role'] === 'sportif') {
                    header('Location: /sportif/dashboard');
                } elseif ($user['role'] === 'coach') {
                    header('Location: /coach/dashboard');
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

    public function register()
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom'       => $_POST['nom'] ?? '',
                'email'     => $_POST['email'] ?? '',
                'telephone' => $_POST['telephone'] ?? '',
                'password'  => password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT),
                'role'      => $_POST['role'] ?? ''
            ];

            if ($this->userModel->findByEmail($data['email'])) {
                $error = "Email déjà utilisé.";
            } else {
                $this->userModel->create($data);
                header('Location: /login');
                exit;
            }
        }

        require __DIR__ . '/../View/authentification/register.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit;
    }
}
