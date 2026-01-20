<?php

class Coach
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findByUserId(int $userId): ?array
    {
        $sql = "
            SELECT *
            FROM coach
            WHERE id_user = :id_user
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_user' => $userId]);

        return $stmt->fetch() ?: null;
    }

    public function create(array $data): bool
    {
        $sql = "
            INSERT INTO coach (id_user, experience, discipline, biographie, photo)
            VALUES (:id_user, :experience, :discipline, :biographie, :photo)
        ";

        return $this->db->prepare($sql)->execute($data);
    }
}
