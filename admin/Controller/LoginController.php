<?php


namespace Admin\Controller;


class LoginController extends AdminController
{

    public function index(){

        $this->view->render('login');
    }
}