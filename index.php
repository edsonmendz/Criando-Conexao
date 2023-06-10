<?php

    if(!empty($_POST['usuario']) && !empty($_POST['senha']) ) {
        $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
        $usuario = 'root';
        $senha = '';
    

    

        try {
            $conexao = new PDO($dsn, $usuario, $senha );

            $query = "select * from tb_usuarios where ";
            $query .= " email = :usuario";
            $query .= " AND senha = :senha";

            $stmt = $conexao->prepare($query);

            $stmt->bindValue(':usuario', $_POST['usuario']);
            $stmt->bindValue(':senha', $_POST['senha']);

            $stmt->execute();

            $usuario = $stmt->fetch();

            echo '<pre>';
            print_r($usuario);
            echo '</pre>';

            //echo $query;

            // $stmt = $conexao->query($query);
            // $usuario = $stmt->fetch();
            // echo'<hr>';
            
           
        
            // $query = '
            //     select * from tb_usuarios
            // ';

            // //$stmt = $conexao->query($query);

            // foreach($conexao->query($query) as $key => $value){
            //     print_r($value[1]);
            //     echo '<hr>';
            // }


            //$lista = $stmt->fetchAll(PDO::FETCH_OBJ);

            //echo '<pre>';
            //print_r($lista);
            //echo '</pre>';

            
            // foreach($lista as $key => $value) {
            //     echo($value->nome);
            //     echo '<hr>';
            // }
        
        } catch(PDOException $e) {

            echo 'Erro: ' . $e->getCode() . 'Mensagem: ' . $e->getMessage();
            
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>    
    <form method="post" action="index.php">
        <input type="text" placeholder="Usuário" name="usuario" />
        <br>
        <input type="password" placeholder="Senha" name="senha" />
        <br>
        <button type="submit">Entrar</button>
    </from>
</body>
</html>
