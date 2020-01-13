<?php
require 'includes/conecta.inc.php';
?>

<?php
include 'includes/header.inc.php';
?>

</br>
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

</br>
<center> <p>
<button type="button"><a href="adicionarLivro.php">Cadastrar Novo Livro</a></button>
</center>

<?php
include 'includes/footer.inc.php';
?>