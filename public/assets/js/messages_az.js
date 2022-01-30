(function( factory ) {
    if ( typeof define === "function" && define.amd ) {
        define( ["jquery", "../jquery.validate"], factory );
    } else if (typeof module === "object" && module.exports) {
        module.exports = factory( require( "jquery" ) );
    } else {
        factory( jQuery );
    }
}(function( $ ) {

    /*
     * Translated default messages for the jQuery validation plugin.
     * Locale: Az (Azeri; azÉ™rbaycan dili)
     */
    $.extend( $.validator.messages, {
        required: "Bu xana mÃ¼tlÉ™q doldurulmalÄ±dÄ±r.",
        remote: "ZÉ™hmÉ™t olmasa, dÃ¼zgÃ¼n mÉ™na daxil edin.",
        email: "ZÉ™hmÉ™t olmasa, dÃ¼zgÃ¼n elektron poÃ§t daxil edin.",
        url: "ZÉ™hmÉ™t olmasa, dÃ¼zgÃ¼n URL daxil edin.",
        date: "ZÉ™hmÉ™t olmasa, dÃ¼zgÃ¼n tarix daxil edin.",
        dateISO: "ZÉ™hmÉ™t olmasa, dÃ¼zgÃ¼n ISO formatlÄ± tarix daxil edin.",
        number: "ZÉ™hmÉ™t olmasa, dÃ¼zgÃ¼n rÉ™qÉ™m daxil edin.",
        digits: "ZÉ™hmÉ™t olmasa, yalnÄ±z rÉ™qÉ™m daxil edin.",
        creditcard: "ZÉ™hmÉ™t olmasa, dÃ¼zgÃ¼n kredit kart nÃ¶mrÉ™sini daxil edin.",
        equalTo: "ZÉ™hmÉ™t olmasa, eyni mÉ™nanÄ± bir daha daxil edin.",
        extension: "ZÉ™hmÉ™t olmasa, dÃ¼zgÃ¼n geniÅŸlÉ™nmÉ™yÉ™ malik faylÄ± seÃ§in.",
        maxlength: $.validator.format( "ZÉ™hmÉ™t olmasa, {0} simvoldan Ã§ox olmayaraq daxil edin." ),
        minlength: $.validator.format( "ZÉ™hmÉ™t olmasa, {0} simvoldan az olmayaraq daxil edin." ),
        rangelength: $.validator.format( "ZÉ™hmÉ™t olmasa, {0} - {1} aralÄ±ÄŸÄ±nda uzunluÄŸa malik simvol daxil edin." ),
        range: $.validator.format( "ZÉ™hmÉ™t olmasa, {0} - {1} aralÄ±ÄŸÄ±nda rÉ™qÉ™m daxil edin." ),
        max: $.validator.format( "ZÉ™hmÉ™t olmasa, {0} vÉ™ ondan kiÃ§ik rÉ™qÉ™m daxil edin." ),
        min: $.validator.format( "ZÉ™hmÉ™t olmasa, {0} vÉ™ ondan bÃ¶yÃ¼k rÉ™qÉ™m daxil edin" )
    } );
    return $;
}));
