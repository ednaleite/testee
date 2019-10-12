<?php

	include ('mpdf60/mpdf.php');

	$pagina = 
		"<div>
		<div style='display: flex; flex-direction: row; justify-content: space-between; width:100%'>
			<img src='logo.jpeg' style='width: 120px; height: 125px; border-radius: 6px 6px; margin-top: -4%'>
			<div style='font-size: 23px; margin-left: 24%; margin-top: -18%'>Enviar por</div>
			<div style=' margin-top: 2%; font-size: 30px; margin-left: 24%'>TRT Transporte & Turismo</div>
			<div style=' margin-top: -12%; font-size: 30px; margin-left: 85%'>
			<img src='".$_SESSION['linkdoQR']."'>

			</div>
		</div>

	<div style='width: 100%'>
	<br><br>
		<hr style='width:98%;border: 2px solid black'>
		
			<form style='font-size: 18px' method='post' action='etiquetaphp'>
				<div style='display:flex;justify-content: space-between; flex-direction: column; font-size: 22px'>

				<div>
					<span style='font-size: 30px'><b>Destino</b></span><span style='font-size: 36px'> ".$_SESSION['destino']." </span>
				</div>

				<div>
					<br><span style='font-size: 30px'><b>Fone</b></span><span style='font-size: 36px'> ".$_SESSION['telefonedestinatario']."</span>
					
				</div>
			</div>
					<br>
			<div style='display:flex;justify-content: space-between; flex-direction: row; font-size: 22px'>


				<div style ='display:flex;justify-content: space-between; flex-direction:column'>
			<div style='font-size: 30px'>
				<b>Destinatário </b>
			<span style='font-size: 36px'>".$_SESSION['nomedestinatario']."</span>
		
			</div>
		<hr style='width:217%; border: 0.5px solid black'>
			<div >
	
			<div style='font-size: 22px'>
			<b>Remetente</b>
			".$_SESSION['remetente']."<BR>


			<b>Fone</b>
			".$_SESSION['telefoneremetente']."<br>


			<b>Observações</b>
			".$_SESSION['obs']."
			</div>
		</div>
			</div>
		</div>

	</form>

</div>
</div>
		";

date_default_timezone_set('America/Sao_Paulo');
$hoje = date("d-m-Y");
$arquivo = str_replace('ç','c',$_SESSION['nomedestinatario2']."_".$hoje.".pdf");

$mpdf = new mPDF();
$mpdf->WriteHTML($pagina);

$mpdf->Output('arquivos/'.$arquivo, 'F');

// I - Abre no navegador
// F - Salva o arquivo no servido
// D - Salva o arquivo no computador do usuário
?>
