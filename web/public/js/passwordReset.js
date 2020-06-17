$(function(){
    $("form").submit(function(){
        $.ajax({
            type: "post",
            url: `${BASE_URL}user/ajaxPasswordReset`,
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
                    /* EMAIL ENVIADO COM SUCESSO */
                    infoBlockMessage(false, "Senha redefinida");
                }else{
                    let message;
                    if(response["error_type"] == "empty"){
                        message = "preencha todos os campos";
                    }
                    if(response["error_type"] == "validation"){
                        message = "falha na verificação";
                    }
                    if(response["error_type"] == "senha"){
                        message = "senha inválida";
                    }
                    if(response["error_type"] == "database"){
                        message = "ocorreu um erro";
                    }
                    formEnabled(true);
                    infoBlockMessage(true, message);
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