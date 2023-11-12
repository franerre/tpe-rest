<?php
    require_once 'config.php';
    require_once 'libs/router.php';

    require_once 'app/controllers/equipos.api.controller.php';
    

    $router = new Router();

    #                 endpoint      verbo     controller           método
    $router->addRoute('equipos',     'GET',    'TaskApiController', 'get'   ); # TaskApiController->get($params)
    $router->addRoute('equipos',     'POST',   'TaskApiController', 'create');
    $router->addRoute('equipos/:ID', 'GET',    'TaskApiController', 'get'   );
    $router->addRoute('equipos/:ID', 'PUT',    'TaskApiController', 'update');
    $router->addRoute('equipos/:ID', 'DELETE', 'TaskApiController', 'delete');
    
    $router->addRoute('user/token', 'GET',    'UserApiController', 'getToken'   ); # UserApiController->getToken()
    
    #               del htaccess resource=(), verbo con el que llamo GET/POST/PUT/etc
    $router->route($_GET['resource']        , $_SERVER['REQUEST_METHOD']);