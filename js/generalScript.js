// // PINTAR FECHAS
// let time = new Date;
// let dia = time.getDate();
// let mes = time.getMonth() + 1;
// let ano = time.getFullYear();
// let hora = time.getHours();
// let minutos = time.getMinutes();
// let segundos = time.getSeconds();


// switch (mes) {
// 	case 1:
// 		var mesFormater = "enero";
// 		break;
// 	case 2:
// 		var mesFormater = "febrero";
// 		break;
// 	case 3:
// 		var mesFormater = "marzo";
// 		break;
// 	case 4:
// 		var mesFormater = "abril";
// 		break;
// 	case 5:
// 		var mesFormater = "mayo";
// 		break;
// 	case 6:
// 		var mesFormater = "junio";
// 		break;
// 	case 7:
// 		var mesFormater = "julio";
// 		break;
// 	case 8:
// 		var mesFormater = "agosto";
// 		break;
// 	case 9:
// 		var mesFormater = "septiembre";
// 		break;
// 	case 10:
// 		var mesFormater = "octubre";
// 		break;
// 	case 11:
// 		var mesFormater = "noviembre";
// 		break;
// 	case 12:
// 		var mesFormater = "diciembre";
// 		break;
// }

// let test2 = document.getElementsByClassName("lastConnection")[0].innerHTML = " " + dia + " " + mesFormater + " " + ano + " " + hora + ":" + minutos + ":" + segundos;
// // ********************************

// $.ajax({
// 	method: "POST",
// 	url: './php/login.php',
// 	data: { 
// 		user_code: id_code,
// 		action: "getUserCups"
// 	}
// }).done(function (msg) {
// 	try {
// 		data = JSON.parse(msg);
// 		alert(msg)
// 	} catch (err) {
// 		setError(msg + "<br>" + err.message);
// 	}
// }).fail(function (jqXHR, exception) {
// 	setFailError(jqXHR, exception);
// });


// document.addEventListener("DOMContentLoaded", function() {
// 	// Suponiendo que currentUserRole contiene el rol actual del usuario
// 	if (currentUserRole === 'admin') {
// 			// Mostrar elementos para el administrador
// 			document.getElementById('adminLinks').style.display = 'block';
// 	} else if (currentUserRole === 'usuario') {
// 			// Mostrar elementos para el usuario registrado
// 			document.getElementById('userLinks').style.display = 'block';
// 	} else {
// 			// Mostrar elementos para el invitado
// 			document.getElementById('guestLinks').style.display = 'block';
// 	}
// });
