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
           <a href="index.php"><h4><-home</h4></a>
        </div>
    </div>

<div class="menu">
    <div class="menuint">
        <ul>
            <a href="funcionarios.php"> <li> funcionários </li> </a> 
            <a href="livros.php"> <li>livros</li> </a>
            <a href="fornecedores.php"> <li>fornecedores</li> </a>
            <a href="estoques.php"> <li>estoques</li> </a>
            <a href="pesquisar.php"> <li>pesquisar</li> </a>
        </ul>
    </div>
</div>

<div class="conteudo">

<a href="adicionarEstoque.php">Cadastrar Novo Estoque</a>
<center><table border="1" width="80%">
<tr>
<th colspan="7" align="center">Estoques Cadastrados</th>
</tr>
<tr>
<th>Código</th>
<th>Livros</th>
<th>Funcionários</th>
<th>Quantidade Total</th>
<th>Quantidade Recebida</th>
<th>Data de Atualização</th>
<th>Ações</th>
</tr>
<?php
$sql = "SELECT * FROM estoques, livros, funcionarios WHERE estoques.livros_idlivros=livros.idlivros AND estoques.funcionarios_idfuncionarios=funcionarios.idfuncionarios";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $estoque){
        echo '<tr align="center">';
        echo '<td>'.$estoque['idestoques'].'</td>';
        echo '<td>'.$estoque['titulo'].'</td>';
        echo '<td>'.$estoque['nome'].'</td>';
        echo '<td>'.$estoque['quant_total'].'</td>';
        echo '<td>'.$estoque['quant_recebida'].'</td>';
        echo '<td>'.$estoque['data_atualiza'].'</td>';
        echo '<td><a href="editarEstoque.php?idestoques='.$estoque['idestoques'].'">Editar</a> - <a href="excluirEstoque.php?idestoques='.$estoque['idestoques'].'">Excluir</a></td>'; 
        echo '</tr>';
    }
}else{
    echo 'Nenhum registro encontrado!';
}
?>

</table></center>

</div>

<footer class="footer">

Desenvolvido por Luciano Martins Fagundes. Faculdade SENAC Porto Alegre. 2019-2019.
</footer>
</body>
</html>