<?php

class CoachController
{
    public function dashboard()
    {

        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'coach') {
            header('Location: /login');
            exit;
        }

        $userId = (int) $_SESSION['user']['id'];
        $db = Database::getConnection();
        $coachRepo = new CoachRepository($db);

        $coach = $coachRepo->findByUserId($_SESSION['user']['id']);
        require __DIR__ . '/../View/coach/dashboard.php';
    }
}
