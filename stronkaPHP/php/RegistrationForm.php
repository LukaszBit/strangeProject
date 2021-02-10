<?php

class RegistrationForm {

    protected $user;

    function __construct() {
        ?>
        <main style="text-align: center; margin-right: auto; margin-left: auto;">
            <form action="rejestracja.php" method="post">
                <input type="text" class="inReje" placeholder="Nazwa użytkownika..." name="userName" required="required" /><br/><br/>
                <input type="text" class="inReje" placeholder="Imię i nazwisko..." name="fullName" required="required"/><br/><br/>
                <input type="email" class="inReje" placeholder="Email..." name="email" required="required"/><br/><br/>
                <input class="inReje" placeholder="Hasło..." name="passwd" type="password" required="required"/><br/><br/>
                <input  type="submit" class="inRejeReje" value="Rejestruj" name="submit" />
            </form>
        </main>
        <?php
    }

    function czyIstnieje() {
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $sql = "SELECT userName FROM users WHERE userName='$userName' or email='$email'";
        return $sql;
    }

    function checkUser() {

        $args = [
            'userName' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9A-ZŁa-ząęłńśćźżó_-]{2,25}$/']
            ],
            'fullName' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => "/^[A-ZŁ ,.'-]+$/i"]],
            'passwd' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => "/.{6,25}/"]],
            'email' => FILTER_VALIDATE_EMAIL,
        ];

        $dane = filter_input_array(INPUT_POST, $args);

        $errors = "";
        foreach ($dane as $key => $val) {
            if ($val === false or $val === NULL) {
                $errors .= $key . " ";
            }
        }
        if ($errors === "") {

            $this->user = new User($dane['userName'], $dane['passwd'], $dane['fullName'],
                    $dane['email']);
        } else {
            echo '<p>Błędne dane:$errors</p>';
            $this->user = NULL;
        }
        return $this->user;
    }

}
