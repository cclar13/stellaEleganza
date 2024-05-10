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
                }, 2000);
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
    var divProcessando = document.createElement("div");
    divProcessando.id = "processandoDiv";
    divProcessando.style.position = "fixed";
    divProcessando.style.top = "10%";
    divProcessando.style.left = "50%";
    divProcessando.style.transform = "translate(-50%, -50%)";
    divProcessando.innerHTML =
        '<img src="./img/loading.gif" width="70px" alt="Processando..." title="Processando...">';
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
    }
    else {
        inputPass.setAttribute('type', 'password');
        btnShowPass.classList.replace('bi-eye', 'bi-eye-slash');
    }
}

function carregarConteudo(controle){
    fetch('controle.php', {
        method: 'POST', headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }, body: 'controle=' + encodeURIComponent(controle),
    })
        .then(response => response.text())
        .then(data => {

            document.getElementById('show').innerHTML= data;
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
}

$('.cpf').mask('000.000.000-00');
//
// var options = {
//     onKeyPress: function (tell, e, field, options) {
//         var masks = ['(00) 0 0000-0000', '(00) 0000-0000'];
//         var mask = (tell.length < 15) ? masks[1] : masks[0];
//         $('.telefoneBR').mask(mask, options);
//     }
// };
// $('.telefoneBR').mask('(00) 0 0000-0000', options);
//
//
