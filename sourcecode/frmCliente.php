<?php require_once "funcoes.php";

verificaPermissao();

if(isset($_GET['sair'])) {
	if($_GET['sair'] == true){
		session_destroy();
		redireciona('index.php');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.css">
	
	<script type="text/javascript" src="../JS/jquery.js"></script>
	<script src="../JS/bootstrap.js"></script>

	<script>
		$(document).ready(function() {
			if($('form').attr('action') != 'tela=cadastrar') {
				$.get(`./cliente.php?id=${$('input[name=icod]').val()}`, function(response) {
					let data = JSON.parse(response);

					if(data.status == 'success') {
						let cliente = data.data[0];

						$('input[name=inome]').val(cliente.nome);
						$('input[name=icpf]').val(cliente.cpf);
						$('input[name=ifoneres]').val(cliente.tel);
						$('input[name=ifonecel]').val(cliente.cel);
						$('input[name=iemail]').val(cliente.email);
						$('input[name=cstatus]').prop('checked', +cliente.status == 1);
					}
				});
			}
		});

		$(document).on('submit', 'form', function(event) {
			event.preventDefault();
			let formJSON = $(this).serializeArray();
			
			$.post(`./cliente.php?${$(this).attr('action')}`, formJSON, function(response) {
				let data = JSON.parse(response);
				
				if(data.status == 'error') {
					$('.alert').removeClass('alert-success').addClass('alert-danger')
					.text(data.mensagem).fadeIn(100).fadeOut(5000);
				}
				else {
					$('.alert').removeClass('alert-danger').addClass('alert-success')
					.text(data.mensagem).fadeIn(100).fadeOut(5000);
				}
			});
		});
	</script>
</head>
<body>
	<div class="navbar-collapse collapse">

				    <ul class="nav navbar-nav navbar-left">
						<li class="active"><a href="home.php">Home</a></li>
						<li class="dropdown ">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consulta<b class="caret"></b></a>
						    <ul class="dropdown-menu">
						    </ul>
						</li>			
						<li class="dropdown ">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produtos<b class="caret"></b></a>
						    <ul class="dropdown-menu">

							<li class="divider"></li>
						    </ul>
						</li>
						<li class="dropdown">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Animal<b class="caret"></b></a>
						    <ul class="dropdown-menu">
							<li class="divider"></li>
						    </ul>
						</li>

						<li class="dropdown">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cliente<b class="caret"></b></a>
						    <ul class="dropdown-menu">
							<li><a href="frmCliente.php?tela=cadastrar">Cadastrar</a></li>
							<li><a href="conCliente.php">Consultar</a></li>

							<li class="divider"></li>
						    </ul>
						</li>

						<li class="dropdown">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Funcionário<b class="caret"></b></a>
						    <ul class="dropdown-menu">
						    <li><a href="frmFuncionario.php?tela=cadastrar">Cadastrar</a></li>
							<li><a href="conFuncionario.php">Consultar</a></li>
						    </ul>
						</li>

						<li class="dropdown">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Banho e Tosa<b class="caret"></b></a>
						    <ul class="dropdown-menu">
						    </ul>
						</li>

						<li class="dropdown">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Vendas<b class="caret"></b></a>
						    <ul class="dropdown-menu">
						    </ul>
						</li>

							
						</li>
						
				    </ul>
				</div>
	</div>	
	<div class="container">
		<div class="row">
			<form class="form-horizontal" method="POST" action="<?php echo implode('&', array_map(function ($key, $value) { return "$key=$value"; }, array_keys($_GET), $_GET)); ?>">
				<fieldset>
					<div class="form-group">
				        <label class="control-label col-xs-2">Nome</label>
				        <div class="col-xs-5">
				            <input type="text" class="form-control" required name="inome" placeholder="Nome Completo" value="">
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-xs-2">CPF</label>
				        <div class="col-xs-5">
				            <input type="number" class="form-control" min="1" required name="icpf" placeholder="CPF" value="">
							<input type="hidden" name="icod" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>"/>
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-xs-2">Telefone Residencial</label>
				        <div class="col-xs-5">
				            <input type="tel" class="form-control"  min="1" required name="ifoneres" placeholder="Telefone Residencial" value="">
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-xs-2">Telefone Celular</label>
				        <div class="col-xs-5">
				            <input type="tel" class="form-control"  min="1" required name="ifonecel" placeholder="Telefone Celular" value="">
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-xs-2">Email</label>
				        <div class="col-xs-5">
				            <input type="email" class="form-control" required name="iemail" placeholder="Email" value="">
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="col-xs-offset-2 col-xs-5">
				            <div class="checkbox">
				                <label><input type="checkbox" name="cstatus">Ativar</label>
				            </div>
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="col-xs-offset-2 col-xs-10">
				            <button type="submit" class="btn btn-primary" name="btnCad"><?php echo ucfirst($_GET['tela']); ?></button>
				        </div>
				    </div>
			    </fieldset>

				<div class="alert mt-2 text-center" role="alert" style="display: none; margin-top: 10px;"></div>
			</form>
		</div>
	</div>

</body>
</html>