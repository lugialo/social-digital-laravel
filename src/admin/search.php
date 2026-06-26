<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Social Digital - Busca</h1>
    <h3><a href="read.php" class="back_btn">Voltar</a></h3>

    <?php
    include_once('connect.php');

    $buscar = $_POST['buscar'];
    $submit = $_POST['sbmt'];

    if (isset($submit)) {
        $sql_busca = mysqli_query($conn, "SELECT * FROM usuarios WHERE (id_usuario = $buscar) or (nome_usuario = '%$buscar%') or (cpf_usuario = $buscar) or (dtCad_usuario = '%$buscar%')");
    } else if (empty($sql_busca)){
        echo "Nenhum registro encontrado.";
    }
    
    ?>

    <fieldset>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>E-mail</th>
                    <th>Celular</th>
                    <th>Nascimento</th>
                    <th>Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <?php
            while ($row = mysqli_fetch_array($sql_busca)) { ?>
                <tr>
                    <td><?php echo $row['id_usuario']; ?></td>
                    <td><?php echo $row['nome_usuario']; ?></td>
                    <td><?php echo $row['cpf_usuario']; ?></td>
                    <td><?php echo $row['rg_usuario']; ?></td>
                    <td><?php echo $row['email_usuario']; ?></td>
                    <td><?php echo $row['celular_usuario']; ?></td>
                    <td><?php echo $row['dtNasc_usuario']; ?></td>
                    <td><?php echo $row['dtCad_usuario']; ?></td>

                    <td><a href="screenEdit.php?id=<?= $row['id_usuario']; ?>" class="edit_btn">Edit</a></td>
                    <td><a href="delete.php?id=<?= $row['id_usuario']; ?>" class="del_btn">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
    </fieldset>
    <br>

</body>

</html>