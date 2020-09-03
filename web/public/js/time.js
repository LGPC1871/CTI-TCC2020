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
})