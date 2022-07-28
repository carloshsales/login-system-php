<?php

    //MODO LOCAL (TESTES) PRODUÇÃO (DEPLOY)
    $modo = 'local';

    switch($modo){
        case 'local':
            $servidor = 'localhost';
            $usuario = 'root';
            $senha = '';
            $banco = 'login-page';
                break;

        case 'producao':
            $servidor = '';
            $usuario = '';
            $senha = '';
            $banco = 'login-page';
                break;

        default:
            exit();
    }


    try{
        $pdo = new PDO("mysql:host=$servidor; dbname=$banco", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Error: Falha ao se conectar com o banco! ";
    }

?>