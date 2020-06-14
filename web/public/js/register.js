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
            url: `${BASE_URL}user/ajaxRegister`,
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
                    /* CADASTRO EFETUADO COM SUCESSO */
                    infoBlockLoading("sucesso");
                    window.location = `${BASE_URL}user/login`;
                }else{
                    formEnabled(true);
                    let mensagem;
                    if(response["error_type"] == "empty"){
                        mensagem = "preencha todos os campos"
                    }
                    infoBlockMessage(true, mensagem);
                    showFormErrors(true, response["error_list"]);
                }
            },
            error: function(response){
                formEnabled(true);
                infoBlockMessage(true, "Ocorreu um erro");
                showFormErrors(true)
                console.log(response);
            }
        })
        return false;
    })
})