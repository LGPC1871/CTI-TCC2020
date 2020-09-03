$(function(){
    $("#form-avatar").submit(function(){
        $.ajax({
            url: `${BASE_URL}times/ajaxAlterarAvatarTime`,
            method:"POST",  
            data:new FormData(this),  
            contentType: false,  
            cache: false,  
            processData:false,  
            
            beforeSend: function(){
                formStatus("#form-avatar", true);
            },
            success:function(response){
                window.location.reload(true);
                formStatus("#form-avatar", false);
            },
            error:function(response){
                console.log(response);
                formStatus("#form-avatar", false);
            }
        })
        return false;
    })

    $("#form-nome").submit(function(){
        $.ajax({
            url: `${BASE_URL}times/ajaxAlterarNomeTime`,
            type:"POST",  
            dataType: "json",
            data: $(this).serialize(),
            
            beforeSend: function(){
                formStatus("#form-nome", true);
            },
            success:function(response){
                window.location.reload(true);
                formStatus("#form-nome", false);
            },
            error:function(response){
                console.log(response);
                formStatus("#form-nome", false);
            }
        })
        return false;
    })

    $("#form-remover").submit(function(){
        $.ajax({
            url: `${BASE_URL}times/ajaxRemoverJogador`,
            type:"POST",  
            dataType: "json",
            data: $(this).serialize(),
            
            beforeSend: function(){
                formStatus("#form-remover", true);
            },
            success:function(response){
                window.location.reload(true);
                formStatus("#form-remover", false);
            },
            error:function(response){
                console.log(response);
                formStatus("#form-remover", false);
            }
        })
        return false;
    })

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
})