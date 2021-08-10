var cpf = $('#cpf');
var validado;
cpf.blur(function(){
    var numeros = cpf.val().replace(/\D/g,'');
    if(!validaCPF(numeros)){
        cpf.removeClass("is-valid");
        cpf.addClass("is-invalid");
    }
});

cpf.keyup(function(){
    var numeros = cpf.val().replace(/\D/g,'');
    if((numeros.length === 11) && (validaCPF(numeros))){
        cpf.removeClass("is-invalid");
        cpf.addClass("is-valid");
        validado = true;
    }else if((numeros.length === 11) && (!validaCPF(numeros))){
        cpf.removeClass("is-valid");
        cpf.addClass("is-invalid");
    }else if (numeros.length === 0){
        cpf.removeClass("is-valid");
        cpf.addClass("is-invalid");
        validado = false;
    }else if(validado){
        cpf.removeClass("is-valid");
        cpf.addClass("is-invalid");
    }
});

function validaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
    // if (strCPF == "00000000000") return false;
    if (strCPF == '00000000000' || 
        strCPF == '11111111111' || 
        strCPF == '22222222222' || 
        strCPF == '33333333333' || 
        strCPF == '44444444444' || 
        strCPF == '55555555555' || 
        strCPF == '66666666666' || 
        strCPF == '77777777777' || 
        strCPF == '88888888888' || 
        strCPF == '99999999999') {
        return false;}
    

    for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10))) return false;

    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11))) return false;
    return true;
}