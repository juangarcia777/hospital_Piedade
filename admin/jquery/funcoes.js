// JavaScript Document


function atualiza_produtos_sap(){
	$("#resposta_sap").html("<BR><h4>ATUALIZANDO, AGUARDE...</h4><span>ESSE PROCESSO PODE LEVAR VÁRIOS SEGUNDOS.</span>");
	$.post("../integracao/integracao-produtos.php",{id:1},function(resposta){	
	
			if($.isNumeric(resposta)){
				$("#resposta_sap").html("<BR><h4>SUCESSO!</h4><span>PRODUTOS ATUALIZADOS COM SUCESSO NO SITE.</span>");		
			} else {
				$("#resposta_sap").html("<BR><h4>ERRO DE ATUALIZAÇÃO</h4><span>ENTRE EM CONTATO COM O SUPORTE WEB</span>");		
			}
			
	});	
}


function save_oferta(x){
	
	var formdata = $("#FormOferta"+x).serialize()		
	$("#btn"+x).html('<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>');
			$.ajax({type: "POST", url:$("#FormOferta"+x).attr('action'), data:formdata, success: function(msg){												
					$("#btn"+x).html('SALVAR');			
					
					if(msg==1){
						$("#contex"+x).removeClass('label-danger');	
						$("#contex"+x).addClass('label-success');	
						$("#contex"+x).html('EM OFERTA');
					} else {
						$("#contex"+x).removeClass('label-success');	
						$("#contex"+x).addClass('label-danger');	
						$("#contex"+x).html('NÃO ESTÁ EM OFERTA');
						$(".kilk"+x).val('');
					}
										
			} 
		
	});
	
}


function save_prod(x){
	
	var formdata = $("#FormProd"+x).serialize()		
	$("#btn"+x).html('<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>');
			$.ajax({type: "POST", url:$("#FormProd"+x).attr('action'), data:formdata, success: function(msg){												
					$("#btn"+x).html('SALVAR');								
			} 
		
	});
	
}


function save_cate_prod(x){
	
	var formdata = $("#FormProd"+x).serialize()		
	$("#btn"+x).html('<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>');
			$.ajax({type: "POST", url:$("#FormProd"+x).attr('action'), data:formdata, success: function(msg){												
					$("#btn"+x).html('SALVAR');								
					$("#some"+x).hide();
			} 
		
	});
	
}


function busca_subcategorias(id,x){
	if(id!=''){
		$("#subcategoria_produto"+x).html('<option>carregando...</option>');
		 $.post("ajax/busca_subcategorias.php",{categoria:id},function(resposta){	
			$("#subcategoria_produto"+x).html(resposta);	
		});
	}
}

function gerar_relatorio(){
	
	data_inicio = $("#data_inicio").val();
	data_fim = $("#data_fim").val();
	realizazao_relatorio = $("#realizazao_relatorio").val();
	tipo_relatorio = $("#tipo_relatorio").val();
	
	if(data_inicio==''){
		$("#data_inicio").css('background-color','#FCF8E3');
		$("#data_inicio").focus();
		return;   	
	}
	
	if(data_fim==''){
		$("#data_fim").css('background-color','#FCF8E3');
		$("#data_fim").focus();
		return;   	
	}
	
	window.open("relatorios/relatorio_periodo.php?data_inicio="+data_inicio+'&data_fim='+data_fim+'&realizacao_relatorio='+realizazao_relatorio+'&tipo_relatorio='+tipo_relatorio)
	
	
}


function relatorio(a){
	
	$("#rodape").hide();
	$("#conteudo_geral").html('<center><br><br><h2 style="color:#0480BE">CARREGANDO, AGUARDE...</h2></center>');
	
	if(a==1){
		$("#conteudo_geral").load('relatorios/periodo.php');	
	}
	
}

function internas(pagina){
	$("#rodape").hide();
	$("#conteudo_geral").html('<center><br><br><h2 style="color:#0480BE">CARREGANDO, AGUARDE...</h2></center>');
	$("#conteudo_geral").load(pagina);
}


function envio_arquivos(){
	arq = $("#id_evento_arquivos").val();
	location.href='arquivos_pecas.php?id='+arq;	
}



function loga(){
		
	   $("#erro").hide();
	   $("#sucesso").hide();
	   usuario = $("#usuario").val();	      	   	   	   
	   senha = $("#senha").val();
	   
	   
	   if(usuario==''){
			$("#usuario").css('background-color','#FCF8E3');
			$("#usuario").focus();
			return;   
	   }
	   
	   if(senha==''){
			$("#senha").css('background-color','#FCF8E3');
			$("#senha").focus();
			return;   
	   }
	   
	   $("#btn").html('VERIFICANDO...');
	   
	   $.post("ajax/login.php",{usuario:usuario, senha:senha},function(resposta){	
			if(resposta==1){
				window.location.href = 'administracao.php';						
			} else {
				$("#erro").show();
				$("#btn").html('ACESSAR');					
			}
		});
			
			
			
	

}


function logout(){
		
		window.location.href = 'index.php?logout=1';			
		
}