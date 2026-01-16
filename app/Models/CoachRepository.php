<?php

class CoachRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findByUserId(int $userId): ?Coach
    {
        $sql = "
            SELECT *
            FROM public.coach
            WHERE id_user = :id_user
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_user' => $userId]);

        $data = $stmt->fetch();

        if (!$data) {
            return null;
        }

        return new Coach(
            $data['id_coach'],
            $data['id_user'],
            $data['experience'],
            $data['discipline'],
            $data['biographie'],
            $data['photo']
        );
    }
}
