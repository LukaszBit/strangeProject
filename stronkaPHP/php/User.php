<?php

class User {

    const STATUS_USER = 0;
    const STATUS_ADMIN = 1;

    protected $userName;
    protected $passwd;
    protected $fullName;
    protected $email;
    protected $date;
    protected $status;

    function __construct($userName, $passwd, $fullName, $email) {
        $this->userName = $userName;
        $this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
        $this->fullName = $fullName;
        $this->email = $email;
        $this->status = User::STATUS_USER;
        $this->date = date('Y-m-d');
    }

    function toArray() {
        $arr = [
            "userName" => $this->userName,
            "fullName" => $this->fullName,
            "passwd" => $this->passwd,
            "email" => $this->email,
            "date" => $this->date,
            "status" => $this->status
        ];
        return $arr;
    }

    function saveDB($db) {
        $sql = "INSERT INTO users VALUES ('','$this->userName','$this->fullName','$this->email','$this->passwd','$this->status','$this->date')";
        $db->insert($sql);
    }

    public static function getAllUsersFromDB($db) {
        return $db->select("select id, userName, fullName, email from users",
                        array("id", "userName", "fullName", "email"));
    }

    public static function getUser($db, $id) {
        return $db->select("select id, userName, fullName, email, date from users where id='$id'",
                        array("id", "userName", "fullName", "email", "date"));
    }

}
