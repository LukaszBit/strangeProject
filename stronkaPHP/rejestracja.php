<?php

include_once("funkcje.php");
include_once("php/User.php");
include_once ("php/Baza.php");
include_once("php/RegistrationForm.php");

menu();

$bd = new Baza("127.0.0.1:3307", "root", "", "users");
$rf = new RegistrationForm();

stopka();

if (filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {

    $sql = $rf->czyIstnieje();
    $istnieje = $bd->sprIstnienie($sql);

    if ($istnieje != 0) {
        echo'<p>Taki użytkownik istnieje.</p>';
    } else {
        $user = $rf->checkUser();
        if ($user === NULL) {
            echo "<p>Niepoprawne dane rejestracji.</p>";
        } else {
            $user->saveDB($bd);
            header("location: http://localhost/stronkaPHP/logowanie.php");
        }
    }
}
