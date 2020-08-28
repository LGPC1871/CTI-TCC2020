$(function(){

/**
 * AVATAR
 * scripts referentes a alterar avatar do usuário
 * @param this.Serialize()
 * @return Reload
 */
    $("#form-avatar").submit(function(){
        $.ajax({
            url: `${BASE_URL}profile/ajaxAlterarAvatar`,
            method:"POST",  
            data:new FormData(this),  
            contentType: false,  
            cache: false,  
            processData:false,  
            
            beforeSend: function(){
                formStatus("#form-avatar", true);
            },
            success:function(response){
                console.log(response);
                formStatus("#form-avatar", false);
                location.reload();
            },
            error:function(response){
                console.log(response);
                formStatus("#form-avatar", false);
            }
        })
        
        return false;
    })

/**
 * NOME
 * scripts referentes a alterar nome e sobrenome do usuário
 * @param this.Serialize()
 * @return Reload
 */
    $("#form-nome").submit(function(){
        $.ajax({
            url: `${BASE_URL}profile/ajaxAlterarNome`,
            type:"POST",  
            dataType: "json",
            data: $(this).serialize(),  
            
            beforeSend: function(){
                console.log("enviando");
            },
            success:function(response){
                console.log(response);
            },
            error:function(response){
                console.log(response);
            }
        })
        return false;
    })

/*
|--------------------------------------------------------------------------
| Funções
|--------------------------------------------------------------------------
| Todas as funções de verificacao do formulario
*/
    function verifyFormInputs(form){
        console.log(form);
        return false;
    }

/*
|--------------------------------------------------------------------------
| Efeitos Visuais e Funcionalidades
|--------------------------------------------------------------------------
| Todas as funções de efeitos do formulario
*/
    function formStatus(form, disabled = true){
        if(!disabled){
            var addClass = "btn-success";
            var remClass = "btn-secondary";
        }else{
            var remClass = "btn-success";
            var addClass = "btn-secondary";
        }
        $(form+" :input").prop("disabled", disabled);
        $(form).find("button").removeClass(remClass);
        $(form).find("button").addClass(addClass);
    }
});