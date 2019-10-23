<?php

namespace application\models;
use application\core\Model;

class Main extends Model{

    public $error;

    public function taskValidate($task){
        if(iconv_strlen($task['name']) < 3){
            $this->error = 'Имя должно быть не менне 3 символов';
            return false;
		}elseif(iconv_strlen($task['email']) < 1){
            $this->error = 'Email не должен быть пуст';
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
/*
    public function addTask($task){
        $set = '';
        $params = [
            'id' => '',
            'name' => $task['name'],
            'email' => $task['email'],
            'text' => $task['text'],
            'status' => 0,
        ];
        foreach ($params as $field) {
                $set .= "`" . str_replace("`", "``", $field) . "`";
            }

        $this->db->query('INSERT INTO task VALUES (:id, :name, :email, :text, :status)', $set);

    }
*/
    function addTask($data){
        $data['status'] = 0;
        $keys = array_keys($data);
        $fields = '`' . implode('`,`', $keys) . '`';
        $placeholders = substr(str_repeat('?,', count($keys)), 0, -1);
        $sql = "INSERT INTO task ({$fields}) VALUES ({$placeholders});";
        $stmt = $this->db->query($sql);

        $stmt->execute(array_values($data));
    }

/*
	public function pdoSet($allowed, &$values, $source = array()) {
		  $set = '';
		  $values = array();
		  if (!$source) $source = &$_POST;
		  foreach ($allowed as $field) {
			if (isset($source[$field])) {
			  $set.="`".str_replace("`","``",$field)."`". "=:$field, ";
			  $values[$field] = $source[$field];
			}
		  }
		return substr($set, 0, -2); 
	}
	public function addTask($task){
		$task['status'] = 0;
		$allowed = array("name","email","text","3" => 'status'); // allowed fields
		$sql = "INSERT INTO task SET ".$this->pdoSet($allowed,$values,$task);
		debug($allowed);
        //$stm = $this->db->query($sql);
		//$stm->execute();
        //$stmt = $this->db->prepare($sql);
		//$stmt->execute($values);
	}
*/
    public function taskList(){

       return $this->db->row('SELECT * FROM task ');

    }
}