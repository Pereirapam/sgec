<?php
if (isset($_GET['btnInsert'])) {
    require 'config.php';
    $nome = $_GET['nome'];
    $endereco = $_GET['endereco'];
    $descricao = $_GET['descricao'];
    $capacidade = $_GET['capacidade'];
    $preco = $_GET['preco'];
    $idCategoria = $_GET['idCategoria'];


    $sql = "INSERT INTO espacos (nome, endereco, descricao, capacidade, preco, idCategoria) VALUES (:nome, :endereco, :descricao, :capacidade, :preco, :idCategoria)";
    $result = $pdo->prepare($sql);
    $result->bindValue(":nome", $nome);
    $result->bindValue(":endereco", $endereco);
    $result->bindValue(":descricao", $descricao);
    $result->bindValue(":capacidade", $capacidade);
    $result->bindValue(":preco", $preco);
    $result->bindValue(":idCategoria", $idCategoria);
    $result->execute();

    header('Location: ../home.php?sucesso=ok');
} else {
    header('Location: ../home.php?error=404');
}
