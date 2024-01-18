$(document).ready(function(){
    $('.editButton3').click(function(){
        var id = $(this).data("id");
        var nome = $(this).data("nome");
        var telefone = $(this).data("telefone");
        var email = $(this).data("email");
        var endereco = $(this).data("endereco");
        $('#id').val(id);
        $('#nome').val(nome);
        $('#telefone').val(telefone);
        $('#email').val(email);
        $('#endereco').val(endereco);
    });
    
});