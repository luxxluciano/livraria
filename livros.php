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

<a href="adicionarLivro.php">Cadastrar Novo Livro</a>
<center><table border="1" width="80%">
<tr>
<th colspan="7" align="center">Livros Cadastrados</th>
</tr>
<tr>
<th>Código</th>
<th>Fornecedores</th>
<th>Título</th>
<th>Ano de Publicação</th>
<th>Edição</th>
<th>Editora</th>
<th>Acões</th>
</tr>
<?php
$sql = "SELECT * FROM livros, fornecedores WHERE livros.fornecedores_idfornecedores=fornecedores.idfornecedores";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $livro){
        echo '<tr align="center">';
        echo '<td>'.$livro['idlivros'].'</td>';
        echo '<td>'.$livro['nome'].'</td>';
        echo '<td>'.$livro['titulo'].'</td>';
        echo '<td>'.$livro['anopublica'].'</td>';
        echo '<td>'.$livro['edicao'].'</td>';
        echo '<td>'.$livro['editora'].'</td>';
        echo '<td><a href="editarLivro.php?idlivros='.$livro['idlivros'].'">Editar</a> - <a href="excluirLivro.php?idlivros='.$livro['idlivros'].'">Excluir</a></td>'; 
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