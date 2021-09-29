<?php 
	include_once 'funcoes.php';

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$datap = $_POST['idata'];
		$fk_ani = $_POST['inomea']; 
		$fk_func = $_POST['inomev'];
		$descr = $_POST['txtdesc'];
		$hora = $_POST['iho'];
		$data = date("Y-m-d");

		if(isset($_POST['cstatus'])) {
			$status = 1;	
		}
		else {
			$status = 0;
		}

		$link = conectar();  

		if($_GET['tela'] == 'cadastrar') {
			$sql = "INSERT INTO bet (horario,data_prevista,descricao,fk_func,fk_ani,status) ";
			$sql .= "VALUES ('$hora', '$datap','$descr', $fk_func, $fk_ani,$status)";
			
			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1){
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'bet cadastrado!'
				]);
			}else{
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Erro ao cadastrar bet!'
				]);
			}
		}
		
	
		else if($_GET['tela'] == 'excluir') {
			$id = base64_decode($_POST['icod']);
	
			$sql = "DELETE FROM bet WHERE codigo_bet = $id";
			
			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1){
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'bet excluido!'
				]);
			}else{
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Erro ao excluir bet!'
				]);
			}
		}

		else if($_GET['tela'] == 'editar') {
			$id = base64_decode($_POST['icod']);
			$sql = "UPDATE bet";
			$sql .= " SET fk_func = {$fk_func}, fk_ani = {$fk_ani}, horario = '{$hora}', data_prevista = '{$datap}', descricao = '{$descr}', status = '{$status}'";
			$sql .= " WHERE codigo_bet = {$id}";

			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1){
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'bet editado!'
				]);
			}else{
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Erro ao editar bet!'
				]);
			}
		}
			
		desconectar($link);
	}
	else {	
		$link = conectar();
		$sql = "select funcionario.codigo_func, funcionario.nome from funcionario";
		$res = mysqli_query($link,$sql);
		$funcionarios = array();
		while ($dados = mysqli_fetch_array($res)){
			$funcionario = [
				'nome' => $dados[1],
				'codigo_func' => $dados[0],
			];

			array_push($funcionarios, $funcionario);
		}

		$sql = "SELECT animal.codigo_ani, animal.nome, cliente.nome FROM animal left join cliente on animal.codigo_cli = cliente.codigo_cli";
		$res2 = mysqli_query($link,$sql);
		$animais = array();
		while ($linhas = mysqli_fetch_array($res2)){
			$animal = [
				'codigo_ani' => $linhas[0],
				'nome' => $linhas[1],
				'cliente' => $linhas[2],
			];

			array_push($animais, $animal);
		}

		$data = [];

		if(isset($_GET['id'])) {
			$id = base64_decode($_GET['id']);
			$sql = "SELECT * from bet where codigo_bet = {$id} LIMIT 1";
			$resbet = mysqli_query($link, $sql);
			while ($linhas = mysqli_fetch_array($resbet)){
				$data = $linhas;
			}	
		}


		echo json_encode([
			'status' => 'success', 
			'mensagem' => 'bet recuperados',
			'data' => [
				'funcionarios' => $funcionarios,
				'animais' => $animais,
				'bet' => $data,
			]
		]);
		desconectar($link);
	}
 ?>