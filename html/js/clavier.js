var encodeXor = false;

function encodeBase64LCL(inputLcl) {
	var outputLcl = '';
	var chr1Lcl, chr2Lcl, chr3Lcl = '';
	var enc1Lcl, enc2Lcl, enc3Lcl, enc4Lcl = '';
	var iLcl = 0;
	var _keysLcl = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/='
	do {
		chr1Lcl = inputLcl.charCodeAt(iLcl++);
		chr2Lcl = inputLcl.charCodeAt(iLcl++);
		chr3Lcl = inputLcl.charCodeAt(iLcl++);
		enc1Lcl = chr1Lcl >> 2;
		enc2Lcl = ((chr1Lcl & 3) << 4) | (chr2Lcl >> 4);
		enc3Lcl = ((chr2Lcl & 15) << 2) | (chr3Lcl >> 6);
		enc4Lcl = chr3Lcl & 63;
		if (isNaN(chr2Lcl)){
			enc3Lcl = enc4Lcl = 64;
		} else if (isNaN(chr3Lcl)){
			enc4Lcl = 64;
		}
		outputLcl = outputLcl+_keysLcl.charAt(enc1Lcl)+_keysLcl.charAt(enc2Lcl)+_keysLcl.charAt(enc3Lcl)+_keysLcl.charAt(enc4Lcl);
		chr1Lcl = chr2Lcl = chr3Lcl = '';
		enc1Lcl = enc2Lcl = enc3Lcl = enc4Lcl = '';
	} while (iLcl < inputLcl.length);
	return outputLcl;
};

function myXOR(valeur, aleatoire){
	var to_enc = valeur;
	var xor_key = aleatoire; 
	var the_res="";
	for(i=0; i < to_enc.length; ++i){
		the_res+=String.fromCharCode(xor_key^to_enc.charCodeAt(i));
	}
	return the_res;
} 

function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
} 


function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];

		while (c.charAt(0)==' '){ 
			c = c.substring(1,c.length);
		}
		if (c.indexOf(nameEQ) == 0){
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}		
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		
	}
	return null;
}


function saveIdentifiant(identifiant){
	if(identifiant){
		if(window.localStorage  ){
			localStorage['idBelLCL'] = identifiant;
		} else {
			createCookie("idBelLCL",  identifiant, 30);
		}
	}
}

function removeIdentifiant(){
	if(window.localStorage){
		localStorage.removeItem("idBelLCL");
	} else {
		createCookie("idBelLCL",  '', -1);
	}
}

function saveIdentifiantBel(identifiant){
	//Enregistrement de l'identifiant
	if($("#saveIdentifiant:checked").length != 0){
		saveIdentifiant(identifiant);
	}else{
		removeIdentifiant();
	}
}

$(function() {
	if(window.localStorage){
		if(localStorage['idBelLCL']){
			$("#identifiantIdForm").val(localStorage['idBelLCL']);
			$("#saveIdentifiant").attr("checked", true);
		}
	}else{
		var cookieIdBel = readCookie('idBelLCL');
		if(cookieIdBel){
			$("#identifiantIdForm").val(cookieIdBel);
			$("#saveIdentifiant").attr("checked", true);
		}
	}

	$('.postClavier').val('');
	
	if(typeof(flag) == "undefined" || (typeof(flag) != "undefined" && flag == false)) {
		flag = true;
		
		//Fonction pour le toucheClavier
		$(".toucheClavier").live("click", function(){
			//On récupère la div parent
			var touche = this.id.split("_")[1];
			
			var divParent = $(".pwdFields", $(this).parent().parent().parent());
			//On récupère le champs du code
			var password = $(divParent).children(".password");
			var code = $(password).val();
			//On récupère le champs caché
			var postClavier = $(divParent).children(".postClavier");
			var num = $(postClavier).val();
			
			if(code.length <6){
				num = num +''+ touche;
				$(postClavier).val(num);
				code = code + '' + "*";
				$(password).val(code);
				encodeXor = false;
			}
		});
		
		//Fonction de correction
		$(".button").live("click", function(){
			if(this.id.indexOf('ResetClavier', 0) != -1){
				//On récupère la div parent
				var divParent = $(".pwdFields", $(this).parent().parent().parent());
				//On vide le champs
				$(divParent).children(".password").val('');
				$(divParent).children(".postClavier").val('');
				encodeXor = false;
			}
		});
	}
	var vel = "";
	if($("#vel").val() != undefined){
		vel = $("#vel").val();
	}
			
	//On récupère la valeur si on utilise un random
	if($("#random") != undefined){
		if($("#random").val() != undefined && $("#random").val() == "true"){
			$(".clavier").attr("src", vel+"/outil/UAUT/Clavier/creationClavier?random=" + Math.floor(Math.random()*1000000000000000000000));
		}else{
			$(".clavier").attr("src", vel+"/outil/UAUT/Clavier/creationClavier");
		}
	}else{
		$(".clavier").attr("src", vel+"/outil/UAUT/Clavier/creationClavier?random=" + Math.floor(Math.random()*1000000000000000000000));
	}
});