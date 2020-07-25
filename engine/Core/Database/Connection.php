<?php

namespace Engine\Core\Database;
use \PDO;

class Connection
{
    /**
     * @var $link
     */
    private $link;

    /**
     * Connection constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return $this
     */
    private function connect(){
        //$config = require_once 'config.php';
        $config = [
            'host' => 'localhost',
            'dbname' => 'mysql',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8'
        ];
        $dsn = 'mysql:host='.$config['host'].
            ';dbname='.$config['dbname'].
            ';charset='.$config['charset'];
        $this->link = new PDO($dsn, $config['username'], $config['password']);
        return $this;
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function execute($sql){
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    /**
     * @param $sql
     * @return array
     */
    public function query($sql){
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if ($result === false){
            return [];
        }
        return $result;
    }

}