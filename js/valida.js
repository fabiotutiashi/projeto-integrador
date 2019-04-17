function exibirErro (exibir) {
   
    if (exibir) {

        // adiciona borda vermelha
        description.classList.add('erro') 
        // exibe mensagem de erro
        erro.classList.remove('d-none') 
    } else {
        // remove borda vermelha
        description.classList.remove('erro') 
        // remove a caixa com mensagem de erro
        erro.classList.add('d-none') 
    }
}

function descricaoEstaIncorreta () {
    return description.value === '' || description.value.length < 5
}
 
function aoEnviarOFormulario (event) {
    event.preventDefault()

  

    if (descricaoEstaIncorreta()) {
        exibirErro(true)
        return
    }
}