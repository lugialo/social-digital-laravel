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
        include_once("../connect.php");

        $usuario_selecionado = $_GET['id'];
        $select = mysqli_query($conn, "SELECT * FROM usuarios where id_usuario = $usuario_selecionado");
        $row = mysqli_fetch_array($select);
    ?>

    <form method="POST" style="width: 60%; margin: auto;">

        <div style="display:flex; align-items:center; justify-content:space-between">
            <h2>Editar usúario</h2>
            <a href="read.php" style="margin-bottom: 10px;" class="btn btn-outline-primary">Voltar</a>
        </div>
        
        <hr>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nome</label>
                <input class="form-control" type="text" name="nome_user" id="userName" placeholder="Nome" required value="<?=$row['nome_usuario']?>" />
            </div>

            <div class="form-group col-md-6">
                <label for="inputPassword4">Email</label>
                <input class="form-control" name="email_user" id="userEmail" placeholder="Email" required value="<?=$row['email_usuario']?>" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="tipo_usuario">Tipo de Usuário</label>
                <input class="form-control" disabled="" type="text" value="<?=$row['fk_tipo']?>"/>
            </div>


            <div class="form-group col-md-3">
                <label for="inputAddress">CPF</label>
                <input type="text" class="form-control" name="cpf_user" id="userCpf" placeholder="CPF" maxlength="11" required value="<?=$row['cpf_usuario']?>" />
            </div>

            <div class="form-group col-md-3">
                <label for="inputAddress2">RG</label>
                <input type="text" class="form-control" name="rg_user" id="userRg" placeholder="RG" maxlength="7" required value="<?=$row['rg_usuario']?>" />
            </div>

            <div class="form-group col-md-2">
                <label for="inputPassword4">Nascimento</label>
                <input class="form-control" type="date" name="dtNasc_user" id="userDtNasc" required value="<?=$row['dtNasc_usuario']?>" />
            </div>
                    
            <div class="form-group col-md-2">
                <label for="inputPassword4">Cadastro</label>
                <input class="form-control" type="date" name="dtCad_user" id="userDtCad" required value="<?=$row['dtCad_usuario']?>" />
            </div>

            
            <button type="submit"  name="sbmt" class="btn btn-primary col-md-12">Atualizar</button>
        
        </form>

        <?php
            error_reporting(0);
            if(isset($_POST['sbmt'])){
                include_once('edit.php');
                echo "<script>alert('Usuário alterado!!')</script>";
            }
        ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
