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