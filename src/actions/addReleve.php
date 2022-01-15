<?php
include_once "../config.php";
include_once "databaseConnection.php";
# Récupération du token de validation
session_start();
$token = filter_input(INPUT_POST, "token");
# Récupération des données transmise par le POST
$date = filter_input(INPUT_POST, "dateInput");
$lieu = filter_input(INPUT_POST, "lieuInput");
$donnee = filter_input(INPUT_POST, "donneeInput");
# Vérification de la validate des données transmise
if ($_SESSION["token"]==$token && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date) && strlen($lieu) <= 255 && preg_match("/^([0-9]\/){8}[0-9]$/", $donnee)){
    # Ajout dans la base de données
    $requette = $pdo->prepare("INSERT INTO releve (date, lieu, donnee) VALUE (:date, :lieu, :donnee)");
    $requette->bindParam(":date", $date);
    $requette->bindParam(":lieu", $lieu);
    $requette->bindParam(":donnee", $donnee);
    $requette->execute();
    # Retour sur la page d'accueil
    header("location: ../../index.php?result=1");
}else{
    header("location: ../../index.php?result=2");
}