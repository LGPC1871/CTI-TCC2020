/*
|--------------------------------------------------------------------------
| Constantes
|--------------------------------------------------------------------------
| Todas as constantes de formulário
*/
const FA_INFORMACAO =                   "<i class='fas fa-info-circle fa-lg'></i>&nbsp";
const FA_EXCLAMACAO =                   "<i class='fas fa-exclamation-circle fa-lg'></i>&nbsp";
const FA_CARREGANDO =                   "<i class='fas fa-circle-notch fa-spin'></i>&nbsp;";

function showFormErrors(caso, inputArray = []){
if(caso){
    $("#info-block").removeClass("no-error");
    $("#info-block").addClass("has-error");
}else{       
    $(".has-error").removeClass("has-error");
    $("#info-block").addClass("no-error");
}
inputErrors(caso, inputArray);
}

function inputErrors(caso, inputArray){
inputArray.forEach(element => {
    caso ? $("#" + element).parent().addClass("has-error") : $("#" + element).parent().removeClass("has-error") 
});
}

function infoBlockMessage(erro, mensagem){
$("#info-block").find("span").html((erro ? FA_EXCLAMACAO:FA_INFORMACAO) + mensagem);
}

function infoBlockLoading(mensagem){
$("#info-block").find("span").html(FA_CARREGANDO + mensagem);
}

function formEnabled(caso){
    if(caso){
        $("form :input").prop("disabled", false);
        $("#botaoLoginGoogle").removeAttr("style", "pointer-events:none");
    }else{
        $("form :input").prop("disabled", true);
        $("#botaoLoginGoogle").attr("style", "pointer-events:none");
    }
}