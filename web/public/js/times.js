$(function(){
    $(document).ready(function() {
        $('#tabela-times').DataTable({
            language: {
                url: `${BASE_URL}public/util/dataTablesTraducao.json`
            }
        });
    } );
})