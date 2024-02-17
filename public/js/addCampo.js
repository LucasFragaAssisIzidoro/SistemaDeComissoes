$(document).ready(function(){
    let contador = 1;

    $('#adicionarCampo').click(function(){
        let novoCampo = `<div class="form-group row px-4">
                            <div class="col">
                                <label for="codigo_${contador}">Código:</label>
                                <input type="number" class="form-control form-control-sm" id="codigo_${contador}" name="codigo_${contador}" required>
                            </div>
                            <div class="col">
                                <label for="quantidade_${contador}">Quantidade:</label>
                                <input type="number" class="form-control form-control-sm" id="quantidade_${contador}" name="quantidade_${contador}" required>
                            </div>
                        </div>`;

        $('#formulario').append(novoCampo);
        contador++;
    });
    
});
