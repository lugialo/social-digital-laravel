<?php
    //include_once('/xampp/htdocs/pi353socialdigital/src/user/sessao.php');
    include_once('../connect.php');
    include_once('var.php');

    $usuario_selecionado = $_GET['id'];

$sql = "UPDATE usuarios SET 
            nome_usuario ='$name_user',
            cpf_usuario = '$cpf_user',
            rg_usuario = '$rg_user',
            email_usuario = '$email_user',
            dtNasc_usuario = '$dtNasc_user', 
            dtCad_usuario = '$dtCad_user'
        WHERE id_usuario = $usuario_selecionado";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

?>  