<?php

require_once("../Models/Usuarios.php");

$email = $_POST["email"];
$pass = $_POST["pass"];

if (!empty($email) && !empty($pass)) :
    $userModel = new Usuarios();
    $usuarios = $userModel->getAllUser();

    $userFound = false;

    foreach ($usuarios as $usuario) :
        if ($email === $usuario["email"]):
            $userFound = true;
            if (password_verify($pass, $usuario["senha"])) :
                header("Location: ../Views/Home.php");
                exit();
            else:
                header("Location: ../Views/Login.php?error=userNotAutenticated");
                exit();
            endif;
        endif;
    endforeach;

    if (!$userFound) :
        header("Location: ../Views/Login.php?error=notFoundUser");
        exit();
    endif;
else:
    header("Location: ../Views/Login.php?error=fieldEmpty");
    exit();
endif;
