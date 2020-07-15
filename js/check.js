document.getElementById("chk1").onclick = function(){
  if (document.getElementById("fecha_llegada").disabled){
    document.getElementById("fecha_llegada").disabled = false
  }else{
    document.getElementById("fecha_llegada").disabled = true
  }
}