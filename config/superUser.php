<?php

require_once __DIR__ . '/../functions/utils.php';
session_start();

// Identifiants administrateur
$_SESSION['superUser_login'] = "NOM UTILISATEUR";
$_SESSION['superUser_password'] = "MOT DE PASSE";
