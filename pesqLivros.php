<?php
$id=$_GET['id'];
require("conecta.inc.php");
$pesquisou=false;
if ($id==2)
{
	$titulo=$_GET['titulo'];
	if (empty($titulo))
		print("Preencha um título.");
	else
	{
		$sql= "Select * from livros, fornecedores where titulo LIKE '%$titulo%'and livros.fornecedores_idfornecedores=fornecedores.idfornecedores";
        $pdo->query($sql);
        $pesquisou=true;
	}
}
elseif ($id==1)
{
	$fornecedor=$_GET['fornecedor'];
	if (empty($fornecedor))
		print("Preencha um fornecedor.");
	else
	{
		$sql= "Select * from livros, fornecedores where fornecedor LIKE '%$fornecedor%'and livros.fornecedores_idfornecedores=fornecedores.idfornecedores";
        $pdo->query($sql);
        $pesquisou=true;
	}
}
else
	print("Informe um critério...");
if($pesquisou){
    if($sql->rowCount() > 0){
        foreach($sql->fetchAll() as $livro){
            echo '<tr align="center">';
            echo '<td>'.$livro['idlivros'].'</td>';
            echo '<td>'.$livro['nome'].'</td>';
            echo '<td>'.$livro['titulo'].'</td>';
            echo '<td>'.$livro['anopublica'].'</td>';
            echo '<td>'.$livro['edicao'].'</td>';
            echo '<td>'.$livro['editora'].'</td>';
            echo '</tr>';
    }
}else{
    echo 'Nenhum registro encontrado!';
}
}
?>
<p>
<a href="pesquisar.php">Voltar</a>
