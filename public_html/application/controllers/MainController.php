<?php



namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;

class MainController extends Controller
{
    public function indexAction(){
        $vars = [
            'list' => $this->model->taskList(),
        ];


        if(!empty($_POST)){
            if(!$this->model->taskValidate($_POST)){
                $this->view->message('error', $this->model->error);
            }
            $this->model->addTask($_POST);
            $this->view->location('/');
        }
        $this->view->render('Главная страница', $vars);
    }
}