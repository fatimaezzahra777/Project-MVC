<?php

class SeanceController
{
    private SeanceRepository $seanceRepo;

    public function __construct()
    {
        $this->seanceRepo = new SeanceRepository(Database::getConnection());
    }

    public function index(): void
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'coach') {
            header('Location: /login');
            exit;
        }

        $seances = $this->seanceRepo
            ->findByCoachUserId($_SESSION['user']['id']);

        require __DIR__ . '/../View/coach/seance.php';
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /coach/seance');
            exit;
        }

        $this->seanceRepo->create([
            'id_coach' => $_SESSION['user']['id'],
            'date_s'   => $_POST['date'],
            'heure'    => $_POST['heure'],
            'duree'    => $_POST['duree']
        ]);

        header('Location: /coach/seances');
    }

    public function delete(): void
    {
        $this->seanceRepo->delete((int) $_POST['id']);
        header('Location: /coach/seances');
    }
}
