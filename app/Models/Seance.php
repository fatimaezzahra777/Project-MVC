<?php

require_once __DIR__ . '/../../config/database.php';

class Seance
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("
            SELECT s.*, u.nom AS coach_nom
            FROM seance s
            JOIN users u ON s.id_coach = u.id_user
        ");

        return $stmt->fetchAll();
    }

    public function getByCoachId(int $coachId): array
    {
        $stmt = $this->db->prepare("SELECT * FROM seance WHERE id_coach = :id_coach");
        $stmt->execute(['id_coach' => $coachId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(int $coachId, string $jour, string $heure_d, string $heure_f): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO seance (id_coach, jour, heure_d, heure_f)
            VALUES (:id_coach, :jour, :heure_d, :heure_f)
        ");
        return $stmt->execute([
            'id_coach'    => $coachId,
            'jour'        => $jour,
            'heure_d' => $heure_d,
            'heure_f'   => $heure_f
        ]);
    }

    public function delete(int $id, int $coachId): bool
    {
        $stmt = $this->db->prepare("DELETE FROM seance WHERE id = :id AND id_coach = :id_coach");
        return $stmt->execute(['id' => $id, 'id_coach' => $coachId]);
    }
}

