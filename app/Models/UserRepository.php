<?php

require_once __DIR__ . '/User.php';
require_once __DIR__ . '/../../config/database.php';

class UserRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function findByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $user = new User();
            $user->setNom($data['nom']);
            $user->setEmail($data['email']);
            $user->setTelephone($data['telephone']);
            $user->setPassword($data['password']);
            $user->setRole($data['role']);

            $reflection = new ReflectionClass($user);
            $property = $reflection->getProperty('id_user');
            $property->setAccessible(true);
            $property->setValue($user, $data['id_user']);

            return $user;
        }

        return null;
    }
}
