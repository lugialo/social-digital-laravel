<?php
//include_once('/xampp/htdocs/pi353socialdigital/src/user/sessao.php');
include_once('../connect.php');
include_once('var.php');

$fk_tipo = $_POST['tipo_usuario'];

// Cadastro Usuário
$sql = "INSERT INTO usuarios(
            nome_usuario, 
            cpf_usuario, 
            rg_usuario, 
            email_usuario,
            senha_user,  
            dtNasc_usuario, 
            dtCad_usuario,
            fk_tipo
            ) 
        VALUES(    
            '$name_user',
            '$cpf_user',
            '$rg_user',
            '$email_user',
            '$senha_user',
            '$dtNasc_user',
            '$dtCad_user',
            '$fk_tipo'
            )";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);

?>
