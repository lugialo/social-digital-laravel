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

        $buscar = $_POST['buscar'];
        $submit = $_POST['sbmt'];

        if (isset($submit)) {
            if (is_numeric($buscar)){
                $where = "(id_visitas = $buscar)";
            }else{
                $where = "(data_visita LIKE '%$buscar%') OR (hora_visita LIKE '%$buscar%:00') OR (estado_visita = '$buscar') OR (cidade_visita = '$buscar') OR (cep_visita = '$buscar')";
            }
            $results1 = mysqli_query($conn, "SELECT * FROM visitas WHERE  $where");
        }
    ?>

    <div class="container">
        <div class="card">

        <table class="table table-striped">
                <thead class="thead-Primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Asisstente</th>
                        <th scope="col">Membro</th>
                        <th scope="col">CEP</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Data</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($results1)) { 
                            $id_visita = $row['id_visitas'];
                            $assistente = $row['fk_assistente'];
                            $membro = $row['fk_membro'];
                            $cep = $row['cep_visita'];
                            $estado = $row['estado_visita'];
                            $cidade = $row['cidade_visita'];
                            $data_visita = $row['data_visita'];
                            $hora_visita = $row['hora_visita'];

                            $results_assistente = mysqli_query($conn, "SELECT nome_usuario FROM usuarios WHERE id_usuario = $assistente");
                            $row_assistente     = mysqli_fetch_array($results_assistente);

                            $results_membro = mysqli_query($conn, "SELECT nome_usuario FROM usuarios WHERE id_usuario = $membro");
                            $row_membro     = mysqli_fetch_array($results_membro);
                        
                            $data_visita = DateTime::createFromFormat("Y-m-d", $row['data_visita']);
                            $hora_visita = DateTime::createFromFormat("H:i:s",$row['hora_visita']);
                        ?>
                        <tr>
                            <td><?=$id_visita?></td>
                            <td><?=$row_assistente['nome_usuario']?></td>
                            <td><?=$row_membro['nome_usuario']?></td>
                            <td><?=$cep?></td>
                            <td><?=$estado?></td>
                            <td><?=$cidade?></td>
                            <td><?=$data_visita->format("d/m/Y");?></td>
                            <td><?=$hora_visita->format("H:i");?></td>

                            <td>
                                <a name="edit" href="vScreenEdit.php?id=<?$row['id_visitas']?>" class="edit_btn"><img src="/pi353socialdigital/IMAGES/editar.png" alt="edit"></a>
                                <a name="del" href="vImprimir.php?id=<?$row['id_visitas']?>"  class="view_btn"><img src="/pi353socialdigital/IMAGES/impressao.png" alt="view"></a>
                                <a name="del" href="vDelete.php?id=<?$row['id_visitas']?>"  class="del_btn"><img src="/pi353socialdigital/IMAGES/lixo.png" alt="trash"></a>
                            </td>
                        </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
            <a type="submit" name="sbmt" href="vread.php" class="btn btn-primary col-md-12">Voltar</a>
        </div>
        <!--card-->
    </div>
    <!--container-->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>