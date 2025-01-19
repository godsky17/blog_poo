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
        $pdo = new PDO('mysql:dbname=' . $this->dbname . '; host=' . $this->dbhost . ',' . $this->dbuser . ',' . $this->password . '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
    }

    public function query() {}
}
