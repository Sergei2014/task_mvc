<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{
    public function loginAction(){
        if(!empty($_POST)){
            if(!$this->model->loginValidate($_POST)){
                $this->view->message('error', $this->model->error);
            }
            //$this->view->message('success', 'Ok');
            $this->view->location('/admin/index');
        }
        $this->view->render('Вход');
    }

    public function indexAction(){
        $result = $this->model->getTask();
        $vars = [
            'task' => $result,
        ];
        $this->view->render('Страница администратора', $vars);
    }

    public function editAction(){
        if(!$this->model->isTask($this->route['id'])){
            $this->view->errorCode(404);
        }
        if(!empty($_POST)){
            if(!$this->model->taskValidate($_POST, 'edit')){
                $this->view->message('error', $this->model->error);
            }
            $this->model->taskEdit($_POST, $this->route['id']);
            $this->view->location('/admin/index');
        }
        $vars = [
            'data' => $this->model->taskData($this->route['id'])[0],
        ];
        $this->view->render('Страница редактирования', $vars);
    }

}