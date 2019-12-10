<?php
require 'conecta.inc.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="topo">

        <div class="topoint">
            <h1> Livraria Classe A </h1>
            <a href="index.php">
                <h4>
                    <-home</h4> </a> </div> </div> <div class="menu">
                        <div class="menuint">
                            <ul>
                                <a href="funcionarios.php">
                                    <li> funcionários </li>
                                </a>
                                <a href="livros.php">
                                    <li>livros</li>
                                </a>
                                <a href="fornecedores.php">
                                    <li>fornecedores</li>
                                </a>
                                <a href="estoques.php">
                                    <li>estoques</li>
                                </a>
                                <a href="pesquisar.php">
                                    <li>pesquisar</li>
                                </a>
                            </ul>
                        </div>
        </div>

        <div class="conteudo">
            <center>
                <table border="0" bordercolor="blue">
                    <th>Pesquisar Livros</th>
                    <tr>
                        <td align='center'>
                            <br />
                            <form action="pesqLivros.php" method="get">
                                Fornecedor: <input type="text" name="fornecedor">
                                <input type="hidden" name="id" value="1">
                                &nbsp;&nbsp;<input type="submit" value="Pesquisar Fornecedor">
                            </form>
                            <br />
                            <hr>
                            <br />
                            <form action="pesqLivros.php" method="get">
                                Título: <input type="text" name="titulo">
                                <input type="hidden" name="id" value="2">
                                &nbsp;&nbsp;<input type="submit" value="Pesquisar Título">
                            </form>
                            <br />
                    </tr>
                    <th>Pesquisar Estoques</th>
                    <tr>
                        <td align='center'>
                            <br />

                            <form action="pesq.php" method="get">
                                Funcionário: <input type="text" name="nome">
                                <input type="hidden" name="id" value="3">
                                &nbsp;&nbsp;<input type="submit" value="Pesquisar Funcionário">
                            </form>
                            <br />
                            <hr>
                            <br />
                            <form action="pesq.php" method="get">
                                Título: <input type="text" name="titulo">
                                <input type="hidden" name="id" value="4">
                                &nbsp;&nbsp;<input type="submit" value="Pesquisar Título">
                            </form>
                            <br />
                        </td>
                    </tr>
                </table>
            </center>


        </div>



        <footer class="footer">

            Desenvolvido por Luciano Martins Fagundes. Faculdade SENAC Porto Alegre. 2019-2019.
        </footer>
</body>

</html>