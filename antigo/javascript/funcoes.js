// JavaScript Document

function aparece(a){
	document.getElementById("mn"+a).style.display = 'block';	
}

function some(a){
	document.getElementById("mn"+a).style.display = 'none';	
}



function clis(a){
 location.href = 'trabalhos.php?id='+a;	
}


function cru(a){
 location.href = 'papo_atitude_ler.php?id='+a;	
}



$(document).ready(function() {	
$('#mask').click(function () {		
		$('#mask').hide();
		$('#mostra_trab').hide();

});
});


function fex(){
	
	$('#mask').hide();
	$('#mostra_trab').hide();
	$("#mostra_trab").html("");
}


function abre_docs(a){
	
	var maskHeight2 = $(document).height();
	var maskWidth2 = $(window).width();
	$('#mask').css({'width':maskWidth2,'height':maskHeight2});
	$('#mask').fadeTo("slow",0.9);	
	
	$("#mostra_trab").html("");
	$('#mostra_trab').fadeTo("slow",1);	
	$('#mostra_trab').load('mostra_trabalhos.php?id='+a);
	
}



