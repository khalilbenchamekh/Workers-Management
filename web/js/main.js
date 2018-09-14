"use strict";
$(document).ready( function () {
    $('#table_id').DataTable({
        paging: false,
        // scrollY: 400
        info: false
        
    });
    $('#table_admin_users').DataTable({
    	paging: true,
    	// scrollY: 400
    	info: false,
        "columnDefs": [
            { "orderable": false, "targets": [8,0] }
        ],
        "order": [[ 1, "desc" ]]
    });
    $("body").niceScroll({
            cursorcolor: "rgba(66, 170, 245, 0.77)", // change cursor color in hex
            cursoropacitymin: 0, // change opacity when cursor is inactive (scrollabar "hidden" state), range from 1 to 0
            cursoropacitymax: 1, // change opacity when cursor is active (scrollabar "visible" state), range from 1 to 0
            cursorwidth: "10px", // cursor width in pixel (you can also write "5px")
            cursorborder: "1px solid #42aaf5", // css definition for cursor border
            cursorborderradius: "0px", // border radius in pixel for cursor

        }
    );
    $(".latest .Docs").niceScroll({
            cursorcolor: "#42aaf5", // change cursor color in hex
            cursoropacitymin: 0, // change opacity when cursor is inactive (scrollabar "hidden" state), range from 1 to 0
            cursoropacitymax: 1, // change opacity when cursor is active (scrollabar "visible" state), range from 1 to 0
            cursorwidth: "5px", // cursor width in pixel (you can also write "5px")
            cursorborder: "1px solid #fff", // css definition for cursor border
            cursorborderradius: "5px", // border radius in pixel for cursor

        }
    );
    $(".enfants .panel .panel-body").niceScroll({
            cursorcolor: "#42aaf5", // change cursor color in hex
            cursoropacitymin: 0, // change opacity when cursor is inactive (scrollabar "hidden" state), range from 1 to 0
            cursoropacitymax: 1, // change opacity when cursor is active (scrollabar "visible" state), range from 1 to 0
            cursorwidth: "10px", // cursor width in pixel (you can also write "5px")
            cursorborder: "1px solid #fff", // css definition for cursor border
            cursorborderradius: "5px", // border radius in pixel for cursor

        }
    );
    $('#DownlondTable_id').DataTable({
    	paging: false,
    	// scrollY: 400
    	info: false,
    	ordering: false
    });
    $('#update_logs_table').DataTable({
    	paging: false,
    	// scrollY: 400
    	info: false,
    	ordering: false
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    //Event Go backe Update Information generale
    $('a.go_Back').click(function(){
        parent.history.back();
        return false;
    });

    //SHOW PASSWORD ( LOGIN PAGE)
    $('.login #showPassword').click(function(){

        var input = $(this).next('.login #password'); 

        $(this).toggleClass("fa-eye");    
        $(this).toggleClass("fa-eye-slash");


        if( input.attr("type") == "password"){
            input.attr("type","text");
        }else{
            input.attr("type","password");
        }
    });

    setTimeout(function() {
        // $('.MsgsAlerts').fadeOut('fast');
        $('#MsgsAlerts').removeClass('fadeInUp');
        $('#MsgsAlerts').addClass('fadeOutUpBig');
    }, 2500);


    /**
     * Assmat chois Type changed
     * get this assmat agrements
     */
    $("#appbundle_gwenfantacceuil_assmat").change(function () {
        var am = $(this).val(),
            agrement_sel = $("#appbundle_gwenfantacceuil_agrement"),
            defauAgId = $('#hiddenAgrementId').val(),
            ParentDiv = agrement_sel.parent('div'),
            loader = '<span> <img src="'+assetsBaseDirImgs+'default.gif" style="width: 20px;"> </span>';
        agrement_sel.html($("<option />").html("Chargement..."));
        //display Loeder
        if(ParentDiv.find("span").html() != ""){
            ParentDiv.find("span").remove();
        }
        ParentDiv.append(loader);

        $.post(Routing.generate('am_agrements', {"id": am}), {}, function (response) {
            var fillData = "<option value=''>-- Choisir un agrement --</option>",
                responseLen = response.length;
            if (responseLen > 0) {
                for (var i = 0; i < responseLen; i++) {
                    if(response[i].id == defauAgId){
                        fillData += "<option value='" + response[i].id + "' selected='selected' >" + response[i].name + "</option>";
                    }else
                        fillData += "<option value='" + response[i].id + "' >" + response[i].name + "</option>";
                }
                agrement_sel.html(fillData).attr('disabled', false);
                //Indisplay Loeder
                ParentDiv.find("span").remove();
            } else {
                agrement_sel.html("<option value=''>Pas d'agrements'</option>").attr('disabled', true);
                //Indisplay Loeder
                ParentDiv.find("span").remove();
                return;
            }
        }, 'json');
    });
    $("#appbundle_gwenfantacceuil_assmat").trigger("change");
} );
//france date picker
$(function($){
    $.fn.datepicker.dates['fr'] ={
        days:["dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi"],
        daysShort:["dim.","lun.","mar.","mer.","jeu.","ven.","sam."],
        daysMin:["d","l","ma","me","j","v","s"],
        months:["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"],
        monthsShort:["janv.","févr.","mars","avril","mai","juin","juil.","août","sept.","oct.","nov.","déc."],
        today:"Aujourd'hui",
        monthsTitle:"Mois",
        clear:"Effacer",
        weekStart:1,
        format:"dd/mm/yyyy"
    }
});
