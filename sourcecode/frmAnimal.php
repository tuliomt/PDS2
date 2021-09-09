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

  <script>
  $(document).ready(function() {
    if ($('form').attr('action') != 'tela=cadastrar') { //
      $.get(`./animal.php?id=${$('input[name=icod]').val()}`, function(response) {
        let data = JSON.parse(response);

        if (data.status == 'success') {
          let animal = data.data[0];

          $('input[name=inomea]').val(animal.nome);
          $('textarea[name=txtraca]').text(animal.raca);
          $('input[name=idade]').val(animal.idade);

          $('textarea[name=txtcategoria]').text(animal.categoria);
          $('input[name=ipreco]').val(animal.preco);
          $('input[name=cstatus]').prop('checked', +animal.status == 1);
        }
      });
    }
  });

  $(document).on('submit', 'form', function(event) {
    event.preventDefault(); //Parando o submit para manusear os dados e fazer a requisição por ajax
    let formJSON = $(this).serializeArray();

    $.post(`./animal.php?${$(this).attr('action')}`, formJSON, function(response) {
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
      <form class="form-horizontal" method="POST"
        action="<?php echo implode('&', array_map(function ($key, $value) { return "$key=$value"; }, array_keys($_GET), $_GET)); ?>">
        <fieldset>
          <div class="form-group">
            <label class="control-label col-xs-2">Nome</label>
            <div class="col-xs-5">
              <input type="text" required class="form-control" name="inomea" placeholder="Nome do Animal" value="">
              <input type="hidden" name="icod" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>" />
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-2">Raça</label>
            <div class="col-xs-5">
              <textarea class="form-control" name="txtraca" placeholder="Raça"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-2">Idade</label>
            <div class="col-xs-5">
              <input type="text" class="form-control" required name="idade" placeholder="Idade" value="">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-2">Categoria</label>
            <div class="col-xs-5">
              <textarea class="form-control" name="txtcategoria" placeholder="Categoria do Animal"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-2">Preço</label>
            <div class="col-xs-5">
              <input type="text" class="form-control" required name="ipreco" placeholder="Preço" value="">
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
              <button type="submit" class="btn btn-primary"><?php echo ucfirst($_GET['tela']); ?></button>
            </div>
          </div>
        </fieldset>

        <div class="alert mt-2 text-center" role="alert" style="display: none; margin-top: 10px;"></div>
      </form>
    </div>
  </div>



</body>

</html>