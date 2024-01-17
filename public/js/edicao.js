$(document).ready(function(){
    $('.editButton').click(function(){
        var id = $(this).data("id");
        var codigo = $(this).data("codigo");
        var nome = $(this).data("nome");
        var quantidade = $(this).data("quantidade");
        var cor = $(this).data("cor");
        var tamanho = $(this).data("tamanho");
        var fornecedor = $(this).data("idfornecedor");
        $('#codigo_produto').val(codigo);
        $('#nome_produto').val(nome);
        $('#cor_produto').val(cor);
        $('#quantidade_produto').val(quantidade);
        $('#tamanho_produto').val(tamanho);
        $('#fornecedor_produto').val(fornecedor);
        $('#id_produto').val(id);
    });

    $('#toggleFilterArea').click(function(){
        $('#filterArea').slideToggle();
    });

    
});