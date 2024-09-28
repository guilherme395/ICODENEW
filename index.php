<?php

function getRoute()
{
    $baseFolder = '/ICODENEW';
    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    if (strpos($path, $baseFolder) === 0) {
        $path = substr($path, strlen($baseFolder));
    }

    return trim($path, "/");
}

$routes = [
    "" => "Views/Home.php",
    "login" => "Views/Login.php",
    "cadastro" => "Views/Cadastro.php",
    "cadastraUsuario" => "Controllers/CadastraUsuario.php",
    "verificaUsuario" => "Controllers/VerificaUsuario.php",
];

$route = getRoute();

if (array_key_exists($route, $routes)) {
    require $routes[$route];
} else {
    http_response_code(404);
    echo "Página não encontrada!";
}
