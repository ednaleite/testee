
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

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
			<form style="font-size: 18px" method="post" action="etiqueta.php">
				

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

	</form>

</div>
</div>

</body>
</html>

<script type="text/javascript">

	$(document).ready(function() {
   		$('principal').hide();
	});

	function onload(callback) {
  		setTimeout(function() {
    		window.print();
    		callback(redirect('index.php'));
  		}, 100);
	}
onload(history);

</script>