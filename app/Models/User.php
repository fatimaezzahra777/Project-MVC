<?php
require_once __DIR__ . '/../config/database.php';

class User {
    private $id_user;
    private $nom;
    private $email;
    private $password;
    private $role;

    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    // Getters
    public function getId() { return $this->id_user; }
    public function getNom() { return $this->nom; }
    public function getRole() { return $this->role; }

    // Hydrate l'objet à partir d'un tableau
    private function hydrate(array $data) {
        $this->id_user = $data['id_user'];
        $this->nom     = $data['nom'];
        $this->email   = $data['email'];
        $this->password= $data['password'];
        $this->role    = $data['role'];
    }

    // Chercher un utilisateur par email
    public function findByEmail(string $email): ?User {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $data = $stmt->fetch();

        if ($data) {
            $user = new User();
            $user->hydrate($data);
            return $user;
        }
        return null;
    }

    // Vérifier le login
    public function login(string $email, string $password): ?User {
        $user = $this->findByEmail($email);

        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }
}
