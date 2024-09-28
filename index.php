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
            echo "Página não encontrada!";
        }
    }
}

<<<<<<< HEAD
$routes = [
    "" => "Views/Home.php",
    
    "login" => "Views/Login.php",
    "cadastro" => "Views/Cadastro.php",
    "cadastraUsuario" => "Controllers/CadastraUsuario.php",
    "verificaUsuario" => "Controllers/VerificaUsuario.php",
];
=======
$router = new Router();
$router->add("", "Views/Home.php");
$router->add("usuario/login", "Views/Login.php");
$router->add("usuario/cadastrar", "Views/Cadastro.php");
$router->add("usuario/cadastraUsuario", "Controllers/CadastraUsuario.php");
$router->add("usuario/verificaUsuario", "Controllers/VerificaUsuario.php");
>>>>>>> 4f13060b663963f3905f99d6a966c97f1200fe15

$router->dispatch();
