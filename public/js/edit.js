alert("lucas")
$(document).ready(function(){
    $('.editButton').click(function(){
        var id = $(this).data("id");
        var codigo = $(this).data("codigo");
        var nome = $(this).data("nome");
        var quantidade = $(this).data("quantidade");
        var valor = $(this).data("valorprod");
        var fornecedor = $(this).data("idfornecedor");
        $('#codigo_produto').val(codigo);
        $('#nome_produto').val(nome);
        $('#quantidade_produto').val(quantidade);
        $('#fornecedor_produto').val(fornecedor);
        $('#valor_produto').val(valor);
        $('#id_produto').val(id);
    });

    $('#toggleFilterArea').click(function(){
        $('#filterArea').slideToggle();
    });

    
});