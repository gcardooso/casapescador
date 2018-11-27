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

    $id = trim($_REQUEST['id']); //codigo do fornecedor que será editado
    $rs = mysql_query("SELECT * FROM  fornecedor where id='$id';");
    $linha = mysql_fetch_array($rs); 
   // echo $linha['descricao']; 
?>
<html>
  <head>
     <meta charset="UTF-8">
     <title>Remover Fornecedor</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  </head>
  <body>
      <div class="container col-md-8">
          <h1>Remover Fornecedor</h1>
          <form id="frmRemForn" name="frmRemForn" method="POST" action="remForn.php">
                <div class="form-group">
                    <label for="lblId">
                        <span class="text-xl font-weight-bold"> Id: </span>
                        <span class="text-xl font-weight-normal"><?php echo $linha['id'] ?></span>
                    </label>
                    <input type="hidden" id="txtId" name="txtId" value="<?php echo $linha['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="lblNome">
                        <span class="text-xl font-weight-bold"> Nome: </span>
                        <span class="text-xl font-weight-normal"><?php echo $linha['nome'] ?></span>
                    </label>
                </div>
                </div>
                <div class="form-group">
                    <label for="lblCidade">
                        <span class="text-xl font-weight-bold"> Cidade: </span>
                        <span class="text-xl font-weight-normal"><?php echo $linha['cidade'] ?></span>
                    </label>
                </div
                <div class="form-group">
                    <label for="lblCelular">
                        <span class="text-xl font-weight-bold"> Celular: </span>
                        <span class="text-xl font-weight-normal"><?php echo $linha['celular'] ?></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblEmail">
                        <span class="text-xl font-weight-bold">Email: </span>
                        <span class="text-xl font-weight-normal"><?php echo $linha['email'] ?></span>
                    </label>
                </div>
                <button name="btRem" id="btRem" class="btn btn-lg btn-outline-success" type="submit">
                    <i class="far fa-check-square"></i> Remover</button>               
                <button name="btBck" id="btBck" class="btn btn-lg btn-outline-danger" type="button"
                    onclick="javascript:location.href='lstForn.php'">
                    <i class="far fa-hand-point-left"></i> Voltar</button> 
          </form>
      </div>
  </body>
</html>