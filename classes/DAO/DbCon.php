<?php

namespace DAO;

class DbCon
{
    protected function connect()
    {
        try {
            $user = "admin5";
            $pass = "123456";
            $dbcon = new \PDO('mysql:host=localhost;dbname=WineTimeDB;charset=utf8', $user, $pass);
            return $dbcon;
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
