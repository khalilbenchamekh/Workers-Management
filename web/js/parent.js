/**
 * Created by Ismail Rabah on 23/05/2017.
 */
"use strict";
$(document).ready(function() {
    $('#saveInfoGeniParent').click(function () {
        $('#appbundle_gwparent_edit').submit();
    })
    $('#saveResp1Info').click(function () {
        $('#appbundle_gwResponsable1_edit').submit();
    })
    $('#saveResp2Info').click(function () {
        $('#appbundle_gwResponsable2_edit').submit();
    })
    $("#appbundle_gwresponsable1_ville option").each(function()
    {
        // Add $(this).val() to your list
        if( $('#appbundle_gwresponsable1_villeId').val() === $(this).val()){
            $(this).attr( 'selected','selected');
        }
    });
    $('#myReservationTable_id').DataTable({
        paging: false,
        // scrollY: 400
        info: false,
    });
//    Date picker
    $('.Enfant_Date_Nais').datepicker({
        format: 'dd/mm/yyyy',
        language: 'fr'
    });
    $('.Enfant_Date_dateDebut').datepicker({
        format: 'dd/mm/yyyy',
        language: 'fr'
    });
    $('.EnfantAm_Date_Deb').datepicker({
        format: 'dd/mm/yyyy',
        language: 'fr'
    });
    $('.EnfantAm_Date_fin').datepicker({
        format: 'dd/mm/yyyy',
        language: 'fr'
    });
    $('.EnfantAm_Date_Dispo').datepicker({
        format: 'dd/mm/yyyy',
        language: 'fr'
    });
    //set calaldar Events
    function setAgendaModalEvents ( Events ) {
        $('#calendarModal').fullCalendar( {
            lang:'fr',
            weekNumbers: true,
            displayEventTime: false,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            events: Events
            ,
            //Click Event
            eventClick: function(calEvent, jsEvent, view) {
                // $(this).css('background-color', 'rgb(251, 134, 35)');
            },
            //ToolTip Event
            eventRender: function(event, element) {
                element.qtip({
                    content:{
                        title: { text: event.title },
                        text: '<span class="title">Début : </span>' + ( ( event.HDeb.length > 6 )? event.HDeb.substr(10, 6) :event.HDeb ) +
                        '<br><span class="title">Fin : </span>' + ( ( event.HDeb.length > 6 )? event.HFin.substr(10, 6) :  event.HFin )+
                        '<br>' + //<span class="title">Description: . </span>'+ //+ event.description
                        '<br>'
                    },
                    show: { solo: true },
                    hide: { when: 'inactive', delay: 1000 ,fixed: true },
                    style: {
                        width: 'auto',
                        padding: 5,
                        color: 'black',
                        textAlign: 'left',
                        border: {
                            width: 1,
                            radius: 3
                        },
                        tip: 'topLeft',
                        classes: {
                            tooltip: 'ui-widget',
                            tip: 'ui-widget',
                            title: 'ui-widget-header',
                            content: 'ui-widget-content'
                        }
                    }
                });
            }
        });
    }

    //hhh=> TODO
    /**
     * Modale ajax Update Enfant Am
     */
    $('#modal_update_enfam').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) ,
            idto = button.data('enamid'),
            todo = button.data('todo'),
            modal = $(this);
        if( todo === "Suppression" || todo === "Fin Contrat" ){
            //Suppression data
            var loader = ' <div class="loader animated fadeIn"> <img src="'+assetsBaseDirImgs+'default.gif" alt="loader"> </div>' ,
                btns = '<p> Êtes-vous sûr de vouloir effectuer cette opération ?</p>  '+
                    '<div class="modal-footer"> <a type="button" class="btn btn-default" data-dismiss="modal">Non</a>'+
                    '<a href=" '+Routing.generate('fin_cont_enf_am', { id: idto })+'" id="submitModalAction" type="button" class="btn btn-primary">Oui</a></div>';
            modal.find("#myModalLabel").html(todo);
            modal.find('.modal-body').html(btns);
        }else if ( todo === "getamagenda" ){
            var amnom = button.data('amnom');
            modal.find(".modal-header").append('<a class="btn btn-default btn-xs iconagendainmodale"  href="'+ Routing.generate("agenda_all" ,{}) +'">' +
                    '<i class=" fa fa-calendar" data-toggle="tooltip" data-placement="bottom"  title="Afficher tout l\'agenda"></i>' +
                    ' </a>');
            modal.find("#myModalLabel").html("Agenda de " +amnom);
            modal.find('.modal-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color: #ee5d16;"></i></div>');
            $.ajax({
                type: "POST",
                url: Routing.generate('gettempcolforam', { "amid": idto } ),
                success: function(data){
                    modal.find('.modal-body').html('<div class="calendarModal" id="calendarModal"></div>');
                    setAgendaModalEvents(data.data);
                }
            });
        }
    });
    $("#modal_update_enfam").on("hidden.bs.modal", function () {
        // put your default event here
        $(this).find("#myModalLabel").html("non title");
        $(this).find('.modal-body').html('<div class="loader animated fadeIn"> <img src="'+assetsBaseDirImgs+'default.gif" alt="loader" style="width: 45px;"> </div>');
    });
    $( "#modal_update_enfam" ).delegate( "#submitModalAction", "click", function() {
        $("#modal_update_enfam").find('.modal-body').html('<div class="loader animated fadeIn"> <img src="'+assetsBaseDirImgs+'default.gif" alt="loader" style="width: 45px;"> </div>');
    });
});
