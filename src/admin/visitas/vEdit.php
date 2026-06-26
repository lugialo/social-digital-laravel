<?php
    //include_once('/xampp/htdocs/pi353socialdigital/src/user/sessao.php');
    include_once('../connect.php');
    include_once('vvar.php');

    $visita_selecionado = $_GET['id'];
    
    $sql = "UPDATE visitas SET 
            data_visita = '$data_visita',
            hora_visita = '$hora_visita',
            observacao_visita = '$observacao_visita', 
            descricao_visita = '$descricao_visita',
            rua_visita = '$rua',
            bairro_visita = '$bairro',
            cidade_visita = '$cidade',
            estado_visita = '$estado',
            cep_visita = '$cep'
        WHERE id_visitas = $visita_selecionado; ";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
?>  
