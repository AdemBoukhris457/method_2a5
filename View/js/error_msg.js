const form= document.getElementById('form');
const nom=document.getElementById('nom');
const specialite=document.getElementById('specialite');
const score=document.getElementById('score');
const description=document.getElementById('description');
const tel=document.getElementById('num_tel');
const localisation=document.getElementById('localisation');
const image=document.getElementById('image');
console.log(nom.value);

form.addEventListener('submit' , (e) => {
    let check=checkInputs();
    console.log(check);
    if(check !=0 )
    e.preventDefault();


});
function setTonormal(input){
    input.className = "form-control";
}
function setErrorfor(input,message){
    input.className += " error";
    input.placeholder = message;
    
    
}

function checkInputs(){
    let n=0;
const nameval=nom.value.trim();
const scoreval=score.value.trim();
const specialiteval=specialite.value.trim();
const descriptionval=description.value.trim();
const localisationval=localisation.value.trim();
const telval=tel.value.trim();
const imageval=image.value.trim();
console.log(nameval);
if( nameval === ''){
setErrorfor(nom, 'Le champ est vide');
    n++;
}
else{
if( nameval.substr(0,1)!=nameval.substr(0,1).toUpperCase() && nameval!=""){
    setErrorfor(nom, '   Le nom doit commencer avec une lettre majsucule');
    n++;
}
else
setTonormal(nom);
}

if( scoreval > 5 || scoreval <0 || scoreval == ''){
    setErrorfor(score, '    Score doit etre entre 0 et 5');
    n++;
}
else setTonormal(score);
if( specialiteval == '' ){
    setErrorfor(specialite, '    Le champ contient des nombres');
    n++;
}
else setTonormal(specialite);
if ( descriptionval == '' ){
    setErrorfor(descriptionval, '    Verifier le champ');
    n++;
}
else setTonormal(description);
if ( localisationval == '' ){
    setErrorfor(localisation, '    Verifier le champ');
    n++;
}
else setTonormal(localisation);
if ( telval == '' ){
    setErrorfor(tel, '    Verifier le champ');
    n++;
}
else setTonormal(tel);
if ( imageval == '' ){
    setErrorfor(image, '    Verifier le champ');
    n++;
}
else setTonormal(image);

return n;
}


