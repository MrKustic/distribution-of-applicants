var flag = false; 
function f(){ 
	if(flag == false){ 
		flag = true; 
		document.getElementById("gg").style.pointerEvents = ""; 
		document.getElementById("gg").style.opacity = "1"; 
	} 
	else{ 
		flag = false; 
		document.getElementById("gg").style.pointerEvents = "none"; 
		document.getElementById("gg").style.opacity = "0.5"; 
	} 
}

function setValue1(){
	x = document.getElementById("inputSet1").value;
	document.getElementById("f11").style.display = "none";
	document.getElementById("f12").style.display = "none";
	document.getElementById("f13").style.display = "none";
	if(x != 0){
		document.getElementById("f1" + x).style.display = "";
	}
}

function setValue2(){
	x = document.getElementById("inputSet2").value;
	document.getElementById("f21").style.display = "none";
	document.getElementById("f22").style.display = "none";
	document.getElementById("f23").style.display = "none";
	if(x != 0){
		document.getElementById("f2" + x).style.display = "";
	}
}

function setValue3(){
	x = document.getElementById("inputSet3").value;
	document.getElementById("f31").style.display = "none";
	document.getElementById("f32").style.display = "none";
	document.getElementById("f33").style.display = "none";
	if(x != 0){
		document.getElementById("f3" + x).style.display = "";
	}
}
