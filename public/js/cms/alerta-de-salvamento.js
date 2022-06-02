window.onload = function(){
   let sucesso = document.getElementById('sucesso').value
    if(sucesso == 'album'){
        swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Álbum adicionado com SUCESSO!!',
            showConfirmButton: false,
            timer: 2500
        })
    }
    if(sucesso == 'albumUpdate'){
        swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Álbum editado com SUCESSO!!',
            showConfirmButton: false,
            timer: 2500
        })
    }
    if(sucesso == 'entrar'){
        swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Login feito com SUCESSO!!',
            showConfirmButton: false,
            timer: 2500
        })
    }
    if(sucesso == 'sair'){
        swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Usuário desconectado com SUCESSO!!',
            showConfirmButton: false,
            timer: 2500
        })
    }
}
