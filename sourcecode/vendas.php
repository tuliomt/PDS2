<?php 
	include_once 'funcoes.php';

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$fk_cli = $_POST['inomec'];
		$fk_func = $_POST['inomef'];

		if(isset($_POST['cstatus'])) {
			$status = 1;	
		}
		else {
			$status = 0;
		}

		$link = conectar();  

		if($_GET['tela'] == 'cadastrar') {
			$sql = "INSERT INTO vendas (fk_func,fk_cli,status) ";
			$sql .= "VALUES ('$fk_func, $fk_cli, $status)";
			
			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1){
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'venda cadastrada!'
				]);
			}else{
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Erro ao cadastrar venda!'
				]);
			}
		}
	
}else {	
  $link = conectar();
  $sql = "select funcionario.codigo_func, funcionario.nome from funcionario";
  $res = mysqli_query($link,$sql);
  $funcionarios = array();
  while ($dados = mysqli_fetch_array($res)){
    $func = [
      'nome_func' => $dados[1],
      'codigo_func' => $dados[0],
    ];

    array_push($funcionarios, $func);
  }

  $sql = "select cliente.codigo_cli, cliente.nome from cliente";
  $res = mysqli_query($link,$sql);
  $clientes = array();
  while ($dados = mysqli_fetch_array($res)){
    $cli = [
      'nome_cli' => $dados[1],
      'codigo_cli' => $dados[0],
    ];

    array_push($clientes, $cli);
  }

  $data = [];

  if(isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $sql = "SELECT * from vendas where codigo_vendas = {$id} LIMIT 1";
    $resVendas = mysqli_query($link, $sql);
    while ($linhas = mysqli_fetch_array($resVendas)){
      $data = $linhas;
    }	
  }


  echo json_encode([
    'status' => 'success', 
    'mensagem' => 'vendas recuperadas',
    'data' => [
      'funcionarios' => $funcionarios,
      'clientes' => $clientes,
    ]
  ]);





  desconectar($link);
}
 ?>