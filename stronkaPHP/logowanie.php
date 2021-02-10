<?php

include_once("funkcje.php");
include_once("php/User.php");
include_once ("php/Baza.php");
include_once("php/UserManager.php");

menu();

$bd = new Baza("127.0.0.1:3307", "root", "", "users");
$um = new UserManager();

stopka();

if ($_GET['akcja'] ?? null === 'wyloguj') {
    $um->logout($bd);
    header("location: http://localhost/stronkaPHP/index.php");
}

if (filter_input(INPUT_POST, "zaloguj")) {
    $userId = $um->login($bd);
    if ($userId > 0) {
        header("location: http://localhost/stronkaPHP/profil.php");
    } else {
        echo '<main style="text-align: center;"><p>Błędna nazwa użytkownika lub hasło</p></main>';
        $um->loginForm();
    }
} else {
    $um->loginForm();
}
