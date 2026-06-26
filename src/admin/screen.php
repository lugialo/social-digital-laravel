<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Social Digital - Admin</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Social Digital</a>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastros
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/screen.php">Novo</a>
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/read.php">Tabela de usuários</a>
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/read.php">Relatório</a>
                    </div>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dashboard
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Geral</a>
                        <a class="dropdown-item" href="#">Visitas</a>
                        <a class="dropdown-item" href="#">Gráficos</a>
                    </div>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Contato
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Mensagens</a>
                        <a class="dropdown-item" href="#">Feedbacks</a>
                        <a class="dropdown-item" href="#">Gráficos</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <br><br>

    <form method="POST" action="create.php" style="width: 60%; margin: auto;">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nome</label>
                <input class="form-control" type="text" name="nome_user" id="userName" placeholder="Nome" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Email</label>
                <input class="form-control" name="email_user" id="userEmail" placeholder="Email" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputAddress">CPF</label>
                <input type="text" class="form-control" name="cpf_user" id="userCpf" placeholder="CPF" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress2">RG</label>
                <input type="text" class="form-control" name="rg_user" id="userRg" placeholder="RG" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCity">Celular</label>
                <input type="text" class="form-control" name="cel_user" id="userCel" placeholder="Celular" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-1">
                <label for="inputEstado">Estado</label>
                <select id="UF" name="UF" class="form-control">
                    <option selected>UF</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MS">MS</option>
                    <option value="MT">MT</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                </select>
            </div>
            <div class="form-group col-md-5">
                <label for="inputCEP">Cidade</label>
                <input type="text" class="form-control" name="cidade_cidade" id="cidade_cidade" placeholder="Cidade" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCity">Bairro</label>
                <input type="text" class="form-control" name="bairro_user" id="userBairro" placeholder="Bairro" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Endereço</label>
                <input class="form-control" type="text" name="end_user" id="userEnd" placeholder="Endereço" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">Nascimento</label>
                <input class="form-control" type="date" name="dtNasc_user" id="userDtNasc" required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">Cadastro</label>
                <input class="form-control" type="date" name="dtCad_user" id="userDtCad" value="<?php echo date('Y-d-m'); ?>" required>
            </div>
        </div>
        <button type="submit" name="sbmt" class="btn btn-primary col-md-12">Cadastrar</button>

    </form>

    <br><br>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>