<?php
    $conexao = mysql_connect("localhost","root",""); 
	if (!$conexao){
		echo "Erro ao se conectar MySql <br/>" ; 
		exit;
    }
    $banco  = mysql_select_db("casapescador");
	if (!$banco){
		echo "Erro ao se conectar ao banco casa pescador...";
		exit;
    }

    $id = trim($_REQUEST['id']); //codigo da mercadoria que será editada
    $rs = mysql_query("SELECT * FROM  mercadoria where id='$id';");
    $linha = mysql_fetch_array($rs); 
   // echo $linha['descricao']; 
?>
<html>
  <head>
     <meta charset="UTF-8">
     <title>Remover Mercadoria</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  </head>
  <body>
      <div class="container col-md-8">
          <h1>Remover Mercadoria</h1>
          <form id="frmRemMerc" name="frmRemMerc" method="POST" action="remMerc.php">
                <div class="form-group">
                    <label for="lblId">
                        <span class="text-xl font-weight-bold"> ID: </span>
                        <span class="text-xl font-weight-normal"><?php echo $linha['id'] ?></span>
                    </label>
                    <input type="hidden" id="txtId" name="txtId" value="<?php echo $linha['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblDescricao">
                        <span class="text-xl font-weight-bold"> Descrição: </span>
                        <span class="text-xl font-weight-normal"><?php echo $linha['descricao'] ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblQuantidade">
                        <span class="text-xl font-weight-bold"> Quantidade: </span>
                        <span class="text-xl font-weight-normal"><?php echo $linha['quantidade'] ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblValor">
                        <span class="text-xl font-weight-bold"> Valor: </span>
                        <span class="text-xl font-weight-normal"><?php echo $linha['valor'] ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblFornecedor">
                        <span class="text-xl font-weight-bold">Fornecedor: </span>
                        <span class="text-xl font-weight-normal"><?php echo $linha['fornecedor'] ?></span>
                    </label>
                </div>
                <button name="btRem" id="btRem" class="btn btn-lg btn-outline-success" type="submit">
                    <i class="far fa-check-square"></i> Remover</button>               
                <button name="btBck" id="btBck" class="btn btn-lg btn-outline-danger" type="button"
                    onclick="javascript:location.href='lstMerc.php'">
                    <i class="far fa-hand-point-left"></i> Voltar</button> 
          </form>
      </div>
  </body>
</html>