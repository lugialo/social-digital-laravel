<?php
//include_once('/xampp/htdocs/pi353socialdigital/src/user/sessao.php');
include_once('../connect.php');
include_once('vvar.php');

$fk_assistente = $_POST['visitantevi'];
$fk_membro = $_POST['membrovi'];

$sql_visitas = "INSERT INTO visitas(
            data_visita, 
            hora_visita, 
            observacao_visita, 
            descricao_visita,
            cep_visita,
            rua_visita,
            bairro_visita,
            cidade_visita,
            estado_visita,
            fk_assistente,
            fk_membro
            )   
        VALUES(    
            '$data_visita',
            '$hora_visita',
            '$observacao_visita',
            '$descricao_visita',
            '$cep', 
            '$rua',
            '$bairro',
            '$cidade',
            '$estado',
            $fk_assistente,
            $fk_membro
            )";

if ($conn->query($sql_visitas) === TRUE) {
} else {
    echo '---->' . $fk_assistente, $fk_membro . '<br>';
    echo "Error: " . $sql_visitas . "<br>" . $conn->error;
}

mysqli_close($conn);

?>
