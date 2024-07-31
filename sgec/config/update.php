<?php
 require 'config.php';

if (isset($_POST["btn_update"])) {

    $idEspacos = $_POST['idEspacos'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $descricao = $_POST['descricao'];
    $capacidade = $_POST['capacidade'];
    $preco = $_POST['preco'];
    $idCategoria = $_POST['idCategoria'];


    $sql = "UPDATE espacos SET nome = :nome, endereco = :endereco, descricao = :descricao, capacidade = :capacidade, preco = :preco, idCategoria = :idCategoria WHERE idEspacos = :idEspacos";
    $result = $pdo->prepare($sql);
    $result->bindValue(":idEspacos", $idEspacos);
    $result->bindValue(":nome", $nome);
    $result->bindValue(":endereco", $endereco);
    $result->bindValue(":descricao", $descricao);
    $result->bindValue(":capacidade", $capacidade);
    $result->bindValue(":preco", $preco);
    $result->bindValue(":idCategoria", $idCategoria);
    $result->execute();

    header('Location: ../home.php?update=ok');
} else {
    header('Location: ../home.php?error=404');
}
















//     if(!empty($nome) && !empty($id_genero)){
//     require("../../database/config_art.php");
//     $stmt= $conn->prepare('SELECT COUNT(*) FROM genero WHERE nome = :novo_nome AND id_genero != :id_genero');
//     $stmt->bindValue(':novo_nome', $nome);
//     $stmt->bindValue(':id_genero', $id_genero);
//     $stmt->execute();
//     $count = $stmt->fetchColumn();

//     if($count > 0) {
//         header("Location: receberValoresGenErro.php?id=$id_genero&&nome= ");
//     } else {
//         $sql = "UPDATE genero SET nome = :nome WHERE id_genero = :id_genero";
//         $resultado = $conn->prepare($sql);
//         $resultado->bindValue(":nome", $nome);
//         $resultado->bindValue(":id_genero", $id_genero);
//         $resultado->execute();
//         header("Location: ../tabelaGenero.php?atualizado=ok");
//     }

//     } else {
//         header("Location: ./receberValoresGen.php?preencha=vazio&&id=$id_genero&&nome=$nome");
//     }
    
// } else{
//     header("Location: ../tabelaGenero.php?algo=erro");
// }