$(document).ready(function() {
    $('#cadastrarMercadoria').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: 'http://localhost/reluisa/estoques/cadastrarmercadoria',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data, textStatus, jqXHR) {
                $('#cod_mercadoria').val('');
                $('#categoria_mercadoria').val('');
                $('#cod_mercadoria').removeClass('is-invalid');
                $('#mensagemErro').text('');
                $('#cod_mercadoria').focus();
                alert('Produto cadastrado com sucesso!');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#cod_mercadoria').addClass('is-invalid');
                $('#mensagemErro').text('Houve um erro no processo, verifique o formato ou se o código já foi cadastrado anteriormente!');
                console.error('Erro inesperado:', errorThrown);
            }
        });
    });


    $('#cadastrarProduto').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: 'http://localhost/reluisa/estoques/cadastrarproduto',
            data: formData,
            contentType: false,
            processData: false,
            success: function() {
                $('#quantidade_produto').val('');
                $('#codigo_produto').removeClass('is-invalid');
                $('#mensagemErroCodigo').text('');
                $('#mensagemErroNome').text('');
                $('#mensagemErroCor').text('');
                $('#mensagemErroQtde').text('');
                $('#quantidade_produto').focus();
                alert('Produto cadastrado com sucesso!');
            },
            error: function(errorThrown) {
                $('#codigo_produto').addClass('is-invalid');
                $('#mensagemErroCodigo').text('Houve um erro no processo, verifique os formatos ou se o código não foi cadastrado anteriormente!');
                $('#mensagemErroNome').text('Houve um erro no processo, verifique os formato digitado, lembre-se que deve ser texto!');
                $('#mensagemErroQtde').text('Houve um erro no processo, verifique os formato digitado, lembre-se que deve ser númerico!');
                $('#mensagemErroCor').text('Houve um erro no processo, verifique os formato digitado, lembre-se que deve ser texto!');
                console.log('Erro inesperado:', errorThrown);
            }
        });
    });
});
