$(function(){

    /*
    |--------------------------------------------------------------------------
    | VARIAVEIS
    |--------------------------------------------------------------------------
    | Declaracao de variaveis
    */
        let modalidadeId = $("#modalidade-id").val();
    /*
    |--------------------------------------------------------------------------
    | ON LOAD
    |--------------------------------------------------------------------------
    | Funcoes que carregam no load
    */
        $(document).ready(function(){
            getModalidadeEdicoes(modalidadeId);
        });
    /*
    |--------------------------------------------------------------------------
    | FUNÇÕES
    |--------------------------------------------------------------------------
    */    
        function addModalidadeStatusDecoration(){
            let badgeType = "badge-light";

            $(".modalidade-status").each(function(){
                if($(this).hasClass("cancelado")){
                    badgeType = "badge-danger";
                }
                if($(this).hasClass("inscrições abertas")){
                    badgeType = "badge-success";
                }
                if($(this).hasClass("preparando")){
                    badgeType = "badge-primary";
                }
                if($(this).hasClass("finalizado")){
                    badgeType = "badge-secondary";
                }
                if($(this).hasClass("inscrições finalizadas")){
                    badgeType = "badge-warning";
                }
                $(this).addClass("badge");
                $(this).addClass(badgeType);
            });
        }
        
        function getModalidadeEdicoes(modalidadeId){
            let data = {
                id: modalidadeId,
            }
            $("#modalidade-edicoes").load(`${BASE_URL}modalidades/ajaxExibirModalidadeEdicoes`, data, function(){
                addModalidadeStatusDecoration();
                //ativarBotaoDaListaDeEdicoes();
                ativarAccordion();
            });
            
        }
        
        function limparModalidadeEdicoesConteudos(){
            $(".modalidade-conteudo").each(function(){
                $(this).empty();
            });
        }
        
    /*
    |--------------------------------------------------------------------------
    | EVENTOS
    |--------------------------------------------------------------------------
    | Funções de evento
    */
        /*function ativarBotaoDaListaDeEdicoes(){
            $("button.carregar-form").click(function(){
                
                if($($(this).data("target")).hasClass("show")){
                    limparModalidadeEdicoesConteudos();
                    console.log("entrei");
                    return;
                }
                
                $($(this).data("target")).html($("#conteudo-loading").html());
                
                let modalidadeEdicaoId = $(this).children("input").val();
                let data = {
                    id: modalidadeEdicaoId,
                }
                //$($(this).data("target")).load(`${BASE_URL}modalidades/ajaxExibirOpcoesModalidadeEdicao`, data);
            });
        }*/

        function ativarAccordion(){
            $(".modalidade-conteudo").on('show.bs.collapse', function(){
                $(this).html($("#conteudo-loading").html());
            })
            $(".modalidade-conteudo").on('shown.bs.collapse', function(){
                let data = {
                    id: $(this).siblings("input").val(),
                }
                $(this).load(`${BASE_URL}modalidades/ajaxExibirAccordion`, data);
            })
            $(".modalidade-conteudo").on('hidden.bs.collapse', function(){
                $(this).empty();
            })
        }
})