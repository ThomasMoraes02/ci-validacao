<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url("/assets/css/bootstrap.css") ?>">
	<title>Validações</title>
</head>
<body>
	<section>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
					<?php echo form_open("Validar/Validacao"); ?>
					<form method="POST">
						<p class="lead mt-3 text-center">Validação de dados utilizando expressões regulares</p>
						<div class="form-group">
							<label for="nome">Nome</label>
							<input type="text" class="form-control" id="nome" name="nome">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email">
						</div>
						<div class="form-group">
							<label for="telefone">Telefone</label>
							<input type="telefone" class="form-control" id="telefone" name="telefone">
						</div>
						<div class="form-group">
							<label for="cpf">CPF</label>
							<input type="text" class="form-control" id="cpf" name="cpf">
						</div>
						<p class="lead text-center">Endereço</p>
						<div class="form-group">
							<label for="cep">CEP</label>
							<input type="text" class="form-control" id="cep" name="cep">
						</div>
						<button type="submit" class="btn btn-primary">Cadastrar</button>
					</form>
					<?php echo form_close(); ?>
					</div>
				</div>
			</div>
	</section>
	
	
</body>
</html>