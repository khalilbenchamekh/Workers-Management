/**
 * Created by RABAH Ismail on 29/05/2017.
 */
"use strict";
$(document).ready(function() {
    $('#saveInfoGeniAssmat').click( function () {
        $('#appbundle_gwassmat_edit').submit();
    });
    $('#saveInfoAgrement').click( function () {
        $('#appbundle_gwagrement_edit').submit();
    });
    $('#AgrementTable_id').DataTable({
        paging: false,
        // scrollY: 400
        info: false,
        "sDom": "Rlfrtip"
    });
    $('#assmatReservationTable_id').DataTable({
        paging: false,
        //scrollY: 400
        info: false,
    });
    //Date pickers
    $('#appbundle_gwam_dateNaissance').datepicker({
        format: 'dd/mm/yyyy',
        language: 'fr'
    });
    $('.agrement_date_debut').datepicker({
        format: 'dd/mm/yyyy',
        language: 'fr'
    });
    $('.agrement_date_fin').datepicker({
        format: 'dd/mm/yyyy',
        language: 'fr'
    });
    $('.agrement_date_liber').datepicker({
        format: 'dd/mm/yyyy',
        language: 'fr'
    });
    //
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
    //Modale sclore
    function setSclorToModalBody() {
        //int Select User Modale Tabale
        $('#selectUserTable').DataTable({
            // scrollY: 400
            info: false,
            ordering: false,
            scrollY: "200px",
            scrollCollapse: true,
            paging: false,
            jQueryUI: true
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
        }else if( todo === "sinInForChilds" ){
            var tcid = button.data('tcid'),
                tmpInfo = button.data('tmpinfo'),
                hdebu = button.data('hdebu'),
                hfin = button.data('hfin');
            // modal.find("#myModalLabel").html(" Inscrit les enfants dans ... ");
            modal.find("#myModalLabel").html(" Chargement ...");
            modal.find('.modal-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color: #ee5d16;"></i></div>');
            var body = ' <div class="tab" role="tabpanel">'+
                '<ul class="nav nav-tabs" role="tablist"><li role="presentation" class="active">' +
                '<a href="#allParents" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false">Les enfants Accueillis</a></li>'+
                '<li role="presentation">' +
                '<a href="#selecedParets" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true">Les enfants deja INSCRIT</a>' +
                '</li></ul><div class="tab-content tabs"><div role="tabpanel" class="tab-pane active " id="allParents">';
            var insed = "<div class='ModaleSelectBody modallargebody' ><table class='table table-bordered' id='selectUserTable'>"+
                "<thead> <tr> <th></th> <th> #ID </th> <th> Nom / Prenom </th> </tr></thead>";
            $.get(Routing.generate('getchildsofam', { 'tcid': tcid }), {} , function (response) {
                if(response.length > 0) {
                    var  valueshidin = "";
                    for (var i = 0; i < response.length; i++) {
                        var ischecked =  "" ,isEnable = "";
                        if(response[i]['isin']){ ischecked =  "checked='checked' "; isEnable = " disabled='disabled'";valueshidin += ","+response[i]['id'];
                        }
                        insed += "<tr><td><input class='checkChildrn' type='checkbox' "+ischecked+ isEnable+ " name='childs' data-id='"+response[i]['id']  +
                            "' /> </td> <td>"+response[i]['id']  +" </td> <td> "+ response[i]['nam'] +" </td> </tr>";
                    }
                    insed +=" </table></div>";
                    body +=insed+' </div><div role="tabpanel" class="tab-pane fade" id="selecedParets"></div></div></div>'+
                            '<div class="modal-footer">' +
                            '<span class="spanmodale"> '+hdebu.substr(0,10)+' <br> '+tmpInfo+' </span>'+
                            ' <span class="spanmodale">Début : '+ ( ( hdebu.length > 6 )? hdebu.substr(10, 6) :hdebu ) +
                            '<br>Fin : '+( ( hfin.length > 6 )? hfin.substr(10, 6) :hfin ) +' </span>'+
                            ' <input type="hidden" name="appBundle_SinInForChild" class="hiddenvaleu" value="'+ valueshidin +'" >' +
                            ' <input type="hidden" class="hiddenValeuExistsIds" value="'+ valueshidin +'" >' +
                            '<a  data-id="'+ tcid +'" data-dismiss="modal" type="button" class="btn btn-default">Annuler </a>' +
                            '<a href="#" id="submitSinInForChildrs" data-id="'+ tcid +'"  type="button" class="btn btn-primary">Terminer </a>' +
                        '</div>';
                    modal.find("#myModalLabel").html("INSCRIRE POUR LES ENFANTS ACCUEILLIS");
                    modal.find('.modal-body').html(body);
                    setSclorToModalBody();
                }else{
                    modal.find("#myModalLabel").html("Inscrire pour les enfants");
                    modal.find('.modal-body').html(' Aucune résultat . <div class="modal-footer"> <a data-dismiss="modal" type="button" class="btn btn-primary">Ok </a></div>');
                }
            }, 'json').fail(function(e) { console.log(e); });
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
    //Submit Sin In For Childrns Modale
    $( "#modal_update_enfam" ).delegate( "#submitSinInForChildrs", "click", function() {
        var id = $(this).data('id'),
            vals = $('.hiddenvaleu').val(),
            valsExistsIds = $('.hiddenValeuExistsIds').val();
        $("#modal_update_enfam").find('.modal-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color: #ee5d16;"></i></div>');
        var data ={'newvalus' :vals ,'oldvalus' :valsExistsIds ,};
        $.ajax({
            type: "POST",
            data: {data:data},
            url: Routing.generate('sininforchilds' , {'tcid' : id} ),
            success: function(data){
                if (data['data'] == true){
                    $('#modal_update_enfam').modal('hide');
                }
            }
        });
    });
    //Modale childrns input :checke stat changed
    function updateHidienInput( value , newid) {
        var usersids = value.split(',');
        var index = usersids.indexOf(newid);
        if( $.inArray( newid , usersids  ) == -1 ){
            usersids.push(newid);
        }else{
            if (index > -1) {
                usersids.splice(index, 1);
            }
        }
        return usersids.join(',');
    }
    $( "#modal_update_enfam" ).delegate( ".checkChildrn", "click", function() {
        var id = $(this).data('id'),
            val = $('.hiddenvaleu').val();
        $('.hiddenvaleu').val( updateHidienInput( val , ""+id+"" ) );
    });
});