<?php

class Sportif
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findByUserId(int $userId): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM sportif WHERE id_user = :user_id"
        );
        $stmt->execute(['user_id' => $userId]);

        return $stmt->fetch() ?: null;
    }

    public function create(int $userId, ?string $niveau): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO sportif (id_user, niveau) VALUES (:id_user, :niveau)"
        );

        return $stmt->execute([
            'id_user' => $userId,
            'niveau'  => $niveau
        ]);
    }
}
