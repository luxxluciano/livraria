<?php
include 'includes/header.inc.php';
?>

</br>
<center> <table>
<th>Pesquisando Livros</th>
</table </center>
</br>

<?php
$id=$_GET['id'];
require("conecta.inc.php");
$pesquisou=false;
if ($id==1)
{
	$fornecedor = $_GET['fornecedor'];
	if (empty($fornecedor))
		print("Preencha um fornecedor.");
	else
	{
		$sql= "Select * from livros, fornecedores where idfornecedores = '$fornecedor' and livros.fornecedores_idfornecedores=fornecedores.idfornecedores";
        $sql = $pdo->query($sql);
        $pesquisou=true;
	}


}
elseif ($id==2)
{
	$titulo=$_GET['titulo'];
	if (empty($titulo))
		print("Preencha um título.");
	else
	{
		$sql= "Select * from livros, fornecedores where titulo LIKE '%$titulo%'and livros.fornecedores_idfornecedores=fornecedores.idfornecedores";
        $sql = $pdo->query($sql);
        $pesquisou=true;
	}
}
else
	print("Informe um critério...");
if($pesquisou)
    if($sql->rowCount() > 0){
        foreach($sql->fetchAll() as $livro){
			echo '<center> <table>';
			echo '<th>Fornecedor</th>';
			echo '<th>Título</th>';
			echo '<th>Ano Publicação</th>';
			echo '<th>Editora</th>';
            echo '<tr align="center">';
            echo '<td>'.$livro['nome'].'</td>';
            echo '<td>'.$livro['titulo'].'</td>';
            echo '<td>'.$livro['anopublica'].'</td>';
            echo '<td>'.$livro['editora'].'</td>';
			echo '</tr>';
			echo '</table> </center>';
    }
}else{
    echo 'Nenhum registro encontrado!';
}

?>
</br>
<center> <p>
<button type="button"><a style="color:black" href="pesquisar.php">Nova pesquisa</a></button>
</center>
<?php
include 'includes/footer.inc.php';
?>