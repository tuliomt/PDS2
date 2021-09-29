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
                    <input type="number" class="form-control" name="ibcod" placeholder="Codigo do bEt">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="ibfunc" placeholder="Nome do funcionário">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="ibnome" placeholder="Nome do Animal">
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

          <th>Código bEt</th>
          <th>Nome do funcionário</th>
          <th>Nome Animal</th>
          <th>Horário</th>
          <th>Data</th>
          <th>Descrição do serviço</th>
          <th>Status</th>
          <th>Ações</th>
        </thead>
        <tbody>
          <?php 
					$link = conectar();
					$condicao = "";
					$and = null;
					
          if(isset($_POST['btnPesq'])){
            if($_POST['ibcod'] != NULL || $_POST['ibfunc'] != NULL || $_POST['ibnome'] != NULL){
              $condicao = " WHERE ";
              $and = null;
              if($_POST['ibcod'] != NULL){
                $condicao .= " codigo_bet = ". $_POST['ibcod'];
                $and = true;
              }
              if($_POST['ibfunc'] != NULL){
                if($and){
                  $condicao .= " AND funcionario.nome = '". $_POST['ibfunc']. "'";
                }else{
                  $condicao .= " funcionario.nome = '". $_POST['ibfunc']. "'";
                  $and = true; 
                } 
              }
              if($_POST['ibnome'] != NULL){
                if($and){
                  $condicao .= " AND animal.nome = '". $_POST['ibnome']. "'";
                }else{
                  $condicao .= " animal.nome = '". $_POST['ibnome']. "'";
                  $and = true;
                } 
              }
  
            }
  
          }
			    //$sql = "SELECT banhoEtosa.codigo_bet, banhoEtosa.horario, banhoEtosa.data_prevista, banhoEtosa.descricao, banhoEtosa.status, animal.nome as nome_animal, funcionario.nome as nome_funcionario from banhoEtosa left join animal on banhoEtosa.fk_ani = animal.codigo_ani left join funcionario on banhoEtosa.fk_funcionario = funcionario.codigo_func" . $condicao;
          $sql = "SELECT bet.codigo_bet, bet.horario, bet.data_prevista, bet.descricao, bet.status, animal.nome as nome_animal, funcionario.nome as nome_funcionario from bet left join animal on bet.fk_ani = animal.codigo_ani left join funcionario on bet.fk_func = funcionario.codigo_func" . $condicao;
          $res = mysqli_query($link,$sql); 
         
					while ($dados = mysqli_fetch_array($res)){
						echo "<tr>"; 
						echo "<td>".$dados['codigo_bet']."</td>"; 
						echo "<td>".$dados['nome_funcionario']."</td>";	
						echo "<td>".$dados['nome_animal']."</td>";	
						echo "<td>".$dados['horario']."</td>";	
            echo "<td>".$dados['data_prevista']."</td>";
            echo "<td>".$dados['descricao']."</td>";  
						if($dados['status']==1){
							echo "<td><spam>Ativo</spam></td>";
						}else{
							echo "<td><spam>Desativado</spam></td>";	
						}
						
						$id = base64_encode($dados['codigo_bet']);
						echo "<td><a href='frmbanhoEtosa.php?tela=editar&id=".$id."' title='Editar banhoEtosa'> <spam class='glyphicon glyphicon-pencil'> </spam> </a>";
						echo "<a href='frmbanhoEtosa.php?tela=excluir&id=".$id."' title='Excluir banhoEtosa'> <spam class='glyphicon glyphicon-remove'> </spam> </a>";
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