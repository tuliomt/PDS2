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
  <title>Cadastro Consulta</title>

  <meta charset="UTF8" /> 
  <link rel="stylesheet" type="text/css" href="../CSS/bootstrap.css">

  <script type="text/javascript" src="../JS/jquery.js"></script>
  <script src="../JS/bootstrap.js"></script>
  <script>
  $(document).ready(function() {
    if ($('form').attr('action') != 'tela=cadastrar') {
      $.get(`./banhoEtosa.php?id=${$('input[name=icod]').val()}`, function(response) {
        let res = JSON.parse(response);

        if (res.status == 'success') {
          const bet = res.data.bet;
          const funcionarios = res.data.funcionarios;
          const animais = res.data.animais;

          funcionarios.forEach(funcionario => {
            $('select[name=inomev]').append(`
              <option value="${funcionario.codigo_func}">${funcionario.nome}</option>
            `);
          });

          animais.forEach(animal => {
            $('select[name=inomea]').append(`
              <option value="${animal.codigo_ani}">${animal.nome} - ${animal.cliente}</option>
            `);
          })


         $('select[name=inomev]').val(bet.fk_func);
          $('select[name=inomea]').val(bet.fk_ani);
          $('input[name=iho]').val(bet.horario);
          $('input[name=idata]').val(bet.data_prevista);
          $('textarea[name=txtdesc]').val(bet.descricao);
          $('input[name=cstatus]').prop('checked', + bet.status == 1);
        }
      });
    } else {
      $.get(`./banhoEtosa.php`, function(response) {
        let data = JSON.parse(response);
        if (data.status == 'success') {
          let funcionarios = data.data.funcionarios;
          let animais = data.data.animais;

          animais.forEach(animal => {
            $('select[name=inomea]').append(
              `<option value='${animal.codigo_ani}'> ${animal.nome} - ${animal.cliente} </option>`)
          })

          funcionarios.forEach(funcionario => {

            $('select[name=inomev]').append(
              `<option value='${funcionario.codigo_func}'> ${funcionario.nome}</option>`);
          });
        }
      });
    }
  });

  $(document).on('submit', 'form', function(event) {
    event.preventDefault();
    let formJSON = $(this).serializeArray();

    $.post(`./banhoEtosa.php?${$(this).attr('action')}`, formJSON, function(response) {
      let data = JSON.parse(response);

      if (data.status == 'error') {
        $('.alert').removeClass('alert-success').addClass('alert-danger')
          .text(data.mensagem).fadeIn(100).fadeOut(5000);
      } else {
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
      <form class="form-horizontal" method="POST"
        action="<?php echo implode('&', array_map(function ($key, $value) { return "$key=$value"; }, array_keys($_GET), $_GET)); ?>">
        <fieldset>
          <div class="form-group">
            <label class="control-label col-xs-2">Funcionário</label>
            <div class="col-xs-5">
              <select class="form-control" required name="inomev">
                <option></option>
              </select>
            </div>
          </div>
          <input type="hidden" name="icod" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>" />
          <div class="form-group">
            <label class="control-label col-xs-2">Animal</label>
            <div class="col-xs-5">
              <select class="form-control" required name="inomea">
                <option></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-2">Horário</label>
            <div class="col-xs-5">
              <input type="time" class="form-control" required name="iho" placeholder="Horário" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-2">Data</label>
            <div class="col-xs-5">
              <input type="date" class="form-control" required name="idata" placeholder="Data" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-2">Descrição do serviço</label>
            <div class="col-xs-5">
              <textarea class="form-control" name="txtdesc" placeholder="Descricao detalhada do serviço"></textarea>
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