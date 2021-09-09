<?php 
	include_once 'funcoes.php';

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$datap = $_POST['idata'];
		$fk_ani = $_POST['inomea'];
		$fk_vet = $_POST['inomev'];
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
			$sql = "INSERT INTO consulta (horario,data_prevista,descricao,fk_vet,fk_ani,status) ";
			$sql .= "VALUES ('$hora', '$datap','$descr', $fk_vet, $fk_ani,$status)";
			
			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1){
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'consulta cadastrada!'
				]);
			}else{
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Erro ao cadastrar consulta!'
				]);
			}
		}
		else if($_GET['tela'] == 'excluir') {
			$id = base64_decode($_POST['icod']);
	
			$sql = "DELETE FROM consulta WHERE codigo_con = $id";
			
			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1){
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'consulta excluída!'
				]);
			}else{
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Erro ao excluir consulta!'
				]);
			}
		}
			
		desconectar($link);
	}
	else {	
		$link = conectar();
		$sql = "select vet.codigo_vet, vet.nome from vet";
		$res = mysqli_query($link,$sql);
		$veterinarios = array();
		while ($dados = mysqli_fetch_array($res)){
			$vet = [
				'nome_vet' => $dados[1],
				'codigo_vet' => $dados[0],
			];

			array_push($veterinarios, $vet);
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


		echo json_encode([
			'status' => 'success', 
			'mensagem' => 'consultas recuperadas',
			'data' => [
				'veterinarios' => $veterinarios,
				'animais' => $animais,
			]
		]);





		desconectar($link);
	}
 ?>