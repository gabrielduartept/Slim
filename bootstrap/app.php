<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
    ]
]);

/*
// route para testar Slim se funciona
$app->get('/', function ($request, $response){

    return 'HOME';

});

*/

$container = $app->getContainer();

$container['view'] = function ($container){
    
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => false,
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(

        $container->router,
        $container->request->getUri()
    ));
/*
        $view->getEnvironment()->addGlobal('auth', [
        'check' => $container->auth->check(),
        'user' => $container->auth->user(),
    ]);

    $view->getEnvironment()->addGlobal('flash', $container->flash);
*/
    return $view;
};

require __DIR__ . '/../app/routes.php';
