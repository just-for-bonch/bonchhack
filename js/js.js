function pull() {
    growth = document.getElementById("growth").value;
    age = document.getElementById("age").value;
    weight = document.getElementById("weight").value;
    checksex();
    selected = document.getElementById("selected").value;
    checktype();
}


function checksex() {
  var checkboxes = document.getElementsByClassName('sex');
  var checkboxesChecked = []; 
  for (var index = 0; index < checkboxes.length; index++) {
     if (checkboxes[index].checked) {
        checkboxesChecked.push(checkboxes[index].value); 
        sex = (checkboxes[index].value); 
     }
  }
  return checkboxesChecked; 
}


function checktype() {
  var checkboxes = document.getElementsByClassName('tip');
  var checkboxesChecked = []; 
  for (var index = 0; index < checkboxes.length; index++) {
     if (checkboxes[index].checked) {
        checkboxesChecked.push(checkboxes[index].value); 
        tip = (checkboxes[index].value); 
     }
  }
  return checkboxesChecked; 
}

function female() {
 kall=((665+(9.6*weight)+(1.8*growth)-(4.7*age))*selected);
}

function men() {
 kall2=((66+(13.7*weight)+(5*growth)-(6.8*age))*selected);
}


function go() {
  pull(); 
  female();
  men();
  if (sex != 1) {
    if (tip != 1) {
      a=(kall*1.15);
    }
    else
      a=(kall*0.85);
}
else 
  if (tip != 1) {
      a=(kall2*1.15);
    }
    else
      a=(kall2*0.85);
}


function bju(){
  go();
  belk = Math.round(((a*0.25)/4));
  jup =  Math.round(((a*0.25)/4));
  ygl =  Math.round(((a*0.5)/9));
  document.getElementById("kalopuu").innerHTML= Math.round(a);
  document.getElementById("belku").innerHTML= Math.round(belk);
  document.getElementById("jupbi").innerHTML= Math.round(jup);
  document.getElementById("yrlevod").innerHTML= Math.round(ygl);
  document.getElementById("vovainput").value = Math.round(a);
  document.getElementById("asd").innerHTML= Math.round(a);
}
