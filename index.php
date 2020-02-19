
<?php include("includes/topo.php"); ?>
<?php include("includes/banners.php"); ?>


<script>

$(document).ready(function() {
    
    $('#mask').click(function () {        
        $('#mask').hide();
        $('#form').hide(); 
        $('#mikol').attr('src', '');     
    });
        
    $('#form').click(function () {    
        $('#mask').hide();
        $('#form').hide();        
        $('#mikol').attr('src', '');
    });
                
    var maskHeight2 = $(document).height();
    var maskWidth2 = $(window).width();
    $('#mask').css({'width':maskWidth2,'height':maskHeight2});
    $('#mask').fadeTo("slow",0.7);
    $('#form').fadeTo("slow",1);    
    
});

function fecha_modal(){
     $('#mask').hide();
        $('#form').hide(); 
        $('#mikol').attr('src', '');   
}
</script>




<div class="cinza">

	<div class="content">
    	
        <div class="bloco1">
        	<div class="meio_bloco">
            	<h1>
                	<div class="img_bloco"><i class="fa fa-user"></i></div>
                    CONHE�A-NOS
                </h1>
                <div class="line"></div>
                <span class="texto_bloco" style="text-transform:none">Voc� sabia que o Hospital Piedade foi fundado em 25 de janeiro de 1944, com uma missa campal rezada pelo Padre Sal�stio. <br /><br /> O diretor cl�nico do hospital que era o prefeito Ant�nio Le�o Tocci, fez em p�blico o pagamento final da constru��o ao engenheiro Jos� Carrilho Ruiz.</span>
            </div>
            <a href="<?php echo $root_doc; ?>hospital"><div class="mais_detalhes">SAIBA MAIS</div></a>
        </div>
        
        
        <div class="bloco2">
            <div class="meio_bloco">
            	<h1>
                	<div class="img_bloco"><i class="fa fa-thumbs-o-up"></i></div>
                    DOA��ES
                </h1>
                <div class="line"></div>
                <span class="texto_bloco" style="text-transform:none">A cria��o e crescimento do hospital piedade, ao longo dos seus mais de 70 anos, n�o teriam sido poss�veis sem a ajuda de in�meros doadores. � gra�as a essas pessoas que a institui��o consegue ampliar sua atua��o, contribuindo para a melhoria da sa�de dos moradores de len��is paulista e regi�o. Ajude voc� tamb�m.</span>
            </div>
            <a href="<?php echo $root_doc; ?>doacoes"><div class="mais_detalhes">AJUDE VOC� TAMB�M</div></a>
        </div>
        
        
        
        
        
        
        
        
        <div class="bloco4">
        	<div class="meio_bloco">
            	<h1>
                	<div class="img_bloco"><i class="fa fa-phone-square "></i></div>
                    FALE CONOSCO
                </h1>
                <div class="line"></div> 
                <h4><small>(14)</small> 3269-1033</h4>
                <span class="texto_bloco" style="text-transform:none">contato@hpiedade.com.br<br><br>Entre em contato!</span>
                
            </div>
            <a href="<?php echo $root_doc; ?>contato"><div class="mais_detalhes">FALE AGORA</div></a>
        </div>
        
        
        
        
        <div class="titulos" style="display:none">Voc� pode contar com o HNSP</div>
        <div style="display:none" class="ajusta_line"><div class="line2"></div></div>
        
        
        <div class="dif" style="display:none">
        	<div class="circulo"><img src="<?php echo $root_doc; ?>interface/icon1.png"></div>
            <div class="titulo_dif">Medicinas Modernas</div>
            <div class="texto_dif">Uma combina��o de tradi��o e modernidade fazem do HNSP um dos melhores hospitais da regi�o.</div>
        </div>
        
        <div class="dif" style="display:none">
        	<div class="circulo"><img src="<?php echo $root_doc; ?>interface/icon2.png"></div>
            <div class="titulo_dif">Equipe m�dica qualificada</div>
            <div class="texto_dif">S�o mais de 20 profissionais treinados e competentes, sempre prontos a atender.</div>
        </div>
        
        
        <div class="dif" style="display:none">
        	<div class="circulo"><img src="<?php echo $root_doc; ?>interface/icon3.png"></div>
            <div class="titulo_dif">Parceria SAMU</div>
            <div class="texto_dif">Em conjunto com o SAMU, o HNSP consegue atender mais rapidamente quem precisa.</div>
        </div>
        
        
        
    </div>


</div>
        
    
    
    

<?php include("includes/rodape.php"); ?>