<?php

class ProfileForm {

    protected $user;

    function __construct() {
        ?>
        <main style="text-align: center; margin-right: auto; margin-left: auto;">
            <h2><b>Twój profil</b></h2><br/>
            <form action="profil.php" method="post">
                <input type="text" class="inReje" placeholder="Nazwa użytkownika..." name="userName" /><br/><br/>
                <input type="text" class="inReje" placeholder="Imię i nazwisko..." name="fullName" /><br/><br/>
                <input type="text" class="inReje" placeholder="Email..." name="email" /><br/><br/>
                <input class="inReje" placeholder="Hasło..." name="passwd" type="password" /><br/><br/>
                <input type="submit" class="inRejeReje" value="Edytuj" name="edytuj" />
            </form>
            <a href='profil.php?akcja=usun' >Usun Konto</a>
        </main>
        <?php
    }

    function checkUser($id) {
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
            $userName = $_POST['userName'];
            $fullName = $_POST['fullName'];
            $email = $_POST['email'];
            $password = $_POST['passwd'];
            $passwd = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET userName='$userName',fullName='$fullName',email='$email',passwd='$passwd'where id='$id'";
        }
        return $sql;
    }

}
