<?php include_once 'funcoes.php'; 

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
          <li><a href="convet.php">Consultar</a></li>

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
                    <input type="number" class="form-control" name="ibcod" placeholder="Codigo da consulta">
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

      <table cellpadding="0" cellspacing="0" class="table">
        <thead>

          <th>Código</th>
          <th>Veterinário</th>
          <th>Animal</th>
          <th>Horário</th>
          <th>Data</th>
          <th>Descrição</th>
          <th>Status</th>
          <th>Ações</th>
        </thead>
        <tbody>
          <?php 
					$link = conectar();
					$condicao = "";
					$and = null;
					if(isset($_POST['btnPesq'])){
						if($_POST['inomev'] != NULL || $_POST['icod'] != NULL){
							$condicao = " WHERE ";
							if($_POST['inomev'] != NULL){
								$condicao .= " nome LIKE '%". $_POST['inomev'] ."%'";
								$and = true;
							}
							if($_POST['icod'] != NULL){
								if($and){
									$condicao .= " AND codigo_con = ". $_POST['icod'] ;
								}else{
									$condicao .= " codigo_con = ". $_POST['icod'] ;
								}
							}
						}
					}



					$sql = "SELECT * FROM consulta " . $condicao;
					
					$res = mysqli_query($link,$sql);
					while ($dados = mysqli_fetch_array($res)){
						echo "<tr>";
						echo "<td>".$dados['codigo_con']."</td>";
						echo "<td>".$dados['veterinário']."</td>";	
						echo "<td>".$dados['Animal']."</td>";	
						echo "<td>".$dados['Hora']."</td>";	
            echo "<td>".$dados['Data']."</td>";
            echo "<td>".$dados['Descrição']."</td>";
						if($dados['status']==1){
							echo "<td><spam>Ativo</spam></td>";
						}else{
							echo "<td><spam>Desativado</spam></td>";	
						}
						
						$id = base64_encode($dados['codigo_con']);
						echo "<td><a href='frmConsulta.php?tela=editar&id=".$id."' title='Editar Consulta'> <spam class='glyphicon glyphicon-pencil'> </spam> </a>";
						echo "<a href='frmConsulta.php?tela=excluir&id=".$id."' title='Excluir Consulta'> <spam class='glyphicon glyphicon-remove'> </spam> </a>";
						echo "</td>";
						echo "</tr>";
					}
					desconectar($link);
					?>

        </tbody>

      </table>
    </div>
  </div>



</body>

</html>