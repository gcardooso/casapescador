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

    $id = trim($_POST['txtId']); 

    if (!empty($id)){
        $sql = "DELETE FROM cliente WHERE id='$id';";
        $ins = mysql_query($sql); 
        if (!$ins){
            echo "Erro ao remover cliente...";
          
        }
    }
    else {
		echo "campos em branco...";
	
    }
    
    header('location: lstCli.php');
?>