<?php

class Coach
{
    private int $idCoach;
    private int $idUser;
    private int $experience;
    private string $discipline;
    private string $biographie;
    private string $photo;

    public function __construct(
        int $idCoach,
        int $idUser,
        int $experience,
        string $discipline,
        string $biographie,
        string $photo
    ) {
        $this->idCoach = $idCoach;
        $this->idUser = $idUser;
        $this->experience = $experience;
        $this->discipline = $discipline;
        $this->biographie = $biographie;
        $this->photo = $photo;
    }

    public function getIdCoach(): int
    {
        return $this->idCoach;
    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function getDiscipline(): string
    {
        return $this->discipline;
    }

    public function getBiographie(): string
    {
        return $this->biographie;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }
}
