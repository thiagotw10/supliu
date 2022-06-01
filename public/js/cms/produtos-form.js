var  array = []
var c = 0

    function informacoesGerais(){
                            let elementoPai = document.getElementById('informacoesGerais')

                            let div = document.createElement("div")
                            div.style.display = 'flex';
                            elementoPai.appendChild(div)


                            let novoInput = document.createElement("input");
                            novoInput.type = "text";
                            novoInput.style.width = '174px'
                            novoInput.name = "faixa[]"
                            novoInput.className = "form-control";
                            div.appendChild(novoInput);

                            let novoInputDois = document.createElement("input");
                            novoInputDois.type = "text";
                            novoInputDois.style.width = '174px'
                            novoInputDois.name = "duracao[]"
                            novoInputDois.className = "form-control";
                            div.appendChild(novoInputDois);


                            let divbotao = document.createElement("div")
                            divbotao.className = "botao m-2"
                            div.appendChild(divbotao)

                            let botao = document.createElement("div")
                            botao.style.padding = "3px 10px"
                            botao.className = "btn-danger"
                            botao.style.cursor = "pointer"
                            botao.innerHTML = '-'
                            botao.onclick = function(){
                                div.parentNode.removeChild(div)
                            }
                            divbotao.appendChild(botao)

    }


    function limparCampos(id){
       console.log(id)
        let campo = document.getElementById(id)
        campo.remove()
        localStorage.removeItem(id)


    }


    function modelo(){

        var elementoPai = document.getElementById('modelo');
        var modelo = document.getElementById('modelosSelect');
        var BotaoModelo = document.getElementById('botaoModelo');
        elementoPai.style.display = 'block';
        BotaoModelo.style.display = 'none';
        modelo.style.display = 'none';


                let div = document.createElement("div")
                div.style.display = 'flex';
                elementoPai.appendChild(div)


                let novoInput = document.createElement("input");
                novoInput.type = "text";
                novoInput.style.width = '165px'
                novoInput.id = 'model'
                novoInput.name = 'modelos'
                novoInput.className = "form-control";
                div.appendChild(novoInput);


                let divbotao = document.createElement("div")
                divbotao.className = "botao m-2"
                div.appendChild(divbotao)

                // let botao = document.createElement("div")
                // botao.style.padding = "3px 10px"
                // botao.className = "btn-success"
                // botao.style.cursor = "pointer"
                // botao.innerHTML = 'Cadastrar'
                // botao.onclick = function(){
                //     axios.post(window.location.origin + '/api/modelos', {
                //         modelos: document.getElementById('model').value,
                //       })
                //       .then(function (response) {
                //         console.log(response.data);
                //         BotaoModelo.style.display = 'none';
                //         elementoPai.style.display = 'none';
                //         let id = parseInt(response.data.id);
                //         modelo.style.display = 'block';
                //         modelo.innerHTML += `<option value="`+id+`"> `+response.data.modelos+` </option>`

                //       })
                //       .catch(function (error) {
                //         console.error(error);
                //       });
                // }
                // divbotao.appendChild(botao)

}




           function salvar(){

                swal.fire({
                        title: 'Deseja realmente salvar ?',
                        showCancelButton: true,
                        confirmButtonText: 'Sim, adiciona-lo',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.value) {

                            document.getElementById('enviar').click()

                        }
                    })
            }




















            function okDelete(id, img) {
                console.log(img)
                console.log(id)
                swal.fire({
                    title: 'Deseja realmente excluir esse album?',
                    text: 'Você não poderá reverter isso!',
                    showCancelButton: true,
                    confirmButtonText: 'Sim, exclua-o!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        removeRegister(id);
                    }
                })
            }


            function removeRegister(id) {

                axios.get(window.location.origin + '/album/delete/'+id)
                .then(function (response) {

                    swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Excluído!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    setInterval(displayHello, 2000);

                    function displayHello(){
                        return document.location.reload(true);
                    }


                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });



            }





            function okDeletelink(id) {
                swal.fire({
                    title: 'Deseja realmente excluir esse vídeo?',
                    text: 'Você não poderá reverter isso!',
                    imageHeight: 100,
                    showCancelButton: true,
                    confirmButtonText: 'Sim, exclua-o!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        removeRegisterlink(id);
                    }
                })
            }



            function removeRegisterlink(id) {

                axios.get(window.location.origin + '/cms/produtos/link/delete/'+id)
                .then(function (response) {

                    swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Excluído!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    setInterval(displayHello, 2000);

                    function displayHello(){
                        return document.location.reload(true);
                    }


                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });



            }





            function deleteInformacoes(id) {


                console.log(id)
                swal.fire({
                    title: 'Deseja realmente excluir essa informacão?',
                    text: 'Você não poderá reverter isso!',
                    showCancelButton: true,
                    confirmButtonText: 'Sim, exclua-o!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        removeInformacao(id);
                    }
                })
            }



            function removeInformacao(id) {

                axios.get(window.location.origin + '/cms/produtos/informacoes/delete/'+id)
                .then(function (response) {

                    swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Excluído!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    setInterval(displayHello, 2000);

                    function displayHello(){
                        return document.location.reload(true);
                    }


                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });



            }



            function deleteOpcionais(id) {

                console.log(id)
                swal.fire({
                    title: 'Deseja realmente excluir essa informacão opcional?',
                    text: 'Você não poderá reverter isso!',
                    imageHeight: 100,
                    showCancelButton: true,
                    confirmButtonText: 'Sim, exclua-o!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        removeOpcionais(id);
                    }
                })
            }



            function removeOpcionais(id) {

                axios.get(window.location.origin + '/cms/produtos/opcionais/delete/'+id)
                .then(function (response) {

                    swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Excluído!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    setInterval(displayHello, 2000);

                    function displayHello(){
                        return document.location.reload(true);
                    }


                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });



            }



            function deleteCaracter(id) {

                console.log(id)
                swal.fire({
                    title: 'Deseja realmente excluir essa caracteristica?',
                    text: 'Você não poderá reverter isso!',
                    imageHeight: 100,
                    showCancelButton: true,
                    confirmButtonText: 'Sim, exclua-o!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        removeCaracter(id);
                    }
                })
            }



            function removeCaracter(id) {

                axios.get(window.location.origin + '/cms/produtos/caracteristicas/delete/'+id)
                .then(function (response) {

                    swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Excluído!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    setInterval(displayHello, 2000);

                    function displayHello(){
                        return document.location.reload(true);
                    }


                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });



            }




        var loadFile = function(event) {
        var recebe = document.getElementById('recebeimg');

        console.log(event)

        for(var i= 0; i < event.target.files.length; i++){
              var imagem = document.createElement('img')
              imagem.src = URL.createObjectURL(event.target.files[i])
              imagem.height = '70'
              imagem.style.margin = '10px'
              console.log(imagem.src);
              recebe.appendChild(imagem)

            };

        }


