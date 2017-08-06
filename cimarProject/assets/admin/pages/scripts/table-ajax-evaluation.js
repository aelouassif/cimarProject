// le traitement de changement de select pour sincroniser les autres select
console.log("TableAjax");
$('#theme').on('change', function() {
    document.cookie = "idPersonne="+$('#listPersonne').val();
    document.cookie = "idForamtion="+$('#theme').val();
    console.log(getCookie('idPersonne'));
   var selected = $(this).val();

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

});
$('#listPersonne').on('change', function() {
    document.cookie = "idPersonne="+$('#listPersonne').val();
    document.cookie = "idForamtion="+$('#theme').val();

});

function ok(){
    document.cookie = "idPersonne="+$('#listPersonne').val();
    document.cookie = "idForamtion="+$('#theme').val();
    window.location.reload(true);

}
function evaluationFormationPDF(){
    document.cookie = "idPersonne="+$('#listPersonne').val();
    document.cookie = "idForamtion="+$('#theme').val();
}
//

function saveNoteIndividuel(){
    console.log("test");
//
    var tab=[$('#theme').find(":selected").val(),$('#listPersonne').find(":selected").val()];
    console.log(tab);

    $.ajax({
        type: "POST",
        url: "saveEvaluationIndividuelle.php",
        data: { idForamtion:getCookie('idForamtion'),idPersonne:getCookie('idPersonne'),
            q1:$("#questionIndividuelle1").val(),
            q2:$("#questionIndividuelle2").val(),
            q3:$("#questionIndividuelle3").val(),
            q4:$("#questionIndividuelle4").val(),
            q5:$("#questionIndividuelle5").val(),
            q6:$("#questionIndividuelle6").val(),
            q7:$("#questionIndividuelle7").val(),
            q8:$("#questionIndividuelle8").val(),
            q9:$("#questionIndividuelle9").val(),
            q10:$("#questionIndividuelle10").val(),
            q11:$("#questionIndividuelle11").val(),
            q12:$("#questionIndividuelle12").val(),
            q13:$("#questionIndividuelle13").val(),
            }

    }).done(function( msg ) {
        console.log("modifier");
        document.getElementById("addTableau").hidden = false;
        // $("#addTableau")
    });

}
function saveNoteResponsable(){
    var tab=[$('#theme').find(":selected").val(),$('#listPersonne').find(":selected").val()];
    console.log(tab);

    $.ajax({
        type: "POST",
        url: "saveEvaluationResponsable.php",
        data: { idForamtion:getCookie('idForamtion'),idPersonne:getCookie('idPersonne'),
            q1:$("#questionResponsable1").val(),
            q2:$("#questionResponsable2").val(),
            q3:$("#questionResponsable3").val(),
            q4:$("#questionResponsable4").val(),
            q5:$("#questionResponsable5").val(),
            q6:$("#questionResponsable6").val(),
            q7:$("#questionResponsable7").val(),
            }

    }).done(function( msg ) {
        console.log("modifier");
        document.getElementById("addTableau").hidden = false;
    });

}
function getCookie(name){
    var value = "; " + document.cookie;
    var parts = value.split("; "+name+"=");
    if(parts.length==2)
        return parts.pop().split(";").shift();
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
