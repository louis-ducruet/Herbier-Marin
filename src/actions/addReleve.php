<?php
include_once "../config.php";
include_once "databaseConnection.php";
$date = filter_input(INPUT_POST, "dateInput");
$lieu = filter_input(INPUT_POST, "lieuInput");
$donnee = filter_input(INPUT_POST, "donneeInput");
if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date) && strlen($lieu) <= 255 && preg_match("/^([0-9]\/){8}[0-9]$/", $donnee)){
    $requette = $pdo->prepare("INSERT INTO releve (date, lieu, donnee) VALUE (:date, :lieu, :donnee)");
    $requette->bindParam(":date", $date);
    $requette->bindParam(":lieu", $lieu);
    $requette->bindParam(":donnee", $donnee);
    $requette->execute();
    header("location: ../../index.php?result=1");
}else{
    header("location: ../../index.php?result=2");
}