// le traitement de changement de select pour sincroniser les autres select
console.log("test");
$('#theme').on('change', function() {

   var selected = $(this).val();
   console.log($(this).attr("data-tag"));
   tableau = ["theme","population","dateDebut","dateFin","objectif","formateur","organisme","listPersonne"];
   for(i=0;i<8;i++){
       if(i==0) continue;
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
   console.log($("#nomPrenom").val());

});

function modifier(){

    var tab=[$('#theme').find(":selected").text(),$('#population').find(":selected").text(),$('#dateDebut').find(":selected").text(),$('#dateFin').find(":selected").text(),
            $('#objectif').find(":selected").text(),$('#formateur').find(":selected").text(),$('#organisme').find(":selected").text()];

    for(i=1;i<=6;i++){
        if(i==3){
            document.querySelectorAll('thead tr:nth-child(2) td:nth-child('+(i+1)+') input')[0].value =tab[i-1];
            document.querySelectorAll('thead tr:nth-child(2) td:nth-child('+(i+1)+') input')[1].value =tab[i];
        }
        else {
            document.querySelector('thead tr:nth-child(2) td:nth-child('+(i+1)+') input').value = tab[(i>3)?i:i-1];
        }
    }
    // document.querySelector('thead tr:nth-child(2) td:nth-child(8) select').value = tab[6];
    $.ajax({
        type: "POST",
        url: "deleteFormation.php",
        data: { id:$('#theme').find(":selected").val() }

    }).done(function( msg ) {
        console.log("modifier");
    });
}
function supprimer(){
    $.ajax({
        type: "POST",
        url: "deleteFormation.php",
        data: { id:$('#theme').find(":selected").val() }

    }).done(function( msg ) {
        console.log("supprimer");
        window.location.reload(true);
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
