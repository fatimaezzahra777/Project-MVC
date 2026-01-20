<?php

require_once __DIR__ . '/../Models/Seance.php';
require_once __DIR__ . '/../Models/Reservation.php';

class SportifController
{
    public function dashboard()
    {
        $this->checkSportif();
        require __DIR__ . '/../View/sportif/dashboard.php';
    }

    public function seances()
    {
        $this->checkSportif();

        $seanceModel = new Seance();
        $seances = $seanceModel->getAll();

        require __DIR__ . '/../View/sportif/seance.php';
    }

    public function reservations()
    {
        $this->checkSportif();

        $reservationModel = new Reservation();
        $reservations = $reservationModel->getBySportif($_SESSION['user']['id']);

        require __DIR__ . '/../View/sportif/reserv.php';
    }

    public function reserver()
    {
        $this->checkSportif();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reservation = new Reservation();
            $reservation->create(
                $_SESSION['user']['id'],
                $_POST['seance_id']
            );

            header('Location: /sportif/reserv');
            exit;
        }
    }

    private function checkSportif()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'sportif') {
            header('Location: /login');
            exit;
        }
    }
}
