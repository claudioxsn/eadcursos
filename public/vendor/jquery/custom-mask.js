jQuery(document).ready(function ($) {
    /* == phone mask == */
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
    $('.telefone').mask(SPMaskBehavior, spOptions);


    // cpf mask
    var CpfCnpjMaskBehavior = function (val) {
         if(val.replace(/\D/g, '').length <= 11) return '00000000000';
    },
        cpfCnpjpOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(CpfCnpjMaskBehavior.apply({}, arguments), options);
            }
        };
    $('.cpf').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);
    /* === END MASK FIELDS === */
});