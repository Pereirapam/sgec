<?php 
require '../config/config.php';

if (isset($_POST['btn_update_users'])) {

    $idUsers = $_POST['idUsers'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "UPDATE users SET nome = :nome, senha = :senha, email = :email WHERE idUsers = :idUsers";
    $result = $pdo->prepare($sql);
    $result->bindValue(":nome", $nome);  
    $result->bindValue(":email", $email);  
    $result->bindValue(":senha", $senha);
    $result->bindValue(":idUsers", $idUsers); 
    $result->execute();

    header('Location: ../configuracao.php?update=ok');
    exit();

}
