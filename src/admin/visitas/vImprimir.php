<?php
    include_once('../connect.php');
    //include_once('/xampp/htdocs/pi353socialdigital/src/user/sessao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Social Digital</title>
</head>

<body>

    <?php
        include_once('../header.php');
        
        $visita_selecionada = $_GET['id'];
        
        $sql = mysqli_query($conn, "SELECT * FROM visitas WHERE id_visitas = $visita_selecionada");
        $row = mysqli_fetch_array($sql);
    ?>

    <div class="container">
        <div style="display:flex; align-items:center; justify-content:space-between">
            <h3>Visita</h3>
            <a href="vread.php" style="margin-bottom: 10px;" class="btn btn-outline-primary print">Voltar</a>
        </div>

        <style type="text/css">
            @media print{
                .print {
                    display: none;
                }
            }
        </style>

        <div class="card" style="padding: 20px; display:flex;">
            <h5>
                <div>Código: <?=$row['id_visitas']?></div><hr>
                
                <?php
                    $assistente = $row['fk_assistente'];
                    $membro = $row['fk_membro'];

                    $data_visita = DateTime::createFromFormat("Y-m-d", $row['data_visita']);
                    $hora_visita = DateTime::createFromFormat("H:i:s",$row['hora_visita']);

                    $results_assistente = mysqli_query($conn, "SELECT nome_usuario FROM usuarios WHERE id_usuario = $assistente");
                    $row_assistente     = mysqli_fetch_array($results_assistente);
            
                    $results_membro = mysqli_query($conn, "SELECT nome_usuario FROM usuarios WHERE id_usuario = $membro");
                    $row_membro     = mysqli_fetch_array($results_membro);
                ?>

                <div>Assistente: <?=$row_assistente['nome_usuario']?></div><hr>
                <div>Membro: <?=$row_membro['nome_usuario']?></div><hr>
                
                <div>Data: <?=$data_visita->format("d/m/Y");?></div><hr>
                <div>Hora: <?=$hora_visita->format("H:i");?></div><hr>
                <div>CEP: <?=$row['cep_visita']?></div><hr>
                <div>Logradouro: <?=$row['rua_visita']?></div><hr>
                <div>Bairro: <?=$row['bairro_visita']?></div><hr>
                <div>Cidade: <?=$row['cidade_visita']?></div><hr>
                <div>Estado: <?=$row['estado_visita']?></div><hr>
                <div>Observação: <?=$row['observacao_visita']?></div><hr>
                <div>Descrição: <?=$row['descricao_visita']?></div><hr class="print">
            </h5>
            <a style="margin: 10px; color:white;" onclick="window.print()" class="btn btn-primary print">Imprimir</a>
        </div>
    </div>

    

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
