$( "#submit" ).submit(function( event ) {
    alert( $("#url").value() );
    event.preventDefault();
});