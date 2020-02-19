<?php include("includes/topo.php"); ?>

<?php
if(isset($_GET['action']) && $_GET['action']==1){
	
	
	
		require_once("email_autenticado/class.phpmailer.php");
		
		
		function envia_email($assunto,$mensagem,$email){
				
			$mail = new PHPMailer;	
			$mail->SMTPDebug =0;                 	
			//$mail->isSMTP();                    
			$mail->Host = "srv74.prodns.com.br";
			$mail->Username = 'site@hpiedade.com.br';
			$mail->Password = "bJ5.sWA0am*8";
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->setFrom('site@hpiedade.com.br', 'Site HNSP');
			$mail->addAddress($email, 'Site HNSP');						
			$mail->isHTML(true);                              			
			$mail->Subject = $assunto;
			$mail->Body    = $mensagem;
			
			if(!$mail->send()) {
					//echo 'Mailer Error: ' . $mail->ErrorInfo;
					return 0;
			} else {
					return 1;
			}
						
		}


		///MENSAGEM QUE VAI PARA O CLIENTE//
		$body = '<table cellspacing="0" style="font-family: Helvetica; font-size: 13px; width:600px; margin: 0 auto; border: 1px solid #D2D2D2;">';
	    $body.= '<tr>';
	    $body.= '<td colspan="2" style="padding:18px"><img src="http://hpiedade.com.br/novosite/interface/logo.png" style="width: 136px; margin: 0 auto; display: block;" alt=""></td>';
	    $body.= '</tr>';
	    $body.= '<tr><td style="padding:18px;">';
	    $body.= '<h2>Novo Contato</h2>';
	    $body.= '<h3>Dados do Contato:</h3>';
	    
		$body.= '<p><strong>Nome:</strong> '.$nome.'</p>';
	    $body.= '<p><strong>Email:</strong> '.$email.'</p>';
		$body.= '<p><strong>Assunto:</strong> '.$assunto.'</p>';
		$body.= '<p><strong>Tem interesse em receber nossas novidades:</strong> '.$novidade.'</p>';
		$body.= '<p><strong>Ja utilizou os serviços do HNSP:</strong> '.$utilizou.'</p>';

		$body.= '<p><strong>Mensagem:</strong><br> '.nl2br($mensagem).'</p>';
		
	    $body.= '<p><small>ENVIADO EM '.@date('d/m/Y \à\s H:i').'</small></p>';
		$body.= $aviso;
	    $body.= '</td></tr></table>';
		////////
	
	
		envia_email('Novo Contato Site',$body,'contato@hpiedade.com.br');//EMAIL C4;
	
	
	
	
	echo '<script>alert("Mensagem enviada com sucesso.")</script>';	
	
	
	
}



if(isset($_GET['action']) && $_GET['action']==2){
	
		$nomeArquivo = trim($_FILES["arquivo"]["name"]);
		$tamanhoArquivo = $_FILES["arquivo"]["size"];
		$nomeTemporario = $_FILES["arquivo"]["tmp_name"];
		$nomeTipo = $_FILES["arquivo"]["type"];
	
		$arq_new = 'curriculos/'.$nomeArquivo;
		move_uploaded_file($nomeTemporario, ($arq_new));
	
	
		require_once("email_autenticado/class.phpmailer.php");
		
		
		function envia_email($assunto,$mensagem,$email){
				
			$mail = new PHPMailer;	
			$mail->SMTPDebug =0;                 	
			//$mail->isSMTP();                    
			$mail->Host = "srv74.prodns.com.br";
			$mail->Username = 'site@hpiedade.com.br';
			$mail->Password = "bJ5.sWA0am*8";
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->setFrom('site@hpiedade.com.br', 'Site HNSP');
			$mail->addAddress($email, 'Site HNSP');						
			$mail->isHTML(true);                              			
			$mail->Subject = $assunto;
			$mail->Body    = $mensagem;
			
			if(!$mail->send()) {
					//echo 'Mailer Error: ' . $mail->ErrorInfo;
					return 0;
			} else {
					return 1;
			}
						
		}

		
		///MENSAGEM QUE VAI PARA O CLIENTE//
		$body = '<table cellspacing="0" style="font-family: Helvetica; font-size: 13px; width:600px; margin: 0 auto; border: 1px solid #D2D2D2;">';
	    $body.= '<tr>';
	    $body.= '<td colspan="2" style="padding:18px"><img src="http://hpiedade.com.br/novosite/interface/logo.png" style="width: 136px; margin: 0 auto; display: block;" alt=""></td>';
	    $body.= '</tr>';
	    $body.= '<tr><td style="padding:18px;">';
	    $body.= '<h2>Novo Trabalhe Conosco</h2>';
	    $body.= '<h3>Dados do Cadastro:</h3>';
	    
		$body.= '<p><strong>Nome:</strong> '.$nome.'</p>';
	    $body.= '<p><strong>Email:</strong> '.$email.'</p>';
		$body.= '<p><strong>Currículo:</strong> <a href="https://www.hpiedade.com.br/curriculos/'.$nomeArquivo.'">Clique aqui para ver o currículo enviado</a></p>';

		$body.= '<p><strong>Observações:</strong><br> '.nl2br($mensagem).'</p>';
		
	    $body.= '<p><small>ENVIADO EM '.@date('d/m/Y \à\s H:i').'</small></p>';
		$body.= $aviso;
	    $body.= '</td></tr></table>';
		////////
		
	
	
		
	envia_email('Trabalhe Conosco Site',$body,'psicologia@hpiedade.com.br');//EMAIL C4;
	
	
	
	echo '<script>alert("Currículo enviado com sucesso.")</script>';	
	
	
	
}
?>

<div class="content_meio">
    	
    <div class="tp_interna">
    	CONTATO HNSP
    </div>	  
    

<div class="jkl">     
    
    <div class="titulos2">FALE CONOSCO</div>
    <div class="ajusta_line2"><div class="line2"></div></div>

	<form method="post" action="contato.php?action=1#content" id="form1" name="form1">

                <input type="text" required name="nome" class="form_contato2" placeholder="Qual seu nome?" />
                <input type="text"  name="email" class="form_contato" placeholder="Informe seu e-mail" />
                <input type="text" required name="assunto" class="form_contato" placeholder="Qual o assunto?" />
                <input type="text" required name="novidade" class="form_contato" placeholder="Tem interesse em receber nossas novidades?" />
                <input type="text" required name="utilizou" class="form_contato" placeholder="Ja utilizou os serviços do HNSP?" />
                <textarea name="mensagem" required class="form_contato" placeholder="Mensagem"></textarea>
                
                <input type="submit" class="noti_mais" value="ENVIAR" style="cursor:pointer; border:0; margin-top:10px">
                        
			</form> 	

</div>



<div class="jkl2">     
    
    <div class="titulos2">TRABALHE CONOSCO</div>
    <div class="ajusta_line2"><div class="line2"></div></div>

	<form method="post" action="contato.php?action=2#content"  enctype="multipart/form-data">

                <input type="text" required name="nome" class="form_contato2" placeholder="Qual seu nome?" />
                <input type="text"  name="email" class="form_contato" placeholder="Informe seu e-mail" />
                <input type="file" required name="arquivo" class="form_contato" />
               
                <textarea name="mensagem" required class="form_contato" placeholder="Observações e pretenções"></textarea>
                
                <input type="submit" class="noti_mais" value="ENVIAR" style="cursor:pointer; border:0; margin-top:10px">
                        
			</form> 	

</div>


</div>
        
    
    
    

<?php include("includes/rodape.php"); ?>