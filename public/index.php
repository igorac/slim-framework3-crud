<?php


require dirname(__DIR__) . "/bootstrap.php";

ini_set('xdebug.overload_var_dump', 1);

$app->get('/', 'App\controllers\HomeController:index');
$app->get('/cadastro', 'App\controllers\CadastroController:create');
$app->post('/cadastro/store', 'App\controllers\CadastroController:store');
$app->get('/user/edit/{id}', 'App\controllers\UserController:edit');
$app->put('/user/update/{id}', 'App\controllers\UserController:update');
$app->delete('/user/delete/{id}', 'App\controllers\UserController:delete');

$app->run();