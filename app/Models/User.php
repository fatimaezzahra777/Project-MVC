<?php

require_once __DIR__ . '/../../config/database.php';

class User
{
    private $id_user;
    private $nom;
    private $email;
    private $telephone;
    private $password;
    private $role;

    public function getId() { return $this->id_user; }
    public function getNom() { return $this->nom; }
    public function getEmail() { return $this->email; }
    public function getTelephone() { return $this->telephone; }
    public function getPassword() { return $this->password; }
    public function getRole() { return $this->role; }

    public function setNom($nom) { $this->nom = $nom; }
    public function setEmail($email) { $this->email = $email; }
    public function setTelephone($tel) { $this->telephone = $tel; }
    public function setPassword($pass) { $this->password = $pass; }
    public function setRole($role) { $this->role = $role; }

    // Sauvegarde dans la base
    public function save()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO users (nom, email, telephone, password, role)
                               VALUES (:nom, :email, :tel, :pass, :role)");
        $stmt->execute([
            ':nom' => $this->nom,
            ':email' => $this->email,
            ':tel' => $this->telephone,
            ':pass' => $this->password,
            ':role' => $this->role
        ]);
        $this->id_user = $pdo->lastInsertId();
    }
}
