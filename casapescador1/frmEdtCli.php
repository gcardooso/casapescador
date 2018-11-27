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
$id = trim($_REQUEST['id']); //codigo do cliente que sera editad
$rs = mysql_query("SELECT * FROM cliente where id=".$id);
$edita = mysql_fetch_array($rs);
//echo $edita['descricao'];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Cliente</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

    <body>
        <div class="container col-md-10">
        <h1>Editar Cliente</h1>
        <br>
        <form id="frmEdtCli" name="frmEdtCli" method="POST" action="edtCli.php">
           <div class="form-group">
               <label for="lbltxtId">Id: <?php echo $edita['id'] ?> </label> 
               <input type="hidden" id="txtId" name="txtId"
               value="<?php echo $edita['id'] ?>">
           </div> 
           <br>
           <div class="form-group">
               <label for="lblNome">Nome: </label>
               <br>
               <input type="text" id= "txtNome" name="txtNome"
                class="form-control col-md-5"
                value="<?php echo $edita ['nome']?>">
           </div>
           <div class="form-group">
               <label for="lblCelular">Celular: </label>
               <input type="text" id="txtCelular" name="txtCelular"
               class="form-control col-md-3" value="<?php echo $edita ['celular']?>">
            </div>   
            <div class="form-group">
               <label for="lblEmail">Email: </label>
               <input type="text" name="txtEmail" id="txtEmail"
               class="form-control col-md-3" value="<?php echo $edita['email']?>">
            </div>
            <input type="submit" name="bt_Gravar" id="bt_Gravar"
            class="btn btn-outline-secondary bt-lg" value="Atualizar">
            <input type="reset" name="bt_Limpar" id="bt_Limpar"
            class="btn btn-outline-primary bt-lg" value="Limpar">
            <input type="button" name="bt_Cancelar" id="bt_Cancelar"
            class="btn btn-outline-danger bt-lg" value="Voltar"
            onclick="javascript:location.href='lstCli.php'">

    

        </form>
</div>
    </body>
</html>
