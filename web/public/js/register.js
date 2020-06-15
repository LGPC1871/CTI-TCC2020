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
                    //window.location = `${BASE_URL}user/login`;
                }else{
                    formEnabled(true);
                    let mensagem;
                    if(response["error_type"] == "empty"){
                        mensagem = "preencha todos os campos"
                    }
                    if(response["error_type"] == "email"){
                        mensagem = "email inválido"
                    }
                    if(response["error_type"] == "user_invalid"){
                        mensagem = "apenas números"
                    }
                    if(response["error_type"] == "user_exist"){
                        mensagem = "usuário já cadastrado"
                    }
                    if(response["error_type"] == "name"){
                        mensagem = "nome inválido"
                    }
                    if(response["error_type"] == "senha"){
                        mensagem = "senha inválida"
                    }
                    if(response["error_type"] == "database"){
                        mensagem = "ocorreu um erro"
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