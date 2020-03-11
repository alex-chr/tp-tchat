// fonction qui affiche section selon ordre class
function affSess(nbSess) {
	for (var i = 0; i < 3; i++) {
		document.getElementsByClassName('hide')[i].classList.remove('show');
	}
	document.getElementsByClassName('hide')[nbSess].classList.add('show');
}

// fonction vérifiant les idantifiants
var valInputCo = [];
function verifCo() {
	for (var i = 0; i < 2; i++) {
		valInputCo[i] = document.getElementsByClassName('input_co')[i].value;
	}

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "autorised") {
				affSess(2);
			} else if (this.responseText == "high_autorisation") {
				affSess(2);
				document.getElementsByClassName("btn_admin")[0].classList.remove("hide");
			} else {
				alert("mauvais identifiants");
			}
		}
	};
	xhttp.open("GET", "check_bdd.php?pseudo="+valInputCo[0]+"&pwd="+valInputCo[1], true);
	xhttp.send();
}

// fonction d'inscription
var valInputInsc = [];
function addUser() {
	for (var i = 0; i < 3; i++) {
		valInputInsc[i] = document.getElementsByClassName('input_insc')[i].value;
	}

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			affSess(0);
		}
	}
	xhttp.open("GET", "check_bdd.php?newName="+valInputInsc[0]+"&newPass="+valInputInsc[1]+"&newMail="+valInputInsc[2], true);
	xhttp.send();
}

// ajout message bdd
var valTextarea;
var statut;
function addMsg() {
	valTextarea = document.getElementsByTagName('textarea')[0].value;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log(valTextarea);
			statut = "user";
			affMsg(statut);
		}
	}
	xhttp.open("GET", "check_bdd.php?msgId="+valInputCo[0]+"&msgCom="+valTextarea, true);
	xhttp.send();
}

// fonction ajout message html
function affMsg(statut) {
	console.log(valTextarea);
	if (statut == "admin") {
		var zoneTarget = document.getElementsByClassName('news')[0];
	} else {
		var zoneTarget = document.getElementsByClassName('admin')[0];
	}
	var divCrea = document.createElement("div");
	var span1 = document.createElement("span");
	var span2 = document.createElement("span");
	var text1 = document.createTextNode(valInputCo[0]);
	var text2 = document.createTextNode(valTextarea);

	span1.appendChild(text1);
	span2.appendChild(text2);
	divCrea.appendChild(span1);
	divCrea.appendChild(span2);
	zoneTarget.appendChild(divCrea);

	valTextarea = "";
}

function addMsgAdmin() {
	valTextarea = document.getElementsByTagName('textarea')[0].value;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			statut = "admin";
			affMsg(statut);
		}
	}
	xhttp.open("GET", "check_bdd.php?msgIdAdmin="+valInputCo[0]+"&msgAdmin="+valTextarea, true);
	xhttp.send();
}