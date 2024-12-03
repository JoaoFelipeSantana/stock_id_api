<?php
    require_once __DIR__.'/../vendor/autoload.php';

    use src\routes\Routes;
    use src\controllers\ProdutoController;

    $routes = new Routes();

    header("Access-Control-Allow-Origin: http://127.0.0.1:5501");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    // Definindo as rotas
    $routes->add("POST", "/produto", [new ProdutoController(), 'criar']);
    $routes->add("GET", "/produto", [new ProdutoController(), 'selecionarTudo']); // get all
    $routes->add("GET", "/produto/{id}", [new ProdutoController(), 'selecionarUm']); // get one
    $routes->add("PUT", "/produto", [new ProdutoController(), 'editar']);
    $routes->add("DELETE", "/produto/{id}", [new ProdutoController(), 'deletar']);


    $routes->handleResquest();
?>