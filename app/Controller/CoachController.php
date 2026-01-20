<?php

require_once __DIR__ . '/../../config/database.php';

class CoachController
{
    private PDO $db;
    private Coach $coachModel;
    private Seance $seanceModel;
    private Reservation $reservationModel;

    public function __construct()
    {
        $this->db = Database::getConnection();
        $this->coachModel = new Coach($this->db);
        $this->seanceModel = new Seance($this->db);
        $this->reservationModel = new Reservation($this->db);
    }

    private function authCoach()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'coach') {
            header('Location: /login');
            exit;
        }
    }

    public function dashboard()
    {
        $this->authCoach();
        require __DIR__ . '/../View/coach/dashboard.php';
    }

    public function profil()
    {
        $this->authCoach();
        $coach = $this->coachModel->findByUserId($_SESSION['user']['id']);
        $coachId = $coach['id_coach'];
        require __DIR__ . '/../View/coach/profile_c.php';
    }

    public function seances()
    {
        $this->authCoach();
        $coachId = $_SESSION['user']['id'];
        $seances = $this->seanceModel->getByCoachId($coachId); 
        require __DIR__ . '/../View/coach/seance.php';
    }

    public function addSeance()
    {
        $this->authCoach();
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $jour    = $_POST['jour'] ?? null;
            $heure_d = $_POST['heure_d'] ?? null;
            $heure_f = $_POST['heure_f'] ?? null;

            if ($jour && $heure_d && $heure_f) {
                $coach = $this->coachModel->findByUserId($_SESSION['user']['id']);
                if ($coach) {
                    $coachId = $coach['id_coach']; // ID réel dans table coach
                    $this->seanceModel->create($coachId, $jour, $heure_d, $heure_f);
                    header('Location: /coach/seance');
                    exit;
                } else {
                    $error = "Profil coach introuvable. Veuillez contacter l'administrateur.";
                }
            } else {
                $error = "Veuillez remplir tous les champs";
            }
        }

        require __DIR__ . '/../View/coach/add_seance.php';
    }




    public function deleteSeance($id_dispo)
    {
        $this->authCoach();
        $coachId = $_SESSION['user']['id'];
        $this->seanceModel->delete($id_dispo, $coachId); 
        header('Location: /coach/seance');
        exit;
    }

    public function reservations()
    {
        $this->authCoach();
        $coachId = $_SESSION['user']['id'];
        $reservations = $this->reservationModel->getByCoachId($coachId); 
        require __DIR__ . '/../View/coach/reservation.php';
    }

    public function handleReservation($id_reserv, $action)
    {
        $this->authCoach();

        if (in_array($action, ['accept', 'reject'])) {
            $this->reservationModel->updateStatus($id_reserv, $action); 
        }

        header('Location: /coach/reservation');
        exit;
    }
}
