<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<title></title>
	<meta charset="UTF8"/>
	<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.css">
	
	<script type="text/javascript" src="../JS/jquery.js"></script>
	<script src="../JS/bootstrap.js"></script>
</head>
<body>
	<div class="navbar navbar-default" role="navigation">
	    <div class="container">
			<div class="navbar-collapse collapse">

			     <ul class="nav navbar-nav navbar-left">
						<li class="active"><a href="home.php">Home</a></li>
						<li class="dropdown ">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consulta<b class="caret"></b></a>
						    <ul class="dropdown-menu">
						    </ul>
						</li>			
						<li class="dropdown ">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produto<b class="caret"></b></a>
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

							<li class="dropdown">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produtos<b class="caret"></b></a>
						    <ul class="dropdown-menu">
						    </ul>
						</li>
						
				    </ul>

			</div><!--/.nav-collapse -->
	    </div>
	</div>
<div class="container">
	<div class="row">
		<div class="panel-group" id="accordion">
		  	<div class="panel panel-default">
		        <div class="panel-heading">
		          <h4 class="panel-title">
		            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Busca</a>
		          </h4>
		        </div>
		        <div id="collapseOne" class="panel-collapse collapse in">
		          <div class="panel-body">
		            
		            <form class="form-inline" method="POST" action="">
						<fieldset>
							<div class="form-group">
						    	<input type="number" class="form-control" name="ibcpf" placeholder="CPF do Funcionario">
						    </div>
						    <div class="form-group">
						        <input type="text" class="form-control" name="ibnome" placeholder="Nome do Funcionario">
						    </div>
						    <div class="form-group">
						        <input type="text" class="form-control" name="ibemail" placeholder="Email do Funcionario">
						    </div>
						    <div class="form-group">
						            <button type="submit" class="btn btn-primary" name="btnPesq">
						            	<i class="glyphicon glyphicon-search"> Pesquisar </i>
						            </button>
						    </div>
					    </fieldset>
					</form>
		          </div>
		        </div>
		  	</div>
		</div>
	

		

	</div>
</div>



</body>
</html>
