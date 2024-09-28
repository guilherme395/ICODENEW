<?php

class Router
{
    private $routes = [];

    public function add($route, $file)
    {
        $this->routes[$route] = $file;
    }

    public function dispatch()
    {
        $route = trim(str_replace("/ICODENEW", "", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)), "/");

        if (array_key_exists($route, $this->routes)) {
            require $this->routes[$route];
        } else {
            http_response_code(404);
            require "Views/Template/Error404.html";
        }
    }

    public function handle500()
    {
        http_response_code(500);
        require "Views/Template/Error500.html";
    }
}

$router = new Router();

$router->add("", "Views/Home.php");
$router->add("usuario/login", "Views/Login.php");
$router->add("usuario/cadastrar", "Views/Cadastro.php");
$router->add("financeiro", "Views/SystemFinance.php");

$router->add("usuario/cadastraUsuario", "Controllers/CadastraUsuario.php");
$router->add("usuario/verificaUsuario", "Controllers/VerificaUsuario.php");

try {
    $router->dispatch();
} catch (Exception $e) {
    $router->handle500();
}
