/*
|--------------------------------------------------------------------------
| AJAX
|--------------------------------------------------------------------------
| Requisicao Ajax
*/

$(function(){

    $("form").submit(function(){
        $.ajax({
            type: "post",
            url: `${BASE_URL}times/ajaxNovoTime`,
            dataType: "json",
            data: $(this).serialize(),  

            beforeSend: function(){
                formEnabled(false);
                showFormErrors(false);
                infoBlockLoading("verificando");
            },
            success: function(response){
                console.log(response);
                if(!response['error_type']){
                    infoBlockLoading("sucesso");
                    window.location = `${BASE_URL}time?id=${response}`;
                }else{
                    formEnabled(true);
                    let mensagem;
                    switch(response["error_type"]){
                        case "invalid_name":
                            mensagem = "nome inválido";
                            break;
                        case "already_exist":
                            mensagem = "nome indisponível";
                            break;
                        case "invalid_modalidade":
                            mensagem = "modalidade inválida";
                            break;
                        case "database":
                        default:
                            mensagem = "ocorreu um erro"
                    }
                    infoBlockMessage(true, mensagem);
                    showFormErrors(true);
                }
            },
            error: function(response){
                console.log(response);
                formEnabled(true);
            },
        })
        return false;
    })

})