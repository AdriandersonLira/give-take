
// # -------------- Telefone / CPF  ----------------

let tel = document.querySelector('#tel');
//let cpf = document.querySelector('#cpf');

tel.addEventListener('keypress', function() {
    validar('##-#####-####', tel)
});

//cpf.addEventListener('keypress', function() {
//    validar('###.###.###-##', cpf)
//});

function validar(mascara,documento) {
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(documento.value.length);
    
    if (texto.substring(0,1) != saida) {
        documento.value += texto.substring(0,1);
    }
}

// # -------------- Profissões  ----------------

let select = document.querySelector('#prof');

create_grpOption(profissoes,select);

function create_grpOption(profissoes,select) {
    for (let i = 1; i < profissoes.length; i++)  {
        select.insertAdjacentHTML('beforeend', `<option value="${profissoes[i]}">${profissoes[i]}</option>`)
    }
}


function alterar(btn, divAlter) {
    if (btn.value == '0') {
        divAlter.children[0].insertAdjacentHTML('afterend', returnText());
        divAlter.removeChild(divAlter.children[2])
        btn.value = '1'
    } else {
        divAlter.children[0].insertAdjacentHTML('afterend', returnSelect());
        divAlter.removeChild(divAlter.children[2])
        btn.value = '0'
    }
}

function returnText() {
    return `
    <input type="text" name="prof" id="prof" placeholder="Digite sua profissão" class="form-control" aria-label="Profissão" aria-describedby="basic-addon1" required>
    `
}

function returnSelect() {
    select2 = `
    <select id="prof" name="prof" class="form-control custom-select" required>
        <option value="">Selecione sua profissão</option>
    `
    for (let i = 1; i < profissoes.length; i++)  {
        select2 += `<option value="${profissoes[i]}">${profissoes[i]}</option>`
    }

    return select2 += `</select>`
}



// # -------------- Apresentar pass  ----------------

let visibility_  = document.querySelector('.visibility_');
let visibility__ = document.querySelector('.visibility__');
let pass         = document.querySelector('#pass');
let btnPass      = document.querySelector('#btnPass');
let confPass     = document.querySelector('#confPass');
let btnConfPass  = document.querySelector('#btnConfPass');

btnPass.addEventListener('click', function() {
    mostrarSenha(pass, visibility_)
});

btnConfPass.addEventListener('click', function() {
    mostrarSenha(confPass, visibility__);
});

function mostrarSenha(text,visibility) {
    if (text.type == 'password') {
        text.type = 'text'
        visibility.innerHTML = ''
        visibility.innerHTML = 'visibility_off'
    } else {
        text.type = 'password'
        visibility.innerHTML = ''
        visibility.innerHTML = 'visibility'
    }
}

// # -------------- Validar Pass  ----------------

function validaForm(nomeform, msg) {
    msg.innerHTML = ''

    if (nomeform.pass.value.length < 8) {
        msg.insertAdjacentHTML('afterbegin', 'Quantidade de caracteres no campo senha deve ser maior que 8');
        return false;
    }

    if (nomeform.pass.value != nomeform.confPass.value) {
        msg.insertAdjacentHTML('afterbegin', 'As senhas não condizem');
        return false;
    }

    return true;
}