<?php

class UserManager {

    function loginForm() {
        ?>
        <main style="text-align: center;">
            <form action="logowanie.php" method="post">
                <input type="text" class="inReje" placeholder="Nazwa użytkownika..." name="login" /><br/><br/>
                <input class="inReje" placeholder="Hasło..." name="passwd" type="password" /><br/><br/>
                <input  type="submit" class="inRejeReje" value="Zaloguj" name="zaloguj" /><br/>
            </form>
        </main>
        <?php
    }

    function login($db) {
        $args = ['login' => trim("login"),
            'passwd' => trim("passwd")];
        $dane = filter_input_array(INPUT_POST, $args);
        $login = $dane["login"];
        $passwd = $dane["passwd"];
        $userId = $db->selectUser($login, $passwd, "users");
        if ($userId >= 0) {

            session_start();
            $_SESSION['zalogowany'] = 1;
            $_SESSION['userId'] = $userId;
            $sql = "DELETE from logged_in_users where userId ='$userId'";
            $db->delete($sql);

            if (true) {
                $date = date("Y-m-d H:i:s");
                $sessionId = session_id();

                $sql = "insert into logged_in_users values ('$sessionId','$userId','$date')";

                $db->insert($sql);
            }
            $sql = "SELECT status FROM users where id='$userId'";
            $status = $db->selec($sql);
            $_SESSION['status'] = $status;
        }
        return $userId;
    }

    function logout($db) {
        session_start();
        $userId = $_SESSION['userId'] ?? null;

        $sql = "DELETE from logged_in_users where userId='$userId'";
        $db->delete($sql);

        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 42000, '/');
        }
        unset($_SESSION['zalogowany']);
        unset($_SESSION['userId']);
        session_destroy();
    }

    function usunKonto($bd) {
        session_start();

        $userId = $_SESSION['userId'] ?? null;
        $sql = "DELETE from users where id='$userId'";
        $bd->delete($sql);
    }

}
