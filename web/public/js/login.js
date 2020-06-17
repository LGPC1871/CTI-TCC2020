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
            url: `${BASE_URL}user/ajaxLogin`,
            dataType: "json",
            data: $(this).serialize(),
            beforeSend: function(){
                formEnabled(false);
                showFormErrors(false);
                infoBlockLoading("verificando");
            },
            success: function(response){
                console.log(response);
                if(response === true){
                    /* LOGIN EFETUADO COM SUCESSO */
                    infoBlockLoading("entrando");
                    window.location = `${BASE_URL}user/profile`
                }else{
                    formEnabled(true);
                    let mensagem;
                    if(response["error_type"] == "empty"){
                        mensagem = "preencha todos os campos"
                    }
                    if(response["error_type"] == "validation"){
                        mensagem = "usuário/senha inválidos";
                    }
                    if(response["error_type"] == "database"){
                        mensagem = "ocorreu um erro";
                    }
                    infoBlockMessage(true, mensagem);
                    showFormErrors(true, response["error_list"]);
                }
            },
            error: function(response){
                /* ERRO LOGIN */
                formEnabled(true);
                infoBlockMessage(true, "Ocorreu um erro");
                showFormErrors(true)
                console.log(response);
            }
        })
        return false;
    })
})