// JavaScript Document

function formas(a,b){
	


//ON_focus no campo
if(b==1){	
	
	if(a==1){
		var valor = document.getElementById("usa").value;
		if(valor=='Usuario'){
			document.getElementById("usa").value = '';
		} 
	} else if(a==2){
		
		var valor = document.getElementById("senha").value;
		if(valor=='Senha'){
			document.getElementById("senha").type = 'password';
			document.getElementById("senha").value = '';
		}
		
	}
	
//LOST_focus no campo	
} else if(b==2){
	
	if(a==1){
		var valor = document.getElementById("usa").value;
		if(valor==''){
			document.getElementById("usa").value = 'Usuario';
		} 			
	} else if(a==2){
		var valor = document.getElementById("senha").value;
		if(valor==''){
			document.getElementById("senha").type = 'text';
			document.getElementById("senha").value = 'Senha';
		}
	}

}
		
}



function muda_cor(a){
	document.getElementById(a).bgColor = '#E3DDFF';
}

function volta_cor(a){
	document.getElementById(a).bgColor = 'white';
}








