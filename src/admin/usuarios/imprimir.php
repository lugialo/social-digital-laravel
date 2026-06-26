<?php
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
        include_once('../connect.php');

        $usuario_selecionado = $_GET['id']; 

        $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE id_usuario = $usuario_selecionado");
        $row = mysqli_fetch_array($sql);

        $dtNasc_user = DateTime::createFromFormat("Y-m-d", $row['dtNasc_usuario']);
        $dtCad_user = DateTime::createFromFormat("Y-m-d", $row['dtCad_usuario']); 
    
    ?>

    <div class="container">
        <div style="display:flex; align-items:center; justify-content:space-between">
            <h2>Usuário</h2>
            <a href="read.php" style="margin-bottom: 10px;" class="btn btn-outline-primary print">Voltar</a>
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
                <div>Código: <?=$row['id_usuario']?></div><hr>
                <div>Nome: <?=$row['nome_usuario']?></div><hr>
                <div>E-mail: <?=$row['email_usuario']?></div><hr>
                <div>CPF: <?=$row['cpf_usuario']?></div><hr>
                <div>RG: <?=$row['rg_usuario']?></div><hr>
                <div>Cadastro: <?=$dtCad_user->format("d/m/Y");?></div><hr>
                <div>Nascimento: <?=$dtNasc_user->format("d/m/Y");?></div><hr>
                <div>Tipo: <?=$row['fk_tipo']?></div><hr class="print">
            </h5>
            <a style="margin: 10px; color:white;" onclick="window.print()" class="btn btn-primary print">Imprimir</a>
        </div>
    </div>

    

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
