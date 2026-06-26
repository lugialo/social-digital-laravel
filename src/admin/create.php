<?php
    include_once('connect.php');
    include_once('var.php');

$sql = "INSERT INTO usuarios(
            nome_usuario, 
            cpf_usuario, 
            rg_usuario, 
            email_usuario, 
            celular_usuario, 
            dtNasc_usuario, 
            dtCad_usuario
            ) 
        VALUES(    
            '$name_user',
            '$cpf_user',
            '$rg_user',
            '$email_user',
            '$celular_user',
            '$dtNasc_user',
            '$dtCad_user'
            )";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully <br>";
        echo $sql;
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

?>  

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Digital - ADMIN</title>
</head>
<body>
    <a href="/pi353socialdigital/src/admin/read.php">Ver registros</a>
</body>
</html>