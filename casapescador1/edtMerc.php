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
$descricao = trim($_POST['txtDescricao']); 
$quantidade = trim($_POST['txtQuantidade']);    
$valor = trim($_POST['txtValor']); 
$fornecedor = trim($_POST['txtFornecedor']);
   
if (!empty($descricao) && !empty($quantidade) && !empty($valor)){
        
    $sql = "UPDATE mercadoria SET descricao='$descricao', quantidade='$quantidade', valor='$valor', fornecedor='$fornecedor' WHERE id='$id';";
    $ins = mysql_query($sql);        
    if (!$ins){            
       echo "Erro ao atualizar mercadoria...";               
}   
}   
else {		
    echo "campos em branco...";	
}      
header('location: lstMerc.php');
?>