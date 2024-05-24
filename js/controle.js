function fazerLogin() {
    var email = document.getElementById("email").value;
    var senha = document.getElementById("senha").value;
    var alertlog = document.getElementById("alertlog");

    if (email === "") {
        alertlog.style.display = "block";
        alertlog.innerHTML =
            "Email não digitado.";
        return;
    } else if (senha === "") {
        alertlog.style.display = "block";
        alertlog.innerHTML =
            "Senha não digitada.";
        return;
    } else if (senha.length < 8) {
        alertlog.style.display = "block";
        alertlog.innerHTML = "Mínimo de 8 digitos.";
        return;
    } else {
        alertlog.style.display = "none";
    }
    mostrarProcessando();
    fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body:
            "email=" +
            encodeURIComponent(email) +
            "&senha=" +
            encodeURIComponent(senha),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data)
            if (data.success) {
                setTimeout(function () {
                    window.location.href = "dashboard.php";
                }, 1000);
                //alert(data.message);
                alertlog.classList.remove("erroBonito");
                alertlog.classList.add("acertoBonito");
                alertlog.innerHTML = data.message;
                alertlog.style.display = "block";
            } else {
                alertlog.style.display = "block";
                alertlog.innerHTML = data.message;
            }
            esconderProcessando();
        })
        .catch((error) => {
            console.error("Erro na requisição", error);
        });
}

// FUNCAO DE LOADING
function mostrarProcessando() {
    var divFundoEscuro = document.createElement('div');
    divFundoEscuro.id = 'fundoEscuro';
    divFundoEscuro.style.position = 'fixed';
    divFundoEscuro.style.top = '0';
    divFundoEscuro.style.left = '0';
    divFundoEscuro.style.width = '100%';
    divFundoEscuro.style.height = '100%';
    divFundoEscuro.style.backgroundColor = 'rgba(0,0,0,0.7)';
    document.body.appendChild(divFundoEscuro);

    var divProcessando = document.createElement("div");
    divProcessando.id = "processandoDiv";
    divProcessando.style.position = "fixed";
    divProcessando.style.top = "50%";
    divProcessando.style.left = "50%";
    divProcessando.style.transform = "translate(-50%, -50%)";
    divProcessando.innerHTML =
        '<img src="../img/loading.gif" width="70px" alt="Processando..." title="Processando...">';
    document.body.appendChild(divProcessando);
}

// FUNCAO DE ESCONDER O LOADING
function esconderProcessando() {
    var divProcessando = document.getElementById("processandoDiv");
    var divFundo = document.getElementById('fundoEscuro');
    if (divProcessando) {
        document.body.removeChild(divProcessando);
        document.body.removeChild(divFundo);
    }
}


function mostrarsenha() {
    var inputPass = document.getElementById('senha');
    var btnShowPass = document.getElementById('btn-senha');

    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        btnShowPass.classList.replace('bi-eye-slash', 'bi-eye');
    } else {
        inputPass.setAttribute('type', 'password');
        btnShowPass.classList.replace('bi-eye', 'bi-eye-slash');
    }
}

function carregarConteudo(controle) {
    fetch('controle.php', {
        method: 'POST', headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }, body: 'controle=' + encodeURIComponent(controle),
    })
        .then(response => response.text())
        .then(data => {

            document.getElementById('show').innerHTML = data;
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
}

$('.cpf').mask('000.000.000-00');

$('.telefoneBR').mask('(00) 0 0000-0000');

$('.dinheiro').mask('000.000.000.000.000,00', {reverse: true});

function addContato() {
    const formulario = document.getElementById('frmContato');
    const submitHandler = function (event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);
        formData.append('controle', 'addContato');
        fetch('controle.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                if (data.success) {
                    alertSuccess(data.message, 'green')
                    form.reset()
                } else {
                    alertError('Algo deu Errado, tente novamente.')
                    form.reset()
                }

            })
            .catch(error => {
                console.error('Erro na requisição:', error);
            });
    }
    formulario.addEventListener('submit', submitHandler);
}

function abrirModalJsAdm(id, inID, idFoto, infoto, caminhoFoto, innome, idNome, inemail, idEmail, insenha, idSenha, nomeModal, dataTime, abrirModal = 'A', botao, addEditDel, addEditFoto, inFocus, inFocusValue, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    var botoes = document.getElementById(`${botao}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();

        const inputFocar = document.getElementById(`${inFocus}`);
        if (inFocusValue !== 'nao') {
            inputFocar.value = inFocusValue;
            setTimeout(function () {
                inputFocar.focus();

            }, 500);
        }
        const ID = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            ID.value = id;
        }
        const foto = document.getElementById(`${infoto}`);
        if (infoto !== 'nao') {
            foto.value = idFoto;
        }
        const nome = document.getElementById(`${innome}`);
        if (innome !== 'nao') {
            nome.value = idNome;
        }
        const email = document.getElementById(`${inemail}`);
        if (inemail !== 'nao') {
            email.value = idEmail;
        }
        const senha = document.getElementById(`${insenha}`);
        if (insenha !== 'nao') {
            senha.value = idSenha;
        }
        let imgVermais = document.getElementById('fotoVermais')
        if (caminhoFoto !== 'nao') {
            imgVermais.src = '../img/perfil/' + `${caminhoFoto}`;

        }


        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

            if (dataTime !== 'nao') {
                formData.append('dataTime', `${dataTime}`)
            }
            formData.append('controle', `${addEditDel}`)
            if (addEditFoto !== 'nao') {
                let fileInput = document.getElementById(`${addEditFoto}`)
                formData.append('foto', fileInput.files[0]);
            }

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    // console.log(data)
                    if (data.success) {
                        alertSuccess(data.message, '#1B7E00')
                        carregarConteudo("listarAdm");
                        ModalInstacia.hide();

                    } else {
                        alertError(data.message)
                        ModalInstacia.hide();
                        carregarConteudo("listarAdm");
                    }
                })
            .catch(error => {
                botoes.disabled = false;
                ModalInstacia.hide();
                carregarConteudo("listarAdm");
                console.error('Erro na requisição:', error);
            });
        }
        formDados.addEventListener('submit', submitHandler);
    } else {
        botoes.disabled = false;
        ModalInstacia.hide();
    }
}

function abrirModalBanner(img1, img2, img3, img4, nomeModal, abrirModal = 'A', botao, addEditDel, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    var botoes = document.getElementById(`${botao}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();

        const submitHandler = function (event) {
            event.preventDefault();
            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

            formData.append('controle', `${addEditDel}`)
            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alertSuccess(data.message, '#1B7E00')
                        carregarConteudo('listarBanner')

                    } else {
                        alertError(data.message)
                        carregarConteudo('listarBanner')

                    }
                    ModalInstacia.hide();
                })
                .catch(error => {
                    console.error('Erro na requisição:', error);
                });
        }
        formDados.addEventListener('submit', submitHandler);
    } else {

        ModalInstacia.hide();
    }
}

function abrirModalContato(id, inID, nome, InNome, nomeModal, abrirModal = 'A', botao, addEditDel, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    var botoes = document.getElementById(`${botao}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();


        const ID = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            ID.value = id;
        }
        const nomeinput = document.getElementById(`${InNome}`)
        if (InNome !== 'nao') {
            nomeinput.innerHTML = nome;
        }
        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);
            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alertSuccess(data.message, '#156400')
                        carregarConteudo('listarContato')
                        ModalInstacia.hide();
                        botoes.disabled = false;
                        formDados.reset()
                    } else {
                        alertError(data.message)
                        carregarConteudo('listarContato')
                        ModalInstacia.hide();
                        botoes.disabled = false;

                    }
                })
                .catch(error => {
                    botoes.disabled = false;
                    ModalInstacia.hide();
                    console.error('Erro na requisição:', error);
                });
        }
        formDados.addEventListener('submit', submitHandler);
    } else {
        botoes.disabled = false;
        ModalInstacia.hide();
    }
}

function abrirModalProduto(id, INPid, idsexo, INPidsexo, nomeProduto, INPnomeProduto, tipo, INPtipo, nomeFoto, INPnomeFoto,genero, idImgVm, valor, INPvalor, marca, INPmarca, cor, INPcor, tamanho, INPtamanho,idTelainicial,INPtelaIncial,idPosicao,INPposicao, nomeModal, abrirModal = 'A', botao, addEditDel, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    var botoes = document.getElementById(`${botao}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();
        const imgMeme = document.querySelector('#meme-image');
        const memeInput = document.querySelector('#fotoProdutoAdd');
        memeInput.addEventListener('change', function (evt) {
            if (!(evt.target && evt.target.files && evt.target.files.length > 0)) {
                return;
            }

            // Inicia o file-reader:
            var r = new FileReader();
            // Define o que ocorre quando concluir:
            r.onload = function () {
                // Define o `src` do elemento para o resultado:
                imgMeme.src = r.result;
            }
            // Lê o arquivo e cria um link (o resultado vai ser enviado para o onload.
            r.readAsDataURL(evt.target.files[0]);

        });


        const ID = document.getElementById(`${INPid}`);
        if (INPid !== 'nao') {
            ID.value = id;
        }
        const idGenero = document.getElementById(`${INPidsexo}`)
        if (INPidsexo !== 'nao') {
            idGenero.value = idsexo;
        }
        const nomeinput = document.getElementById(`${INPnomeProduto}`)
        if (INPnomeProduto !== 'nao') {
            nomeinput.value = nomeProduto;
            nomeinput.innerHTML = nomeProduto;
        }
        const tipoRoupa = document.getElementById(`${INPtipo}`)
        if (INPtipo !== 'nao') {
            tipoRoupa.value = tipo;
        }
        const foto = document.getElementById(`${INPnomeFoto}`)
        if (INPnomeFoto !== 'nao') {
            foto.src = nomeFoto;
        }
        const fotoVerMais = document.getElementById(`${idImgVm}`)
        if (idImgVm !== 'nao'){
            fotoVerMais.src = '../img/roupas/' + genero + '/' + nomeFoto;
        }
        const valorRoupa = document.getElementById(`${INPvalor}`)
        if (INPvalor !== 'nao') {
            valorRoupa.value = valor;
            valorRoupa.innerHTML = valor;
        }
        const marcaLoja = document.getElementById(`${INPmarca}`)
        if (INPmarca !== 'nao') {
            marcaLoja.value = marca;
        }
        const corRoupa = document.getElementById(`${INPcor}`)
        if (INPcor !== 'nao') {
            corRoupa.value = cor;
        }
        const tamanhoRoupa = document.getElementById(`${INPtamanho}`)
        if (INPtamanho !== 'nao') {
            tamanhoRoupa.value = tamanho;
            // alert(tamanho)
        }

        const telainicial = document.getElementById(`${INPtelaIncial}`)
        if (INPtelaIncial !== 'nao') {
            telainicial.value = idTelainicial;
            // alert(idTelainicial)
        }
        const posicao = document.getElementById(`${INPposicao}`)
        if (INPposicao !== 'nao'){
            posicao.value = idPosicao;
        }
        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);
            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    // console.log(data);
                    if (data.success) {
                        alertSuccess(data.message, '#156400')
                        ModalInstacia.hide();
                        botoes.disabled = false;
                        // formDados.reset()
                        carregarConteudo('listarProduto')
                    } else {
                        alertError(data.message)
                        carregarConteudo('listarProduto')
                        ModalInstacia.hide();
                        botoes.disabled = false;
                    }
                })
                .catch(error => {
                    botoes.disabled = false;
                    ModalInstacia.hide();
                    console.error('Erro na requisição:', error);
                });
        }
        formDados.addEventListener('submit', submitHandler);
    } else {
        botoes.disabled = false;
        ModalInstacia.hide();
    }
}

function alertSuccess(msg, cor) {
    Toastify({
        text: `${msg}`,
        duration: 3000,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: `${cor}`,
            color: 'white',
        },
    }).showToast();
}

function alertError(msg) {
    Toastify({
        text: `${msg}`,
        duration: 3000,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "#F40000",
            color: 'white',
        },
    }).showToast();
}