function LeerFrase(frase) {
    $(document).on('click', '.boton-palabra', function (e) {
        frase.push(e.currentTarget.getAttribute('data-palabra'));
        $('#frase').append(e.currentTarget.cloneNode(true));

    });

    $('#leerFrase').on('click', function () {
        if(frase.length){
            const utterance = new SpeechSynthesisUtterance(frase.join(' '));
            window.speechSynthesis.speak(utterance);
        }
    });  

    $('#borrarFrase').on('click', function () {
        frase = [];
        $('#frase').empty();
    });  
}

$(document).ready(function () {
    var frase =[]; 
    LeerFrase(frase);
});