<?php
session_start();
require 'config/config.php';

if (!isset($_SESSION['idUsers'])) {
    header('Location: login/login.php');
    exit();
}


$sql = "SELECT * FROM users";
$result = $pdo->prepare($sql);
$result->execute();
$users = $result->fetchAll(PDO::FETCH_ASSOC);

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


        <!-- <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 space-y-8"> -->
        <div class="flex justify-center items-center">

            <div class="bg-white px-4 rounded-lg shadow-md h-4/6 w-10/12 relative overflow-x-auto sm:rounded-lg">

                <div class=" flex justify-between items-center">


                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-black">Listagem de adminitradores</h1>
                    <div id="modalUsers" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center z-50">
                        <div class="flex justify-center items-center h-full w-full">
                            <div class="bg-white rounded-lg p-8 w-full max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-4xl fade-in modal-content">
                                <div class="mb-4 space-y-3">
                                    <h2 class="text-xl font-bold text-blue">Cadastre um novo(a) administrador(a)</h2>
                                    <hr>
                                </div>
                                <div class="w-full h-full">
                                    <form class="flex flex-col justify-center w-full space-y-3" action="./configUsers/insertUsers.php" method="post" data-parsley-validate>
                                        <div class="flex flex-col justify-center">
                                            <input type="hidden" name="id">
                                            <label for="nome">Nome</label>
                                            <input class="p-2 mt-2 rounded-xl border" type="text" name="nome" required>
                                        </div>
                                        <div class="flex flex-col md:flex-row justify-between items-center">
                                            <div class="flex flex-col w-full md:w-6/12">
                                                <label for="email">Email</label>
                                                <input class="p-2 mt-2 rounded-xl border" type="email" name="email" required>
                                            </div>
                                            <div class="flex flex-col w-full md:w-6/12 md:ml-2 mt-2 md:mt-0">
                                                <label for="senha">Senha</label>
                                                <input class="p-2 mt-2 rounded-xl border" type="password" name="senha" min="1" required>
                                            </div>
                                        </div>
                                        <div class="flex justify-end items-center space-x-3">
                                            <input type="submit" name="btnInsertUsers" class="bg-green text-white px-4 py-2 rounded font-bold value">
                                            <div>
                                                <button type="button" id="closeModalUsers" class="bg-blue text-white px-4 py-2 rounded font-bold">Fechar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center items-center mt-3">
                        <button id="openModalUsers" class="bg-blue text-white px-4 py-2 rounded font-bold">Cadastrar Local</button>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const openModalUsersBtn = document.getElementById('openModalUsers');
                            const closeModalUsersBtn = document.getElementById('closeModalUsers');
                            const modalUsers = document.getElementById('modalUsers');

                            openModalUsersBtn.addEventListener('click', () => {
                                modalUsers.classList.remove('hidden');
                            });

                            closeModalUsersBtn.addEventListener('click', () => {
                                modalUsers.classList.add('hidden');
                            });
                        });
                    </script>

                </div>
                <div class=" mt-4 w-auto relative shadow-md sm:rounded-lg flex flex-col">

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
                        // $nome = $_GET['nome'];
                    ?>

                        <div class="bg-green p-4 rounded-lg shadow-md overflow-hidden h-10 justify-center border border-green flex items-center w-full ">
                            <h1 class="font-bold text-xl text-white">Cadastrado com sucesso</h1>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_GET['update'])) {
                        // $nome = $_GET['nome'];
                    ?>

                        <div class="bg-yellow-500 p-4 rounded-lg shadow-md overflow-hidden h-10 justify-center border border-yellow-500 flex items-center w-full ">
                            <h1 class="font-bold text-xl text-white">Atualizado com sucesso</h1>
                        </div>
                    <?php
                    }
                    ?>


                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nome
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Senha
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ações
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) { ?>

                                <tr class="odd:bg-white">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        <?= $user['idUsers']; ?>
                                    </th>
                                    <td class="px-6 py-4">
                                        <?= $user['nome']; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $user['email']; ?>
                                    </td>
                                    <th class="px-6 py-3">
                                        <?= $user['senha']; ?>

                                    </th>
                                    <th>
                                        <div class="flex items-center">


                                            <form class="flex flex-col justify-center w-full space-y-3" action="configUsers/deleteUsers.php" method="post">
                                                <input type="hidden" name="id" value="<?= $user['idUsers'] ?>">
                                                <input type="hidden" name="nome" value="<?= $user['nome'] ?>">
                                                <input type="submit" name="btnUsersDelete" class="bg-red text-white px-4 py-2 rounded font-bold w-full " value="Excluir">
                                            </form>

                                            <form class="flex flex-col justify-center w-full space-y-3" action="updateUsers.php" method="get">
                                                <input type="hidden" name="id" value="<?= $user['idUsers'] ?>">
                                                <input type="hidden" name="nome" value="<?= $user['nome'] ?>">
                                                <input type="submit" name="btnUsersUpdate" class="bg-yellow-500 text-white px-4 py-2 rounded font-bold w-full ml-3" value="Editar">
                                            </form>

                                        </div>
                                    </th>
                                </tr>
                            <?php }
                            ?>

            

                </div>
                </th>
            </div>



            </tbody>
            </table>



        </div>
        </div>

        </table>

</body>

</html>