<?php
	session_start();
	

		@$_SESSION['nomedestinatario'] = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),@$_POST['nomedestinatario']);
		@$_SESSION['nomedestinatario2'] = str_replace(' ', '', @$_SESSION['nomedestinatario']);
		@$_SESSION['destino'] = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),@$_POST['destino']);
		@$_SESSION['telefonedestinatario'] = @$_POST['telefone'];
		@$_SESSION['obs'] = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),@$_POST['obs']);
		@$_SESSION['telefoneremetente'] = @$_POST['telefone2'];
		@$_SESSION['telefonedestinatario2'] = "55".preg_replace('/[^\p{L}\p{N}\s]/', '', @$_SESSION['telefonedestinatario'] );
		@$_SESSION['remetente'] = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),@$_POST['remetente']);
		@$_SESSION['confemail'] = str_replace(' ', '', @$_POST['confemail']);

		@$_SESSION['mensagem'] = str_replace(' ', '%20', "Olá ".@$_SESSION['nomedestinatario'].",a TRT transporte turismo informa que o(a) ".@$_SESSION['remetente']." entregou um pacote para você que esta indo para".@$_SESSION['destino']."obs: os clientes do interior da bahia tem seus encaminhamentos, toda quarta feira.");
		@$_SESSION['linkdoQR'] = 'qr_img0.50j/php/qr_img.php?d=https://wa.me/'.@$_SESSION['telefonedestinatario2'].'/?text='.@$_SESSION['mensagem'].'.&e=Q&s=3&t=J';

?>

<html>
<head>
	<title></title>
		<!-- Scripts do bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-
awesome/4.7.0/css/font-awesome.min.css">

	<!-- Scripts da máscara -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"> </script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
 	<script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

 	<link rel="stylesheet" type="text/css" href="css.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	

</head>

<body>

	<div id="principal" style="display:block">

	<div id="imgt">
		<div style="display: flex; flex-direction: row">
			<img src="logo.jpeg"  id="imagem">
			<div id="title">TRT Transporte & Turismo</div>
		</div>
	</div>
		
	<form style="margin-top: 4%; font-size: 20px" method="post" action="index.php">
	<div class="divresolucao">
		<div id="divdest">
		Nome do destinatário<br>
			<input type="text" name="nomedestinatario"  required>
			<br><br>Fone</b><br>
	 		<input type="text" name="telefone" id="telefone" required>

			<br><br>Destino</b><br><br>
			<select name="destino" class="form-control" id="select">
				<?php
				include('cidades.php');
				foreach ($cidades as $cidade) {
					echo '<option value="'.$cidade.'">'.$cidade.'</option>';
				}
				?>
			</select>
		</div>

		<div id="divrem">
			Remetente<br>
			<input type="text" name="remetente" required><br><br>
			Fone <br>
			<input type="text" name="telefone2" id="telefone2" required><br><br>
			Observações<br>
			<input type="text" name="obs" required><br><br>
		</div>
	</div>
	
	<br>
	<div id="divbuttons"> 

	<button type="submit" name="Imprimir" value="Gerar etiqueta" class="btn btn-danger">Gerar etiqueta&nbsp<i class="fa fa-file" id="btimprimir"></i></button>&nbsp&nbsp
  				
	<button type="button" value="Enviar por Email" class="btn btn-dark" data-toggle="modal" data-target="#confirmaremail" id="btemail">Enviar por email&nbsp<i class="fa fa-envelope"></i></button>
	   
		
	</div>
	

</div>


<div id="imprimir" style="display:none">
		<div style="display: flex; flex-direction: row; justify-content: space-between; width:100%">
			<img src="logo.jpeg" style="width: 230px; height: 240px; border-radius: 6px 6px">
			<div style="font-size: 35px; margin-left: 1%; margin-top: 2%">Enviar por</div>
			<div style=" margin-top: 8%; font-size: 45px; margin-left: -19%; padding: 20px">TRT Transporte & Turismo</div>
			<div >
	<?php
		echo "<img src=".$_SESSION['linkdoQR'].">";
	?>
</div>
		</div>

	<div style="width: 100%">
		<br>
		<hr style="width:98%;border: 0.5px solid black;">
				

				<div style="display:flex;justify-content: space-between; flex-direction: column; font-size: 22px">

				<div>
					<span style="font-size: 60px"><b>Destino</b></span><span style="font-size: 60px">&nbsp&nbsp<?php echo $_SESSION['destino']; ?></span>
				</div>

				<div>
					<br><span style="font-size: 60px"><b>Fone</b></span><span style="font-size: 60px">&nbsp&nbsp<?php echo $_SESSION['telefonedestinatario']; ?></span>
					
				</div>
			</div>

			<div style="display:flex;justify-content: space-between; flex-direction: row; font-size: 22px">


				<div style ="display:flex;justify-content: space-between; flex-direction:column">
				<br>
			<div style="font-size: 60px">
				<b>Destinatário </b>
			<?php echo $_SESSION['nomedestinatario']; ?><br>
		       
			</div>
			<hr style="width:217%; border: 0.5px solid black;">
			<div >
	
			<div style="font-size: 47px">
			<b>Remetente</b>
			<?php echo $_SESSION['remetente']; ?><BR>


			<b>Fone</b>
			<?php echo $_SESSION['telefoneremetente']; ?><br>


			<b>Observações</b>
			<?php echo $_SESSION['obs']; ?>
			</div>
		</div>
			</div>
		</div>




		

	

</div>
</div>
<div class="modal fade" id="confirmaremail" tabindex="-1" role="dialog" aria-labelledby="confirmaremailTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 90%">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmação de envio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Digite seu email &nbsp <input type="text" name="confemail" id="textmodal">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark " data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-danger" name="Email">Enviar</button>
      </div>
    </div>
  </div>
</div>
</form>
</body>
</html>


<script  type="text/javascript">
		$("input[id*='telefone']").inputmask({
	  mask: ['(99)9999-9999', '(99)99999-9999'],
	  keepStatic: true
	});
		function voltar(){
			document.getElementById('principal').style.display = 'block';
	  		document.getElementById('imprimir').style.display = 'none';
		}

		function onload(callback) {
	  		setTimeout(function() {
	  			document.getElementById('principal').style.display = 'none';
	  			document.getElementById('imprimir').style.display = 'block';
	    		window.print();
	    		callback(voltar());
	  		}, 100);
		}

	</script>

	<?php
	if (isset($_POST['Email'])) {

		include('email.php');

		if (@$_SESSION['sucesso']) {
		echo "<script>alert('Email enviado com sucesso!')</script>";
		session_destroy();
	}

	}else if (isset($_POST['Imprimir'])) {

		echo "<script> onload(history) </script>";

	}


	?>