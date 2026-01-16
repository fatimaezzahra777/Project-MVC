<?php

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/UserRepository.php';

class AuthController
{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    public function login()
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userRepo->findByEmail($email);

            if ($user && password_verify($password, $user->getPassword())) {
                $_SESSION['id_user'] = $user->getId();
                $_SESSION['nom'] = $user->getNom();
                $_SESSION['role'] = $user->getRole();

                if ($user->getRole() === 'sportif') {
                    header('Location: /sportif/reserv');
                    exit;
                } elseif ($user->getRole() === 'coach') {
                    header('Location: /coach/dashboard');
                    exit;
                } else {
                    header('Location: /');
                    exit;
                }
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
            $nom = $_POST['nom'] ?? '';
            $email = $_POST['email'] ?? '';
            $telephone = $_POST['telephone'] ?? '';
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? '';

            if ($this->userRepo->findByEmail($email)) {
                $error = "Email déjà utilisé.";
            } else {
                $user = new User();
                $user->setNom($nom);
                $user->setEmail($email);
                $user->setTelephone($telephone);
                $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
                $user->setRole($role);

                $user->save();

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
