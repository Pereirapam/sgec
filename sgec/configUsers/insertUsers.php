<?php
if (isset($_POST['btnInsertUsers'])) {
    require '../config/config.php';
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    $sql = "INSERT INTO users (nome, email, senha) VALUES (:nome, :email, :senha)";
    $result = $pdo->prepare($sql);
    $result->bindValue(":nome", $nome);
    $result->bindValue(":email", $email);
    $result->bindValue(":senha", $senha);
    $result->execute();

    header('Location: ../configuracao.php?sucesso=ok');
} else {
    header('Location: ../configuracao.php?error=404');
}
