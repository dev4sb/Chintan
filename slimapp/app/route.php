<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/home', function (Request $request, Response $response, array $args) {
   
    $data = array(
    "main_heading"=>"Welcome to Slim 3",
    "sub_heading" => "In this tutorial we are going to learn how to install webpack to the slim 3 framework "
    );
    return $this->view->render($response, 'home',$data);
   
});

$app->get('/about',function(Request $request, Response $response, array $args)
{

$data = array(
    "main_heading"=>"About Us",
    "sub_heading" => "In this tutorial we are going to learn slim 3 framework installing webpack"
    );

    return $this->view->render($response, 'about',$data);
});

$app->get('/index', function(Request $req, Response $res){
    return $this->view->render($res, 'index');
});