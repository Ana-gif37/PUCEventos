
jQuery(function ($) {
    $("#cpfPessoa").mask("99999999999");
    $("#matricula").mask("9?999999999");
    $("#cnpjEmpresa").mask("99.999.999/9999-99");
    $("#dataInicioInscricao").mask("99/99/9999");
    $("#dataFimInscricao").mask("99/99/9999");
    $("#dataInicioEvento").mask("99/99/9999");
    $("#dataChamada").mask("99/99/9999");
    $("#dataFimEvento").mask("99/99/9999");
    $("#dataNascimento").mask("99/99/9999");
    $("#dataVencimento").mask("99/99/9999");
    $("#dataDocumento").mask("99/99/9999");
    $("#horaInicio").mask("99:99");
    $("#horaFinal").mask("99:99");
    $("#quantidadeVagas").mask("9?999999999");
    $("#prazoPagamento").mask("9?99");
    $("#numeroDocumento").mask("9?999999");
    $("#nossoNumero").mask("9?999999");
    $("#agencia").mask("9999?999");
    $("#codigoCliente").mask("9?999999");
    $("#carteira").mask("9?999");
    $("#cargaHoraria").mask("9?999999999");

    $("#valorCobrado").maskMoney({

        decimal: ',', // Separador do decimal
        precision: 2, // Precisão
        thousands: '', // Separador para os milhares
        allowZero: false // Permite que o digito 0 seja o primeiro caractere

    });

  

    $('#cpfCnpj').focusout(function () {
        var cpfcnpj, element;
        element = $(this);
        element.unmask();
        cpfcnpj = element.val().replace(/\D/g, '');
        if (cpfcnpj.length > 11) {
            element.mask("99.999.999/9999-99");

        } else {
            element.mask("999.999.999-99?99999");
        }
    }
    ).trigger('focusout');
});
