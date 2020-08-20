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