<?php

include_once("funkcje.php");

include_once("php/User.php");
include_once ("php/Baza.php");
include_once("php/ProfileForm.php");
include_once("php/UserManager.php");

menu();
if ($_SESSION['zalogowany']) {

    $bd = new Baza("127.0.0.1:3307", "root", "", "users");
    $um = new UserManager();
    $pf = new ProfileForm();

    $userId = $_SESSION['userId'] ?? null;
    $status = $_SESSION['status'] ?? null;

    echo '<main>Jeżeli nie zmieniasz niektórych danych wprowadź te same dane w podane pola.</main>';
    echo '<main style="color:white; font-size:150%;"> Twoje dane:' .
    User::getUser($bd, $userId) . '</main>';

    if ($status == 1) {
        echo '<main style="color:white;">Jesteś adminem , oto wszyscy użytkownicy:' . User::getAllUsersFromDB($bd) . '</main>';
    }

    if ($_GET['akcja'] ?? null === 'usun') {

        $um->usunKonto($bd);
        $um->logout($bd);
        header("location: http://localhost/stronkaPHP/index.php");
    }

    if (filter_input(INPUT_POST, 'edytuj', FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
        $sql = $pf->checkUser($userId);
        if ($sql === NULL) {
            echo "<p>Niepoprawne dane.</p>";
        } else {
            $bd->insert($sql);
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=' . $location . '">';
        }
        
    }

    stopka();
} else {
    header("location: http://localhost/stronkaPHP/logowanie.php");
}