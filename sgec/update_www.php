<?php
session_start();
require 'config/config.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM espacos WHERE idEspacos = :id";
    $result = $pdo->prepare($sql);
    $result->bindParam(':id', $id);
    $result->execute();
    $espacos = $result->fetch(PDO::FETCH_ASSOC);
}

?>





<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGEC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../node_modules/parsleyjs/src/parsley.css">
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/parsleyjs/dist/parsley.min.js"></script>
    <script src="../node_modules/parsleyjs/dist/i18n/pt-br.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        blue: '#002D74',
                        clifford: '#da373d ',
                        darkGreen: '#245501',
                        lightGreen: '#aad576',
                        red: '#bf0603',
                        lightRed: '#ffccd5',
                        green: '#55a630',
                    }
                }
            }
        }
    </script>
    <style>
        #imgConfig {
            height: 23px;
            width: 23px;
        }

        #imgTresPontos {
            height: 30px;
            width: 30px;
        }

        .imgEstrela {
            height: 25px;
            width: 25px;
        }
    </style>
</head>




<body class="bg-gray-200 text-gray-600">
    <header class="bg-gray-200 container max-w-full px-5 mx-auto h-20 flex items-center justify-between">
        <div class="text-2xl font-bold pr-2 text-blue">
            SGEC
        </div>
        <div class="bg-gray-100 container max-w-full mx-auto flex items-center px-5 rounded-3xl">

            <ul class="flex items-center ml-auto space-x-8 font-semibold justify-start text-blue">

                <li>
                    <a class="no-underline hover:underline underline-offset-2" href="configuracao.php">Configuração</a>
                </li>

            </ul>
            <div>
                <img class="p-1.5 h-10 w-10 rounded-full ml-6" src="./Images/git.png" alt="perfil">
            </div>

        </div>
    </header>




    <section>

        <div class="inline-flex items-center w-full px-5">
            <hr class="w-full h-px my-8 bg-blue border-0 ">
            <span class="absolute px-3 font-medium text-blue bg-gray-200 border border-gray-500 rounded-3xl left-36">Atualizar</span>


            <script type="text/javascript">
                function redirectConfig() {
                    window.location.href = 'http://localhost/sgec/configuracao.php';
                }
            </script>
            <div>
                <button onclick="redirectConfig()" class=" w-full hover:scale-105 duration-300"><img id="imgConfig" src="images/preferences.png" alt="imagem settingLines"></button>
            </div>

        </div>


        <div class="flex justify-center items-center">
            <div class="bg-white px-4 rounded-lg shadow-md h-4/6 w-10/12 relative overflow-x-auto sm:rounded-lg">

                <div class=" flex justify-between items-center mb-6 mt-4">
                    <h1 class="text-2xl font-bold text-blue">Atualize o local tatata</h1>

                </div>

                <div class="w-full h-full">
                    <form class="flex flex-col justify-center w-full space-y-3" action="./config/update.php" method="post" data-parsley-validate>
                        <div class="flex flex-col justify-center">
                            <input type="hidden" name="idEspacos" value="<?php echo $espacos['idEspacos']; ?>">

                            <label for="nome">Nome</label>

                            <input class="p-2 mt-2 rounded-xl border" type="text" name="nome" value="<?php echo $espacos['nome']; ?>" required">




                        </div>

                        <div class="flex flex-col md:flex-row justify-between items-center">
                            <div class="flex flex-col w-full md:w-6/12">
                                <label for="endereco">Endereço</label>
                                <input class="p-2 mt-2 rounded-xl border" type="text" name="endereco" value="<?php echo $espacos['endereco']; ?>" required ">
                                            </div>
                                            <div class=" flex flex-col w-full md:w-6/12 md:ml-2 mt-2 md:mt-0">
                                <label for="capacidade">Capacidade</label>
                                <input class="p-2 mt-2 rounded-xl border" type="number" name="capacidade" min="1" value="<?php echo $espacos['capacidade']; ?>" required">
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row justify-between items-center">
                            <div class="flex flex-col w-full md:w-6/12">
                                <label for="preco">Preço</label>
                                <input class="p-2 mt-2 rounded-xl border" type="text" name="preco" value="<?php echo $espacos['preco']; ?>" required ">
                                            </div>
                                            <div class=" flex flex-col w-full md:w-6/12 md:ml-2 mt-2 md:mt-0">
                                <label for="categoria">Categoria</label>
                                <?php

                                $sql = $pdo->prepare("SELECT * FROM categoria");
                                $sql->execute();
                                $categorias = $sql->fetchAll(PDO::FETCH_ASSOC);

                                ?>
                                <select name="idCategoria" id="idCategoria" class="p-2 mt-2 rounded-xl border" required ">
                                                    <?php foreach ($categorias as $categoria) {
                                                        echo '<option value="' . $categoria['idCategoria'] . '">' . $categoria['nomeCategoria'] . '</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <label for=" descricao">Descrição</label>
                                    <input class="p-2 mt-2 rounded-xl border" name="descricao" id="descricao" value="<?php echo $espacos['descricao']; ?>" required">
                                    <div class="flex justify-end items-center space-x-3">
                                        <input type="submit" name="btn_update" class="bg-green text-white px-4 py-2 rounded font-bold" value="Atualizar">

                                    </div>
                    </form>
                </div>

                <div class=" mt-4 w-full relative shadow-md sm:rounded-lg flex">
                </div>
            </div>
        </div>
    </section>
</body>

</html>