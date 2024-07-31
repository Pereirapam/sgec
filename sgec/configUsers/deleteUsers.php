<?php

if(isset($_POST['btnUsersDelete'])){
    require '../config/config.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $sql = "DELETE FROM users WHERE idUsers = :id";
    $result = $pdo->prepare($sql);
    $result->bindValue(":id", $id);
    $result->execute();

    header('Location: ../configuracao.php?delete=ok');
}