



function namevalidate(){

	var form = document.getElementById("nuevo");
	var name = document.getElementById("name");
	var value = document.getElementById("name").value;

	form.onchange= validateForm;

	function validateForm(){


		if ( value.length < 6 ) {
			//Arma el mensaje y lo pre carga
			name.setCustomValidity("El campo debe ser mayor a 6 letras");
			return false;		
		}

		else {
			//Arma el mensaje y lo pre carga
			name.setCustomValidity("");
			return true;
		}
	}
}

function passvalidate(){

	var form = document.getElementById("nuevo");
	var name = document.getElementById("pass");
	var value = document.getElementById("pass").value;

	form.onchange= validateForm;

	function validateForm(){


		if ( value.length < 8 ) {
			//Arma el mensaje y lo pre carga
			name.setCustomValidity("El campo debe ser mayor a 8 letras");

			return false;		
		}

		else {
			//Arma el mensaje y lo pre carga
			name.setCustomValidity("");
			return true;
		}
	}
}

function mailvalidate(){

	var form = document.getElementById("nuevo"); //
	var name = document.getElementById("mail");
	var value = document.getElementById("mail").value;

	form.onchange= validateForm; //

	function validateForm(){	//

		var re = /\S+@\S+\.\S+/;

		if ( !re.test(value) ) {
				//Arma el mensaje y lo pre carga
				name.setCustomValidity("Formato de email incorrecto");

				return false;		
			}

			else {
				//Arma el mensaje y lo pre carga
				name.setCustomValidity("");
				return true;
			}
	}//	
}

function cardvalidate(){

	var form = document.getElementById("nuevo");
	var name = document.getElementById("card");
	var value = document.getElementById("card").value;

	form.onchange= validateForm;

	function validateForm(){

		var re = [0-9];

		if ( value.length != 16 ) {
			//Arma el mensaje y lo pre carga
			name.setCustomValidity("El campo debe tener 16 digitos");

			return false;		
		}

		else {
			//Arma el mensaje y lo pre carga
			name.setCustomValidity("");
			return true;
		}
	}
}

function cvvvalidate(){

	var form = document.getElementById("nuevo");
	var name = document.getElementById("cvv");
	var value = document.getElementById("cvv").value;

	form.onchange= validateForm;

	function validateForm(){


		if ( value.length != 3 ) {
			//Arma el mensaje y lo pre carga
			name.setCustomValidity("El campo debe tener 3 digitos");

			return false;		
		}

		else {
			//Arma el mensaje y lo pre carga
			name.setCustomValidity("");
			return true;
		}
	}
}

function show(select_item){
	if (select_item == 1) {

		third.style.display='block';
		Form.fileURL.focus();
	}
	else {
		third.style.display='none';
		Form.fileURL.focus();
	}
}