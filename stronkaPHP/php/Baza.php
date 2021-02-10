<?php

class Baza {

    private $mysqli;

    public function __construct($serwer, $user, $pass, $baza) {
        $this->mysqli = new mysqli($serwer, $user, $pass, $baza);
        if ($this->mysqli->connect_errno) {
            printf("Nie udało sie połączenie z serwerem: %s\n",
                    $this->mysqli->connect_error);
            exit();
        }
    }

    function __destruct() {
        $this->mysqli->close();
    }

    public function select($sql, $pola) {

        $tresc = "";
        if ($result = $this->mysqli->query($sql)) {
            $ilepol = count($pola);
            $ile = $result->num_rows;
            $tresc .= "<table><tbody>";
            while ($row = $result->fetch_object()) {
                $tresc .= "<tr>";
                for ($i = 0; $i < $ilepol; $i++) {
                    $p = $pola[$i];
                    $tresc .= "<td>" . $row->$p . "</td>";
                }
                $tresc .= "</tr>";
            }
            $tresc .= "</table></tbody>";
            $result->close();
        }
        return $tresc;
    }

    public function insert($sql) {
        if ($result = $this->mysqli->query($sql))
            return true;
        else
            return false;
    }

    public function delete($sql) {
        if ($result = $this->mysqli->query($sql))
            return true;
        else
            return false;
    }

    public function selec($sql) {
        if ($result = $this->mysqli->query($sql)) {
            $ile = $result->num_rows;
            if ($ile == 1) {
                $row = $result->fetch_object();
                $status = $row->status;
                return $status;
            }
        } else
            return false;
    }

    public function sprIstnienie($sql) {
        if ($result = $this->mysqli->query($sql)) {
            $ile = $result->num_rows;
            return $ile;
        } else
            return -1;
    }

    public function selectUser($login, $passwd, $tabela) {
        $id = -1;
        $sql = "SELECT * FROM $tabela WHERE userName='$login'";
        if ($result = $this->mysqli->query($sql)) {
            $ile = $result->num_rows;
            if ($ile == 1) {
                $row = $result->fetch_object();
                $hash = $row->passwd;
                if (password_verify($passwd, $hash)) {
                    $id = $row->id;
                }
            }
        }return $id;
    }

    public function selectProduct() {
        $sql = "SELECT * FROM produkty";
        $result = $this->mysqli->query($sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

}
