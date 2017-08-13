/**
 * Scroll up event.
 */
$(document).ready(function () {
    $('#coursetagcheckbox').hide();
    $('#booktagcheckbox').hide();
    $('#booktag').click(function(){
        $('#booktagcheckbox').show();
        $('#coursetagcheckbox').hide();
    });
    $('#coursetag').click(function(){
        $('#coursetagcheckbox').show();
        $('#booktagcheckbox').hide();
    });
});
if($("#Ccheckbox").is(":checked")){
    $("#Cshow").show();
}
$( "#Ccheckbox" ).on( "click", function(){
    if ( $(this).is(":checked") ){
        $("#Cshow").show();
    }
    else{
        $("#Cshow").hide();
    }
} );


