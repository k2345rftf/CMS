<?php

namespace Engine\Core\Database;

use PDO;
use Engine\Core\Config\Config;
class Database
{
    private $db;

    public function __construct()
    {
        $this->connection();
    }

    private function connection(){
        $config = Config::file('db_config');

        $dsn = $config['type'].':dbname='.$config['name'].';host = '.$config['host'].';charset = '.$config['charset'];

        $this->db = new PDO($dsn, $config['login'], $config['password'], $config['options']);
    }

    public function read($sql, $params = array()){
        $rez = $this->qurey($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
        return $rez;
    }

    public function query($sql, $params = array()){
        $stmt = $this->db->prepare($sql);
        foreach ($params as $param){
            $stmt->bindValue($param);
        }
        return $stmt->execute();

    }

}