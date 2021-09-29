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
<html lang="pt_BR">

<head>
  <title></title>
  <meta charset="UTF8" />
  <link rel="stylesheet" type="text/css" href="../CSS/bootstrap.css">

  <script type="text/javascript" src="../JS/jquery.js"></script>
  <script src="../JS/bootstrap.js"></script>

  
</head>

<body>
<div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-left">
        <li class="active"><a href="home.php">Home</a></li>
        <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consulta<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="frmConsulta.php?tela=cadastrar">Cadastrar</a></li>
            <li><a href="conConsulta.php">Consultar</a></li>

            <li class="divider"></li>
          </ul>
        </li>
        <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Veterinário<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="frmVet.php?tela=cadastrar">Cadastrar</a></li>
            <li><a href="conVet.php">Consultar</a></li>

            <li class="divider"></li>
          </ul>
        </li>
        <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produto<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="frmProduto.php?tela=cadastrar">Cadastrar</a></li>
            <li><a href="conProduto.php">Consultar</a></li>

            <li class="divider"></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Animal<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="frmAnimal.php?tela=cadastrar">Cadastrar</a></li>
            <li><a href="conAnimal.php">Consultar</a></li>

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
            <li><a href="frmbanhoEtosa.php?tela=cadastrar">Cadastrar</a></li>
            <li><a href="conbanhoEtosa.php">Consultar</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Vendas<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="frmVendas.php?tela=cadastrar">Cadastrar</a></li>
            <li><a href="conVendas.php">Consultar</a></li>
          </ul>
        </li>
        </li>

      </ul>
    </div>
</body>

</html>