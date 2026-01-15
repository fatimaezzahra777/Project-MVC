<?php

class Database
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo === null) {

            $host = "localhost";
            $port = "5432";
            $db   = "coach_sportif";
            $user = "coach_app";
            $pass = "Mfafyrca@4554";

            $dsn = "pgsql:host=$host;port=$port;dbname=$db";

            try {
                self::$pdo = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (PDOException $e) {
                die("Erreur connexion DB : " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
