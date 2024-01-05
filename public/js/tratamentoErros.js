document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('cadastrarMercadoria').addEventListener('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        fetch('http://localhost/reluisa/estoques/cadastrarmercadoria', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro! Verifique o formato ou se o código já está em uso!');
            }
            return response.json();
        })
        .catch(error => {
            document.getElementById('cod_mercadoria').classList.add('is-invalid');
            document.getElementById('mensagemErro').textContent = error.message;
            console.error('Erro inesperado:', error);
        });
    });
});


