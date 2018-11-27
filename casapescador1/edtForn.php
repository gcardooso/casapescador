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
$nome = trim($_POST['txtNome']);
$cidade = trim($_POST['txtCidade']); 
$celular = trim($_POST['txtCelular']);    
$email = trim($_POST['txtEmail']); 

   
if (!empty($nome) && !empty($cidade) && !empty($celular){
        
    $sql = "UPDATE fornecedor SET nome='$nome', cidade='$cidade', celular='$celular', email='$email' WHERE id='$id';";
    $ins = mysql_query($sql);        
    if (!$ins){            
       echo "Erro ao atualizar fornecedor...";               
}   
}   
else {		
    echo "campos em branco...";	
}      
header('location: lstForn.php');
?>