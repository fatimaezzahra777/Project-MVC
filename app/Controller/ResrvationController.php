<?php
declare(strict_types=1);

class ReservationRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findByCoachId(int $coachId): array
    {
        $stmt = $this->db->prepare("
            SELECT r.*, s.id_sportif, s.niveau, u.nom
            FROM reservation r
            JOIN sportif s ON r.id_sportif = s.id_sportif
            JOIN users u ON s.id_user = u.id_user
            WHERE r.id_coach = :coachId
            ORDER BY r.date_r DESC
        ");
        $stmt->execute(['coachId' => $coachId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findBySportifId(int $sportifId): array
    {
        $stmt = $this->db->prepare("
            SELECT r.*, c.id_coach, c.discipline, u.nom AS coach_nom
            FROM reservation r
            JOIN coach c ON r.id_coach = c.id_coach
            JOIN users u ON c.id_user = u.id_user
            WHERE r.id_sportif = :sportifId
            ORDER BY r.date_r DESC
        ");
        $stmt->execute(['sportifId' => $sportifId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add(int $coachId, int $sportifId, string $date, string $heure, string $statut = 'en_attente'): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO reservation (id_coach, id_sportif, date_r, heure, statut)
            VALUES (:coachId, :sportifId, :date_r, :heure, :statut)
        ");
        return $stmt->execute([
            'coachId' => $coachId,
            'sportifId' => $sportifId,
            'date_r' => $date,
            'heure' => $heure,
            'statut' => $statut
        ]);
    }
}
