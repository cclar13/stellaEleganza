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
    if (divProcessando) {
        document.body.removeChild(divProcessando);
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

// var options = {
//     onKeyPress: function (tell, e, field, options) {
//         var masks = ['(00) 0 0000-0000', '(00) 0000-0000'];
//         var mask = (tell.length < 15) ? masks[1] : masks[0];
//         $('.telefoneBR').mask(mask, options);
//     }
// };
$('.telefoneBR').mask('(00) 0 0000-0000');


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
                    formulario.reset()
                    alertSuccess(data.message, 'green')
                } else {
                    alertError('Algo deu Errado, tente novamente.')
                }

            })
        // .catch(error => {
        //     console.error('Erro na requisição:', error);
        // });
    }
    formulario.addEventListener('submit', submitHandler);
}

function abrirModalJsAdm(id, inID, idFoto, infoto, innome, idNome, inemail, idEmail, insenha, idSenha, nomeModal, dataTime, abrirModal = 'A', botao, addEditDel, inFocus, inFocusValue, formulario) {
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


        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

            if (dataTime !== 'nao') {
                formData.append('dataTime', `${dataTime}`)
            }
            formData.append('controle', `${addEditDel}`)


            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        carregarConteudo("listarVenda");

                        switch (addEditDel) {
                            case 'addVenda':
                                addOuEditSucesso('Você', 'success', 'adicionou')
                                break;
                            case 'editVenda':
                                addOuEditSucesso('Você', 'info', 'editou')
                                botoes.disabled = false;
                                break;
                            case 'deleteVenda':
                                addOuEditSucesso('Você', 'success', 'deletou')
                                botoes.disabled = false;
                                break;
                        }
                        ModalInstacia.hide();
                    } else {
                        ModalInstacia.hide();
                        carregarConteudo("listarVenda");
                    }
                })
                // .catch(error => {
                //     botoes.disabled = false;
                //     ModalInstacia.hide();
                //     addErro()
                //     carregarConteudo("listarVenda");
                //     console.error('Erro na requisição:', error);
                // });
        }
        formDados.addEventListener('submit', submitHandler);
    } else {
        botoes.disabled = false;
        ModalInstacia.hide();
    }
}

function abrirModalBanner(img1, img2, img3, nomeModal, abrirModal = 'A', botao, addEditDel, formulario) {
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
            imagem1 = document.getElementById(`${img1}`)
            if (imagem1.value == '') {
                formData.append('item1', `vazio`)
                imagem1.append('foto1', imagem1.files[0]);
            }
            imagem2 = document.getElementById(`${img2}`)
            if (imagem2.value == '') {
                formData.append('item2', `vazio`)
                imagem2.append('foto2', imagem2.files[0]);

            }
            imagem3 = document.getElementById(`${img3}`)
            if (imagem3.value == '') {
                formData.append('item3', `vazio`)
                imagem3.append('foto3', imagem3.files[0]);

            }
            fetch('../controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
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
                        alertSuccess(data.message, '#1B7E008C')
                        ModalInstacia.hide();
                    } else {
                        alertError(data.message)
                    }
                })
            // .catch(error => {
            //     botoes.disabled = false;
            //     ModalInstacia.hide();
            //     console.error('Erro na requisição:', error);
            // });
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

if (document.getElementById('diminuirQtd')) {

    const menos = document.getElementById('diminuirQtd');
    const mais = document.getElementById('aumentarQtd');
    let qtdProduto = parseInt(document.getElementById('qtdProduto').value);

    menos.addEventListener('click', () => {
        if (qtdProduto > 0) {
            qtdProduto -= 1;
        } else {
            qtdProduto = 0;
        }

        document.getElementById('qtdProduto').value = parseInt(qtdProduto);
        console.log(qtdProduto);
    });

    mais.addEventListener('click', () => {

        qtdProduto += 1;

        document.getElementById('qtdProduto').value = parseInt(qtdProduto);
        console.log(qtdProduto);
    });

}