$(function(){
    $("form").submit(function(){
        $.ajax({
            type: "post",
            url: `${BASE_URL}user/ajaxPasswordForgot`,
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
                    infoBlockMessage(false, "email enviado");
                }else{
                    let message;
                    if(response["error_type"] == "empty"){
                        message = "insira seu email";
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