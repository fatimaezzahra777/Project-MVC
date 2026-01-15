<?php
require_once "../config/database.php";

$db = Database::getConnection();
echo "Connexion PostgreSQL réussie ✅";
