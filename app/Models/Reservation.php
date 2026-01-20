<?php

require_once __DIR__ . '/../../config/database.php';

class Reservation
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function create(int $sportifId, int $seanceId): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO reservation (sportif_id, seance_id)
            VALUES (:sportif, :seance)
        ");

        return $stmt->execute([
            'sportif' => $sportifId,
            'seance'  => $seanceId
        ]);
    }

    public function getByCoachId(int $coachId): array
    {
        $stmt = $this->db->prepare("SELECT * FROM seance WHERE id_coach = :id_coach");
        $stmt->execute(['id_coach' => $coachId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBySportif(int $sportifId): array
    {
        $stmt = $this->db->prepare("
            SELECT r.*, s.jour
            FROM reservation r
            JOIN seance s ON r.id_seance = s.id
            WHERE r.id_sportif = :id
        ");

        $stmt->execute(['id' => $sportifId]);
        return $stmt->fetchAll();
    }
}
