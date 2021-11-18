<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<title>Login</title>
	<meta charset="UTF8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../CSS/index.css">
	<script type="text/javascript" src="../JS/jquery.js"></script>
	<script src="../JS/bootstrap.js"></script>

	<script>
		$(document).on('submit', 'form', function(event) {
			event.preventDefault(); //Parando o submit para manusear os dados e fazer a requisição por ajax
			let formJSON = $(this).serializeArray(); //Transformando form em json [{ name: iemail, value: teste@teste.com }, ...]
			
			$.post('./login.php', formJSON, function(response) {
				let data = JSON.parse(response);
				
				if(data.status == 'error') {
					$('.alert').text(data.mensagem).fadeIn(100).fadeOut(5000);
				}
				else {
					window.location = './home.php';
				}
			});
		});
	</script>
	
</head>

<body>
  <div class="screen">  


<div class="container">
	<form class="form-signin" method="POST">
		<div class="col-lg-4 text-center"></div>
		
		<div class="col-lg-4 text-center">

			<h2><p>Por favor, forneça:</p></h2>
			
			
			 <div class="login-page">
  			<div class="form">
    		<input type="text" class="form-control" name="iemail" placeholder="Email" required="" autofocus="" contenteditable="false">
			<p></p>
			<input type="password" class="form-control" name="isenha" placeholder="Password" required="" contenteditable="false">
			<label class="checkbox">
			<button class="btn btn-lg btn-primary btn-block">Acessar</button>
			
			<div class="alert alert-danger mt-2" role="alert" style="display: none; margin-top: 10px;"></div>
    		</form>
  			</div>
			</div>


		</div>

	 	<div class="col-lg-4 text-center"></div>
	</form>
	</div>
</div>

       
</body>
</html>