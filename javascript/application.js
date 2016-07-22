$('#amount').change(function(){
     var valor = this.value;
     if (valor.match(/([a-zA-Z])\w+/g) || valor.match(/(?:\.)+/g) || valor.match(/(?:\d*\.)[a-zA-Z]\w+/g) || valor.match(/\d*([a-zA-Z])/g)){
     	console.log('Input at amount error');
     	$('#amount').addClass('has-error');
     	$('#btnSend').prop("disabled",true);
     	document.getElementById("pamount").innerHTML = "Preencha o campo apenas com números!";
     } else {
     	
	     	console.log('Input amount ok')
	     	$('#amount').removeClass('has-error');
	     	document.getElementById("pamount").innerHTML = "";
	     	$('#btnSend').removeAttr("disabled");
	
     }
});


$('#price').change(function(){
     var valor = this.value;
     if (valor.match(/([a-zA-Z])\w+/g) || valor.match(/(?:\d*\.)[a-zA-Z]+/g) || valor.match(/\d[a-zA-Z]+/g)){
     	console.log('Input price error');
     	$('#price').addClass('has-error');
     	$('#btnSend').prop("disabled",true);
     	document.getElementById("pprice").innerHTML = "Preencha o campo apenas com números!";
     } else {
     	console.log('Input price ok')
     	$('#price').removeClass('has-error');
     	document.getElementById("pprice").innerHTML = "";
     	$('#btnSend').removeAttr("disabled");
     }
     
});