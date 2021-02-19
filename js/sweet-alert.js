function exc_tamanho(clicked_id) {  

    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Tem certeza?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não',
        reverseButtons: true
        },
        
        ).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
            'Excluido!', 
            '',
            'success',
            window.location.href = 'php/cardapio/exc-tamanho.php?idPizza='+clicked_id,
            )
        }
    })
}

function exc_sabor(clicked_id) {  

    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Tem certeza?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não',
        reverseButtons: true
        },
        
        ).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
            'Excluido!', 
            '',
            'success',
            window.location.href = 'php/cardapio/exc-sabor.php?idSabor='+clicked_id,
            )
        }
    })
}