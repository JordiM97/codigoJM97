function cambiar() {
	let name = prompt("Ingrese su nombre");
	let emoji = document.getElementById("selector").value;
	document.getElementById("name").innerText = name;
	document.getElementById("emoji").innerHTML = emoji;
}

function saludar() {
	let name = document.getElementById("name").innerText;
	window.alert("Hola " + name + " me gusta tu emoji");
}