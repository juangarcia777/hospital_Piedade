	
    
    <div class="servicos" style="display:none">
    	<div class="content">
        	<div class="servico_titulo">CONHEÇA<br />NOSSOS SERVIÇOS</div>
            <div class="servico_texto">CLIQUE NO BOTÃO ABAIXO E CONHEÇA TODOS OS SERVIÇOS OFERECIDOS PELO HNSP.</div>
            <a href="<?php echo $root_doc; ?>servicos"><div class="ve_mais">VER MAIS</div></a>
        </div>
    </div>
    
    
    
    <div class="noticias" style="display:none">
    	<div class="content">
        	<div class="titulos">ÚLTIMAS NOTÍCIAS</div>
        	<div class="ajusta_line"><div class="line2"></div></div>
        	<?php
					$db = new DB();
					$pesquisa = $db->select("SELECT * FROM noticia ORDER BY Id DESC LIMIT 3");
						$i=1;
						while($row = $db->expand($pesquisa)){
							
							if(!empty($row['Url'])){
								$foto = $row['Url'];
							} else {
								$foto = 'vazio.jpg';
							}
							
							if($i==1){
								echo '<div class="noti1">';	
							} else {
								echo '<div class="noti2">';
							}
							
								echo '<a href="'.$root_doc.'noticias/'.normaliza($row['Titulo'],$row['Id']).'"><div class="foto_noti" style="background-image:url('.$root_doc.'images/'.$foto.');"></div></a>';
								echo '<div class="titulo_noti">'.$row['Titulo'].'</div>';
								echo '<div class="texto_noti">'.substr($row['Corpo'],0,200).'...</div>';
								echo '<a href="'.$root_doc.'noticias/'.normaliza($row['Titulo'],$row['Id']).'"><div class="noti_mais">LEIA MAIS</div></a>';
								
							echo '</div>';
							$i++; 
					}
			?>  
        </div>
    </div>
    
    




<footer>
	<div class="content">
      
      			<div class="logo_escrita">
                    <img src="<?php echo $root_doc; ?>interface/logo_rodape.png" />
                </div>
                
                
                
                     <div class="coisas_footer_primeira">
                        <div class="img_footer_coisas"><i class="fa fa-envelope"></i></div>
                        <div class="escrita_footer_coisas">Novidades</div>
                        <div class="clear"></div>
                        <div class="texto_footer_coisas">
                        Quer receber nossas notícias? <br />Informe seu endereço de email e vamos<br /> te manter ainda mais informado.
                        </div>
                        <input type="text" class="news_campo" required="required" placeholder="SEU E-MAIL" />
                        <div class="bt"><i class="fa fa-envelope"></i></div>                    
                        <div class="clear"></div>                    
                        <a id="onj" href="https://www.facebook.com/hpiedadelp" target="_blank" class="social"><i class="fa fa-facebook-square " ></i></a>
                      
                     </div>
                
                
                 
                 
                 
                 
                 <div class="coisas_footer_segunda">
                        <div class="img_footer_coisas"><i class="fa fa-phone-square"></i></div>
                        <div class="escrita_footer_coisas">Contatos</div>
                        <div class="clear"></div>
                        <div class="texto_footer_coisas">
                        Geraldo Pereira de Barros,461 - Centro<br />
                        Lençóis Paulista - SP, CEP: 18682-041<br /><br />
                        - contato@hpiedade.com.br<br /> 
                        </div>
                        <div class="texto_footer_coisas2">+55 (14) 3269-1033</div>
                                                
                     </div>
                     
                     
                     <div class="coisas_footer_segunda" id="brow">                        
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.459954938684!2d-48.79822548553011!3d-22.599293085168995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c0b40099c67503%3A0x1df7de3cfc001b22!2sR.+Geraldo+Pereira+de+Barros%2C+461+-+Vila+Nossa+Sra.+Aparecida%2C+Len%C3%A7%C3%B3is+Paulista+-+SP%2C+18682-041!5e0!3m2!1spt-BR!2sbr!4v1485106644736" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                
                     </div>
                
        	 
             		<div class="line6"></div>
                    
                    <div class="escrita_fim">             	
 					&copy;&nbsp;Todos os Direitos Reservados - <strong>Hospital Nossa Senhora da Piedade</strong> <?php echo date("Y"); ?> - Proibida reprodução ou cópia sem autorização.
                </div>
                
                <div class="escrita_fim2">             	
 					<strong>Desenvolvido por:</strong> <a href="http://www.sisconnection.com.br" target="_blank" class="lop">&nbsp;SisConnection Sistemas</a>
                </div>
             
             
             </div>
             
   </div>     
</footer>


</div>

<script type="text/javascript" src="<?php echo $root_doc; ?>fancybox/source/jquery.fancybox.pack.js?v=2.1.7"></script>
<script type="text/javascript" src="<?php echo $root_doc; ?>fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo $root_doc; ?>fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<script type="text/javascript" src="<?php echo $root_doc; ?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>


<script type="text/javascript">
    
( function ( $ ) {
    // Create a new instance of Slidebars
    var controller = new slidebars();

    

    // Initialize Slidebars
    controller.init();

    // Left Slidebar controls
    $( '.btn_menu_mobile' ).on( 'click', function ( event ) {
        event.stopPropagation();
        controller.open( 'slidebar-1' );
    } );

    

    // Close any
    $( controller.events ).on( 'opened', function () {
        $( '[canvas="container"]' ).addClass( 'js-close-any-slidebar' );
    } );

    $( controller.events ).on( 'closed', function () {
        $( '[canvas="container"]' ).removeClass( 'js-close-any-slidebar' );
    } );

    $( 'body' ).on( 'click', '.js-close-any-slidebar', function ( event ) {
        event.stopPropagation();
        controller.close();
    } );

   
    

    
} ) ( jQuery );
</script>

</body>
</html>