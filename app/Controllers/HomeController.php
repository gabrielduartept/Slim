<?php

namespace App\Controllers;

//use Slim\Views\Twig as View;

class HomeController extends Controller{

    public function index($request, $response, $args) {
        
       // $this->flash->addMessage('info', 'Test flash message');

       return $this->view->render($response, 'home.twig');
        
    }

}