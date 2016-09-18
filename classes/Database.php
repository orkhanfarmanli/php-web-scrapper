<?php

namespace App;
use \PDO;

class Database
{
    private $host;
    private $database;
    private $username;
    private $password;
    public $pdo;

    public function __construct($host, $database, $username, $password)
    {
        $this->host = $host;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {
      try {
          $this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8', $this->username, $this->password);
          } catch (PDOException $e) {
            throw new pdoDbException($e);
          }
    }

    // public function query($sql)
    // {
    //     $pdo = $this->pdo;
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->execute();
    // }


}
