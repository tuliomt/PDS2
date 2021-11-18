<?php 
	include_once 'funcoes.php';

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$nome = $_POST['inomep'];
		$cpf = $_POST['icpf'];
		$crmv = $_POST['crmv'];

		if(isset($_POST['cstatus'])) {
			$status = 1;	
		}
		else {
			$status = 0;
		}

		$link = conectar();

		if($_GET['tela'] == 'cadastrar') {
			$sql = "INSERT INTO vet(nome,cpf,crmv,status) VALUES ('{$nome}',{$cpf},'{$crmv}',{$status})";

			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1) {
				//Cadastrado com sucesso
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'Veterinário cadastrado!'
				]);
			}
			else {
				//Erro ao cadastrar
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Ocorreu algum erro ao cadastrar!'
				]);
			}
		}
		else if($_GET['tela'] == 'editar') {
			$id =  base64_decode($_GET['id']);

			$sql = "UPDATE vet SET nome = '$nome', cpf = '$cpf', crmv = '$crmv', status = $status";
			$sql .= " WHERE codigo_vet = $id";

			mysqli_query($link,$sql);
			if(mysqli_affected_rows($link)==1) {
				//Editado com sucesso
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'O Veterinário foi editado!'
				]);
			}
			else {
				//Erro ao deditar
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Ocorreu algum erro ao editar!'
				]);
			}
		}
		else if($_GET['tela'] == 'excluir') {
			$id =  base64_decode($_GET['id']);
			
			$sql = "DELETE FROM vet WHERE codigo_vet = $id";
	
			mysqli_query($link, $sql);
			if(mysqli_affected_rows($link)==1) {
				//Deletado com sucesso
				echo json_encode([
					'status' => 'success', 
					'mensagem' => 'O veterinário foi deletado!'
				]);
	
			}
			else {
				//Erro ao deletar
				echo json_encode([
					'status' => 'error', 
					'mensagem' => 'Ocorreu algum erro ao deletar!'
				]);
			}
		}
			
		desconectar($link);
	}
	else {
		if(isset($_GET['id'])) {
			$id = base64_decode($_GET['id']);

			$link = conectar();

			$sql = "SELECT * FROM vet WHERE codigo_vet = {$id} LIMIT 1";
			$res = mysqli_query($link,$sql);

			$vets = array();

			while ($dados = mysqli_fetch_array($res)) {
				$vet = [
					'nome' => $dados['nome'],
					'cpf' => $dados['cpf'],
					'crmv' => $dados['crmv'],
					'status' => $dados['status']
				];

				array_push($vets, $vet);
			}

			echo json_encode([
				'status' => 'success', 
				'mensagem' => 'vets recuperados',
				'data' => $vets
			]);

			desconectar($link);
		}
	}
 ?>