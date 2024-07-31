<?php
session_start();
require 'config/config.php';

$sql = "SELECT * FROM espacos";
$result = $pdo->prepare($sql);
$result->execute();
$espacos = $result->fetchAll(PDO::FETCH_ASSOC);
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
            <span class="absolute px-3 font-medium text-blue bg-gray-200 border border-gray-500 rounded-3xl left-36">Painel inicial</span>


            <script type="text/javascript">
                function redirectConfig() {
                    window.location.href = 'http://localhost/sgec/configuracao.php';
                }
            </script>
            <div>
                <button onclick="redirectConfig()" class=" w-full hover:scale-105 duration-300"><img id="imgConfig" src="images/preferences.png" alt="imagem settingLines"></button>
            </div>

        </div>
        </div>
        <div>
            <div class="grid grid-cols-2 gap-6 px-5">
                <div class="flex items-center bg-white p-4 rounded-lg shadow-md overflow-hidden h-24 space-x-5 cursor-pointer">
                    <div>
                        <img class="h-16 w-16 rounded-full" src="./Images/git.png" alt="Goto de perfil">
                    </div>
                    <ul>
                        <li class="text-gray-600 font-semibold"><?php echo $_SESSION['nome']; ?></li>
                        <li class="text-gray-400 font-medium">Administrador(a)</li>
                        <li class="text-gray-600 font-medium">SGEC</li>
                        <li>
                            <a href="config/logout.php">Sair da conta</a>

                        </li>
                    </ul>


                </div>


                <div class="  rounded-lg  h-24">

                    <script type="text/javascript">
                        function redirectReport() {
                            window.location.href = 'http://localhost/sgec/relatorio.php';
                        }
                    </script>
                    <div class="w-full h-24">
                        <button onclick="redirectReport()" class="text-white text-xl bg-blue w-full h-full rounded-xl hover:scale-105 duration-300">Ver Relatório</button>
                    </div>


                </div>

                <div class="h-3/6 col-span-2 row-span-2 bg-white p-4 rounded-lg shadow-md overflow-y-auto  w-full relative overflow-x-auto sm:rounded-lg">
                    <?php

                    $sql = $pdo->prepare("SELECT * FROM categoria");
                    $sql->execute();
                    $categorias = $sql->fetchAll(PDO::FETCH_ASSOC);

                    ?>

                    <div class=" flex justify-between items-center mb-4 ">
                        <h1 class="text-2xl font-bold text-blue">Locais</h1>
                        <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center z-50">
                            <div class="flex justify-center items-center h-full w-full">
                                <div class="bg-white rounded-lg p-8 w-full max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-4xl fade-in modal-content">
                                    <div class="mb-4 space-y-3">
                                        <h2 class="text-xl font-bold text-blue">Cadastre um novo local</h2>
                                        <hr>
                                    </div>
                                    <div class="w-full h-full">
                                        <form class="flex flex-col justify-center w-full space-y-3" action="./config/insert.php" method="post" data-parsley-validate>
                                            <div class="flex flex-col justify-center">
                                                <input type="hidden" name="id">
                                                <label for="nome">Nome</label>
                                                <input class="p-2 mt-2 rounded-xl border" type="text" name="nome" required">
                                            </div>
                                            <div class="flex flex-col md:flex-row justify-between items-center">
                                                <div class="flex flex-col w-full md:w-6/12">
                                                    <label for="endereco">Endereço</label>
                                                    <input class="p-2 mt-2 rounded-xl border" type="text" name="endereco" required ">
                                            </div>
                                            <div class=" flex flex-col w-full md:w-6/12 md:ml-2 mt-2 md:mt-0">
                                                    <label for="capacidade">Capacidade</label>
                                                    <input class="p-2 mt-2 rounded-xl border" type="number" name="capacidade" min="1" required">
                                                </div>
                                            </div>
                                            <div class="flex flex-col md:flex-row justify-between items-center">
                                                <div class="flex flex-col w-full md:w-6/12">
                                                    <label for="preco">Preço</label>
                                                    <input class="p-2 mt-2 rounded-xl border" type="text" name="preco" required ">
                                            </div>
                                            <div class=" flex flex-col w-full md:w-6/12 md:ml-2 mt-2 md:mt-0">
                                                    <label for="categoria">Categoria</label>
                                                    <select name="idCategoria" id="idCategoria" class="p-2 mt-2 rounded-xl border" required ">
                                                    <?php foreach ($categorias as $categoria) {
                                                        echo '<option value="' . $categoria['idCategoria'] . '">' . $categoria['nomeCategoria'] . '</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <label for=" descricao">Descrição</label>
                                                        <textarea class="p-2 mt-2 rounded-xl border" name="descricao" id="descricao" required"></textarea>
                                                        <div class="flex justify-end items-center space-x-3">
                                                            <input type="submit" name="btnInsert" class="bg-green text-white px-4 py-2 rounded font-bold">
                                                            <div>
                                                                <button type="button" id="closeModal" class="bg-blue text-white px-4 py-2 rounded font-bold">Fechar</button>
                                                            </div>
                                                        </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="flex justify-center items-center">
                            <button id="openModal" class="bg-blue text-white px-4 py-2 rounded font-bold ">Cadastrar Local</button>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', () => {
                                const openModalBtn = document.getElementById('openModal');
                                const closeModalBtn = document.getElementById('closeModal');
                                const modal = document.getElementById('modal');

                                openModal.addEventListener('click', () => {
                                    modal.classList.remove('hidden');
                                });

                                closeModalBtn.addEventListener('click', () => {
                                    modal.classList.add('hidden');

                                });
                            });
                        </script>

                    </div>

                    <?php
                    if (isset($_GET['delete'])) {
                        // $nome = $_GET['nome'];
                    ?>

                        <div class="bg-red p-4 rounded-lg shadow-md overflow-hidden h-10 justify-center border border-red flex items-center w-full ">
                            <h1 class="font-bold text-xl text-white">Deletado com sucesso</h1>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_GET['sucesso'])) {

                    ?>
                        <div class="bg-green p-4 rounded-lg shadow-md overflow-hidden h-10 justify-center border border-green flex items-center w-full ">
                            <h1 class="font-bold text-xl text-white">produto cadastrado com sucesso</h1>
                        </div>
                    <?php }
                    ?>

                    <?php
                    if (isset($_GET['update'])) {

                    ?>
                        <div class="bg-yellow-500 p-4 rounded-lg shadow-md overflow-hidden h-10 justify-center border border-yellow-500 flex items-center w-full ">
                            <h1 class="font-bold text-xl text-white">produto atualizado com sucesso</h1>
                        </div>
                    <?php }
                    ?>

                    <div class=" mt-4 w-full relative overflow-x-auto shadow-md sm:rounded-lg">
                        <?php
                        $sql = $pdo->prepare("SELECT e.*, c.nomeCategoria 
                          FROM espacos as e
                          INNER JOIN categoria as c ON e.idCategoria = c.idCategoria
                          ORDER BY e.idEspacos ASC");
                        $sql->execute();
                        $espacos = $sql->fetchAll(PDO::FETCH_ASSOC);

                        if (count($espacos) > 0) {

                        ?>
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nome
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Endereço
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Descrição
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Capacidade
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Categoria
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Preço
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Ação
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($espacos as $espaco) {

                                    ?>

                                        <tr class="odd:bg-white">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                <?= $espaco['nome']; ?>
                                            </th>
                                            <td class="px-6 py-4">
                                                <?= $espaco['endereco']; ?>
                                            </td>
                                            <th class="px-6 py-3">
                                                <?= $espaco['descricao']; ?>

                                            </th>
                                            <td class="px-6 py-4">
                                                <?= $espaco['capacidade']; ?>

                                            </td>
                                            <td class="px-6 py-4">
                                                <?= $espaco['nomeCategoria']; ?>

                                            </td>
                                            <td class="px-6 py-4">
                                                <?= $espaco['preco']; ?>

                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">

                                                    <form class="flex flex-col justify-center w-full space-y-3" action="./config/delete.php" method="post">
                                                        <input type="hidden" name="id" value="<?= $espaco['idEspacos'] ?>">
                                                        <input type="hidden" name="nome" value="<?= $espaco['nome'] ?>">
                                                        <input type="submit" name="btnDelete" class="bg-red text-white px-4 py-2 rounded font-bold w-full " value="Excluir">
                                                    </form>

                                                    <form class="flex flex-col justify-center w-full space-y-3" action="update_www.php" method="get">
                                                        <input type="hidden" name="id" value="<?= $espaco['idEspacos'] ?>">
                                                        <input type="hidden" name="nome" value="<?= $espaco['nome'] ?>">
                                                        <input type="submit" name="btnUpdate" class="bg-yellow-500 text-white px-4 py-2 rounded font-bold w-full ml-3" value="Editar">
                                                    </form>

                                                </div>


                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                        } else {
                            echo "<h1>Você não tem nenhum local cadastrado</h1>";
                        } ?>


                    </div>



                </div>


    </section>
    <footer class="footer footer-center p-4 bg-gray-300 text-base-content">
        <aside class="flex items-center justify-center">
            <p class="text-blue">Copyright © 2024 - Todos os direitos reservados pela SGEC</p>
        </aside>
    </footer>


</body>

</html>