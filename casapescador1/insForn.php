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

$id = trim ($_POST['txtId']);
$nome = trim ($_POST['txtNome']);
$cidade = trim ($_POST['txtCidade']);
$celular = trim ($_POST['txtCelular']);
$email = trim($_POST['txtEmail']);
if (!empty($nome) && $celular>0){
    $sql = "INSERT INTO fornecedor (nome, cidade, celular) VALUES ('$nome', '$cidade', '$celular');";
    $ins = mysql_query($sql);
    if (!$ins)
       echo ("Erro ao inserir fornecedor");
}
else echo "Descrição em branco ou campo valor igual a zero";

header("location: lstForn.php");
?>
