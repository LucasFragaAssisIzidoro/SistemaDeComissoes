$(document).ready(function(){
    $('.editButton2').click(function(){
        var id = $(this).data("id");
        var nome = $(this).data("nome");
        var telefone = $(this).data("telefone");
        var email = $(this).data("email");
        $('#id_fornecedor').val(id);
        $('#nome_fornecedor').val(nome);
        $('#telefone_fornecedor').val(telefone);
        $('#email_fornecedor').val(email);
    });
    
});