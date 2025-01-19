<?php

namespace App;

use PDO;

class Database
{
    private $dbname;
    private $dbhost;
    private $dbuser;
    private $password;
    private $pdo;

    public function __construct($dbname, $dbhost = 'localhost', $dbuser = 'root', $password = '')
    {
        $this->dbname = $dbname;
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->password = $password;
    }

    private function getPdo()
    {
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname='.$this->dbname.'; host='.$this->dbhost.'', $this->dbuser, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $pdo;
    }

    public function query($statement, $class)
    {
        $req = $this->getPdo()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_CLASS, $class);
        return $datas;
    }

    public function prepare($statement, $attributes, $class, $one = false)
    {
        $req = $this->getPdo()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class);
        if ($one) {
            $datas = $req->fetch();

        }else{

            $datas = $req->fetchAll();
        }  
        return $datas;
    }
}
