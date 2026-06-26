<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Social Digital - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

	<header>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Social Digital</a>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuários
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/usuarios/screen.php">Novo usuário</a>
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/usuarios/read.php">Tabela de usuários</a>
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/usuarios/read.php">Relatório</a>
                    </div>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Visitas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/visitas/vScreen.php">Nova visita</a>
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/visitas/vRead.php">Tabela de visitas</a>
                        <a class="dropdown-item" href="/pi353socialdigital/src/admin/visitas/vRead.php">Relatório</a>
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
	</header>

    <br><br>

	<main>
		<div class="container min-vh-100">
			<div class="row justify-content-center align-items-center vh-100">
			  	<div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
					<form class="rounded-3 py-4 px-3 p-xl-5 shadow p-3 mb-5 bg-white rounded">
						<h1 class="text-center text-primary">Login</h1>
                        <br>
						<div class="row">
							<div class="col">
								<label for="user" class="form-label">Usuário</label>
								<input type="text" name="user" id="user" class="form-control" placeholder="Usuário" required>
							</div>
						</div>
                        <br>
						<div class="row">
							<div class="col">
								<label for="password" class="form-label">Senha</label>
								<input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
							</div>
						</div>
                        <br>
					    <div class="row">
							<div class="col-12 mt-3 text-center">
								<button type="submit" class=" btn btn-primary w-50">Entrar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div> 
	</main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>