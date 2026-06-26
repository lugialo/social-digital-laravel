<?php
    include_once('connect.php');
    include_once('var.php');
    $id_user = $_POST['id_user'];

$sql = "UPDATE usuarios SET 
            nome_usuario ='$name_user',
            cpf_usuario = '$cpf_user',
            rg_usuario = '$rg_user',
            email_usuario = '$email_user', 
            celular_usuario = '$celular_user', 
            dtNasc_usuario = '$dtNasc_user', 
            dtCad_usuario = '$dtCad_user'
        WHERE id_usuario = $id_user; ";

    if ($conn->query($sql) === TRUE) {
        echo "Uptdate successfully <br>";
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
    <title>Social Digital - Editar</title>
</head>
<body>
    <a href="/pi353socialdigital/src/admin/read.php">Ver registros</a>
</body>
</html>