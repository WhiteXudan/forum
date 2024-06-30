<?php

try {
    //code...
    $connexion = new PDO("mysql:host=localhost;dbname=forum;charset=utf8;","root","",);
} catch (Exception $e) {
    die("Erreur : ". $e->getMessage());
}