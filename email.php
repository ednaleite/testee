<?php
	include('gerar_pdf.php');
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'vendor/autoload.php';
	
	$Mailer = new PHPMailer();
	
	//Define que será usado SMTP
	$Mailer->IsSMTP();
	
	//Aceitar carasteres especiais
	$Mailer->Charset = 'UTF-8';
	
	//Configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'ssl';
	
	//nome do servidor
	$Mailer->Host = 'mail.trttransporteturismo.com.br';
	//Porta de saida de e-mail 
	$Mailer->Port = 465;
	
	//Dados do e-mail de saida - autenticação
	$Mailer->Username = 'etiqueta@trttransporteturismo.com.br';
	$Mailer->Password = 'Q1w2e3r4t5+';
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = 'etiqueta@trttransporteturismo.com.br';
	
	//Nome do Remetente
	$Mailer->FromName = $_SESSION['remetente'];
	
	//Assunto da mensagem
	$Mailer->Subject = 'TRT Transportadora';
	
	//Corpo da Mensagem
	$Mailer->Body = 'Segue o anexo da TRT Transporte e Turismo solicitado!';
	
	//Destinatario 
	$Mailer->AddAddress($_SESSION['confemail']);

	$Mailer->AddAttachment('arquivos/'.$arquivo);
	
	if($Mailer->Send()){
		$_SESSION['sucesso'] = 'sucesso';
	}else{
		echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
	}
?>
