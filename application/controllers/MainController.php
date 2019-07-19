<?php

    namespace application\controllers;
    
    use application\core\Controller;
    use application\lib\Db;

    class MainController extends Controller
    {
        public function indexAction()
        {
            $res = $this->model->getNews();
            $vars = [
                'news' => $res,
            ];
            //debug($res);
            $this->view->render('Main Page', $vars);
        }
    }