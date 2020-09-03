$(function(){
    $("#form-sair-do-time").submit(function(){
        $.ajax({
            url: `${BASE_URL}times/ajaxSairDoTime`,
            type:"POST",  
            dataType: "json",
            data: $(this).serialize(),
            
            beforeSend: function(){
                console.log("fui carregado");
                //formStatus("#form-sair-do-time", true);
            },
            success:function(response){
                window.location.reload(true);
            },
            error:function(response){
                console.log(response);
                //formStatus("#form-sair-do-time", false);
            }
        })
        return false;
    })
    $("#form-solicitar-entrada").submit(function(){

        $.ajax({
            url: `${BASE_URL}times/ajaxSolicitarEntradaTime`,
            type:"POST",  
            dataType: "json",
            data: $(this).serialize(),
            
            beforeSend: function(){
                formStatus("#form-solicitar-entrada", true);
                console.log(this);
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