<?php

    $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
    $usuario = 'root';
    $senha = '';

    try {
        $conexao = new PDO($dsn, $usuario, $senha );

        $query = '
            select * from tb_usuarios where id = 8
        ';

        $stmt = $conexao->query($query);
        $lista = $stmt->fetch(PDO::FETCH_OBJ);
        echo '<pre>';
        print_r($lista);
        echo '</pre>';

        

    } catch(PDOException $e) {

        echo 'Erro: ' . $e->getCode() . 'Mensagem: ' . $e->getMessage();
        
    } 
