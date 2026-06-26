<?php
    //include_once('/xampp/htdocs/pi353socialdigital/src/user/sessao.php');
    //$id = $_GET['id'];
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

        $buscar = $_POST['buscar'];
        $submit = $_POST['sbmt'];

        if (isset($submit)) {
            if (is_numeric($buscar)){
                $where = "(id_usuario = $buscar) OR (cpf_usuario = $buscar) OR (rg_usuario = $buscar)";
            }else{
                $where = "(nome_usuario LIKE '%$buscar%') or (dtCad_usuario = '$buscar') or (dtNasc_usuario LIKE '%$buscar%') or (email_usuario = '$buscar')";
            }
            $results = mysqli_query($conn, "SELECT * FROM usuarios WHERE  $where");
        }
    ?>

    <div class="container">
        <div class="card">

            <table class="table table-striped">
                <thead class="thead-Primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">RG</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">Cadastro</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($results)) { 
                        $id_usuario = $row['id_usuario'];
                        $name_user = $row['nome_usuario'];
                        $cpf_user = $row['cpf_usuario'];
                        $rg_user = $row['rg_usuario'];
                        $email_user = $row['email_usuario'];
                        $dtNasc_user = DateTime::createFromFormat("Y-m-d", $row['dtNasc_usuario']);
                        $dtCad_user = DateTime::createFromFormat("Y-m-d", $row['dtCad_usuario']);  
                        $tipo_user = $row['fk_tipo'];
                    ?>
                    
                        <tr>
                            <td><?=$row['id_usuario'];?></td>
                            <td><?=$row['nome_usuario']; ?></td>
                            <td><?=$row['cpf_usuario']; ?></td>
                            <td><?=$row['rg_usuario']; ?></td>
                            <td><?=$row['email_usuario']; ?></td>
                            <td><?=$dtNasc_user->format("d/m/Y"); ?></td>
                            <td><?=$dtCad_user->format("d/m/Y");?> </td>
                            <td><?=$row['fk_tipo']; ?></td>

                            <td>
                                <a name="edit" href="screenEdit.php?id=<?=$row['id_usuario']?>" class="edit_btn"><img src="/pi353socialdigital/IMAGES/editar.png" alt="edit"></a>
                                <a name="del" href="imprimir.php?id=<?=$row['id_usuario']?>" class="view_btn"><img src="/pi353socialdigital/IMAGES/impressao.png" alt="view"></a>
                                <a name="del" href="delete.php?id=<?=$row['id_usuario']?>" class="del_btn"><img src="/pi353socialdigital/IMAGES/lixo.png" alt="trash"></a>
                            </td>
                        </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
            <a type="submit" name="sbmt" href="read.php" class="btn btn-primary col-md-12">Voltar</a>
        </div>
        <!--card-->
    </div>
    <!--container-->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>