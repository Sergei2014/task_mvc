<?php
namespace application\lib;

use PDO;

class Db
{
    protected $db;

    public function __construct()
    {
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $config = require 'application/config/db.php';
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].'', $config['user'], $config['password'], $opt);
    }

    public function query($sql){
        $stmt = $this->db->prepare($sql);

        return $stmt;
    }


    public function query2($sql, $params=[]){
        $stmt = $this->db->prepare($sql);

        if(!empty($params)){
            foreach ($params as $key => $value){
                switch (true) {
                    case is_bool($value):
                        $var_type = PDO::PARAM_BOOL;
                        break;
                    case is_int($value):
                        $var_type = PDO::PARAM_INT;
                        break;
                    case is_null($value):
                        $var_type = PDO::PARAM_NULL;
                        break;
                    default:
                        $var_type = PDO::PARAM_STR;
                }
                $stmt->bindValue(':'.$key, $value, $var_type);
            }
        }
        $stmt->execute();
        return $stmt;
    }


    public function row($sql, $params=[]){
        $result = $this->query2($sql, $params);
       // $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params=[]){
        $result = $this->query2($sql, $params);
       // $result->execute();
        return $result->fetchColumn();
    }

    public function lastInsertId() {
        return $this->db->lastInsertId();
    }
}