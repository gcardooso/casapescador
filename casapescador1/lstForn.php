<?php
// echo "Meu php está funcionando...";
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
$rs = mysql_query("SELECT * FROM fornecedor;");
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Listagem de Fornecedores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body class="container col-md-6">
    <h1 class="text-center"> Lista de Fornecedores </h1>
    <br>
    <button name="btnVolta" id="btnVolta" class="btn btn-lg btn-outline-success" type="button"
        onclick="javascript: location.href='frmInsForn.html'">
        <i class="fas fa-plus-square"></i>
        Adicionar 
    </button>
      
    <button name="btnVolta" id="btnVolta" class="btn btn-lg btn-outline-danger" type="button"
        onclick="javascript: location.href='index.html'">
        <i class="fas fa-reply-all"></i>
        Voltar 
    </button>

    <table class="table table-striped table-dark">
        <tr>
           <th>ID</th>
           <th>Nome</th>
           <th>Cidade</th>
           <th>Celular</th>
           <th>Email</th>
           <th colspan="2" class="text-center">OPERAÇÕES</th>
        </tr>
        <?php while ($linha = mysql_fetch_array($rs)) {?>
        <tr>
           <td><?php echo $linha ['id'] ?></td>
           <td><?php echo $linha ['nome'] ?></td>
           <td><?php echo $linha ['cidade'] ?></td>
           <td><?php echo number_format ($linha ['celular']) ?></td>
           <td><?php echo $linha ['email'] ?></td>

           <td><button name="btEdt" id="btEdt" class="btn btn-lg btn-outline-secondary" type="submit"
            onclick="javascript: location.href='frmEdtForn.php?id=' + <?php echo $linha['id'] ?>">
            <i class="far fa-edit"></i></button></td>
            <td><button name="btRem" id="btRem" class="btn btn-lg btn-outline-danger" type="button"
        onclick="javascript: location.href='frmRemForn.php?id=' + <?php echo $linha['id'] ?>">
        <i class="far fa-trash-alt"></i></button></td>
        </tr>      
    <?php }?>
</table>

</body>
</html>