// le traitement de changement de select pour sincroniser les autres select
$('#nomPrenom').on('change', function() {
   var selected = $(this).val();
   tableau = ["matrecule","nomPrenom","dateEmbache","dateNaissance","CNSS","poste","departement"];
   for(i=0;i<7;i++){
       if(i==1) continue;
       $("#"+tableau[i]+" option").each(function(item){
       		var element =  $(this) ;
       		if (element.data("tag") != selected){
       			element.hide() ;
       		}else{
       			element.show();
       		}
   	    }) ;
   	$("#"+tableau[i]+"").val($("#"+tableau[i]+" option:visible:first").val());
   }
   // console.log($("#nomPrenom").val());

});

function modifier(){

    var tab=[$('#matrecule').find(":selected").text(),$('#nomPrenom').find(":selected").text(),$('#dateEmbache').find(":selected").text(),$('#dateNaissance').find(":selected").text(),
            $('#CNSS').find(":selected").text(),$('#poste').find(":selected").text(),$('#departement').find(":selected").text()];

    for(i=1;i<=6;i++){
        document.querySelector('thead tr:nth-child(2) td:nth-child('+(i+1)+') input').value = tab[i-1];
    }
    document.querySelector('thead tr:nth-child(2) td:nth-child(8) select').value = tab[6];
    console.log(matrecule);
    $.ajax({
        type: "POST",
        url: "deletePersonne.php",
        data: { matrecule:$('#matrecule').find(":selected").text() }

    }).done(function( msg ) {
        console.log("modifier");
    });
}
function supprimer(){
    $.ajax({
        type: "POST",
        url: "deletePersonne.php",
        data: { matrecule:$('#matrecule').find(":selected").text() }

    }).done(function( msg ) {
        window.location.reload(true);
        console.log("supprimer");
    });
}
var TableAjax = function () {

    var initPickers = function () {
        //init date pickers
        $('.date-picker').datepicker({
            rtl: Metronic.isRTL(),
            autoclose: true
        });
    }



    return {

        //main function to initiate the module
        init: function () {

            initPickers();
        }

    };

}();
