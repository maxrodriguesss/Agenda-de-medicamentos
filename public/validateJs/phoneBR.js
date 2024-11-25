$.validator.addMethod( "phoneBR", function( value, element ) {
    return this.optional( element ) || (value.length > 9 &&
        value.match( /^\([1-9]{2}\) (?:[2-8]|9\-[1-9])[0-9]{3}\-[0-9]{4}$/ ));
}, "Por favor, especifique um numero de telefone valido" );

var SPMaskBehavior = function (val) {return val.replace(/\D/g, '').length === 11 ? '(00) 0-0000-0000' : '(00) 0000-00009'; },
    spOptions = {onKeyPress: function(val, e, field, options) {field.mask(SPMaskBehavior.apply({}, arguments), options); }};

$('.phoneBR').mask(SPMaskBehavior, spOptions);