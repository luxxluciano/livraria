<?php
require 'conecta.inc.php';
?>

<?php
include 'includes/header.inc.php';
?>

</br>
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

</br>
<center> <p>
<button type="button"><a href="adicionarEstoque.php">Cadastrar Novo Estoque</a></button>
</center>

<?php
include 'includes/footer.inc.php';
?>