<?php
declare(strict_types=1);

class Sportif
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findByUserId(int $userId): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM sportif WHERE id_user = :userId");
        $stmt->execute(['userId' => $userId]);
        $sportif = $stmt->fetch(PDO::FETCH_ASSOC);
        return $sportif ?: null;
    }

    public function findAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM sportif");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add(int $userId, string $niveau): bool
    {
        $stmt = $this->db->prepare("INSERT INTO sportif (id_user, niveau) VALUES (:userId, :niveau)");
        return $stmt->execute(['userId' => $userId, 'niveau' => $niveau]);
    }
}
