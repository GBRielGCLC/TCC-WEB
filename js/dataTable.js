$(document).ready( function () {
    
    $('.tabela').DataTable({
        dom:"ft",
        //dom:"lfrtip",
        language: {
            Processing: "Procurando...",
            lengthMenu: "Exibindo _MENU_ itens por página",
            zeroRecords: "Nada encontrado!!",
            info: "Página _PAGE_ de _PAGES_",
            infoEmpty: "Nenhum item",
            infoFiltered: "(Filtrado de _MAX_ itens totais)",
            infoPostFix: "",
            search: "Buscar:",
            paginate: {
                previous: "Anterior",
                next: "Próximo",
            },  
        }
    });
} );