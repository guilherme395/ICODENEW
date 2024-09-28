<?php

require_once("../Models/Usuarios.php");

$name = $_POST["nome"];
$email = $_POST["email"];
$pass = $_POST["senha"];

if (!empty($name) && !empty($email) && !empty($pass)) :
    $userModel = new Usuarios();

    $senhaCriptografada = password_hash($pass, PASSWORD_DEFAULT);
    $insertUser = $userModel->insertUser($name, $email, $senhaCriptografada);

    if (is_numeric($insertUser) && $insertUser > 0) :
        header("Location: ../Views/Login.php");
        exit();
    else:
        header("Location: ../Views/Cadastro.php?error=InternalServerError");
        exit();
    endif;
else:
    header("Location: ../Views/Cadastro.php?error=fieldEmpty");
    exit();
endif;
