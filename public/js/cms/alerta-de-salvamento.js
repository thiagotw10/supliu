window.onload = function(){
   let sucesso = document.getElementById('sucesso').value
    if(sucesso == 'album'){
        swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Album adicionado com SUCESSO!!',
            showConfirmButton: false,
            timer: 2500
        })
    }
}
