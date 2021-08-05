// Menu 
const menuOpen = document.getElementById('menuOpen')
const menuClose = document.getElementById('menuClose')
const mobile = document.getElementById('mobile')

menuOpen.addEventListener('click', () => {
    mobile.style.visibility = 'visible'
})

menuClose.addEventListener('click', () => {
    mobile.style.visibility = 'hidden'
})

// Masc Telephone
 /* Máscaras ER */
 function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
    return document.getElementById( el );
}
window.onload = function(){
    id('telephone').onkeyup = function(){
        mascara( this, mtel );
    }
}
   
   
