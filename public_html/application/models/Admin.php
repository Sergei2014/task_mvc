<?php

namespace application\models;
use application\core\Model;

class Admin extends Model{

    public $error;

        public function getTask(){

            $result = $this->db->row('SELECT * FROM task');

            return $result;
        }

    public function loginValidate($task){
        $config = require 'application/config/admin.php';
        //$result = $this->db->row('SELECT * FROM admin');
        if(iconv_strlen($task['login']) < 1){
            $this->error = 'Логин не должен быть пустым';
            return false;
        }elseif (iconv_strlen($task['password']) < 3){
            $this->error = 'Пароль не должен быть пустым';
            return false;
        } elseif ($task['login'] <> $config['login'] or $task['password'] <> $config['password']){
           $this->error = 'Логин или пароль не верны';
           return false;
       }
        return true;
    }

    public function taskValidate($task){
        if(iconv_strlen($task['name']) < 3){
            $this->error = 'Имя должно быть не менне 3 символов';
            return false;
        }elseif(!filter_var($task['email'], FILTER_VALIDATE_EMAIL)){
            $this->error = 'Email введен не верно';
            return false;
        }elseif(iconv_strlen($task['text']) < 10){
            $this->error = 'Текст задачи должно быть не менне 10 символов';
            return false;
        }
        return true;
    }

    public function isTask($id){
        $params =[
            'id' => $id,
        ];
        return $this->db->column('SELECT id FROM task WHERE id = :id', $params);
    }

    public function taskData($id){
        $params =[
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM task WHERE id = :id', $params);
    }

    public function taskEdit($task, $id){
        $params = [
            'id' => $id,
            'name' => $task['name'],
            'email' => $task['email'],
            'text' => $task['text'],
            'status' => isset($task['status']) ? 1 : 0,
        ];
        $this->db->query2('UPDATE task SET name = :name, email = :email, text = :text, status = :status WHERE id = :id', $params);

    }
/*
    function taskEdit($data, $key, $val){
        if(!$key || !$val) return false;
        $placeholders = array();
        foreach(array_keys($data) as $k) $placeholders[] = "`{$k}` =?";
        $placeholders = implode(', ', $placeholders);
        $data = array_values($data);
        array_push($data,$val);
        $sql = "UPDATE task SET {$placeholders} WHERE `{$key}` =?;";
        $stmt = $this->modx->prepare($sql);
        $stmt->execute(array_values($data));
    }
*/
}