<?php
try{
    $pdo = new PDO("mysql:host=".Config::SERVER.";dbname=".Config::DB, Config::USER, Config::PSW);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo $e;
    die("
        <h1>Site momentanément indisponible</h1>
        <p>Une erreur de connexion à la base de donnée bloque le chargement du site web.</p>
        ");
}