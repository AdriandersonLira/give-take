let text = document.querySelector('.pesquisar');

text.addEventListener('input', function(profissoes){
    
    if (this.value.length > 0) {
        for (i of profissoes) {
            if((i.textContent).toLowerCase().slice(0, this.value.length ) != (this.value).toLowerCase()){
                i.parentNode.parentNode.classList.add("invisivel")
                
            }
            else{
                i.parentNode.parentNode.classList.remove("invisivel")
            }

        
        }
    }
    else{
        profissoes.forEach( i => i.parentNode.parentNode.classList.remove("invisivel"))
    }
});