<?php

$conexao = mysql_connect("localhost","root","");
if (!$conexao){
    echo "Erro ao se conectar MySql <br/> ";
    exit;
}
$banco = mysql_select_db("casapescador");
if (!$banco){
    echo "Erro ao se conectar ao banco casa pescador...";
    exit;
}

$descricao = trim ($_POST['txtDescricao']);
$quantidade = trim ($_POST['txtQuantidade']);
$valor = trim ($_POST['txtValor']);
$fornecedor = trim($_POST['txtFornecedor']);
if (!empty($descricao) && $valor>0){
    $sql = "INSERT INTO mercadoria(descricao, quantidade, valor, fornecedor) VALUES ('$descricao', '$quantidade', '$valor', '$fornecedor');";
    $ins = mysql_query($sql);
    if (!$ins)
       echo ("Erro ao inserir mercadoria");
}
else echo "Descrição em branco ou campo valor igual a zero";

header("location: lstMerc.php");
?>
