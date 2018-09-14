"use strict";
$(document).ready(function() { 


	// Install parents 
	$("#installusers").click(function(event){
		// event.preventDefault();

		// var headr = $('.panleContainerHead'),
		// height = 0 ,
		// ajaxloding = $('.progrecebar'),
		// href =  $(this).attr('href');

		changeprogrece();

		// $.ajax({
  //           type: "POST",
  //           url: href ,
  //           async : true,
  //           cache: false,
  //           dataType:'html',
  //           success: function(data){},
  //           error: function(){  },
  //           complete: function(){
  //               changeprogrece();
  //           }
  //       });
	 	// $.post('{{path("install_parents")}}',
	  //           function(response){
	  //                   changeprogrece();

	  //   }, "json"); 
	});

	function changeprogrece(){
		var headr = $('.panleContainerHead'),
		height = 0 ,
		ajaxloding = $('.progrecebar');

		if(headr.height() == 98){
			height = 37;
			ajaxloding.hide();
		}
		else{
			height = 100;
			ajaxloding.show();
		}
		$('.panleContainerHead').animate({height:height},200);
	}

	$('#SaveInfosBtn').click(function(){

		$('#InfosForm form').submit();

	});
	$('#saveupdatelogsinfo').click(function(){
		$('#appbundle_updatelogs_edit').submit();
	});
	$('#deleteupdatelog').click(function () {
       return confirm("Vous voulez virement supprimer la modification ");
    });
	$('.deleteupdatelogclass').click(function () {
       return confirm("Vous voulez virement supprimer la modification ");
    });

	$('#showPanel').click(function(){
		$(this).next(".panel-body").slideToggle( "slow");
		$(this).children(".fa").toggleClass("fa-angle-double-down");
		$(this).children(".fa").toggleClass("fa-angle-double-up");
	});


	//quick delet doc
	$(".deletdoc").click( function (){
		var tr = $(this).parent('td').parent('tr');
		tr.addClass("animated fadeOut");
        setTimeout(function() {
           	tr.remove();
        }, 800);
	});

	//parametrage toggle use the predefind parametres
	$('#predefindpara').click( function () {
        chechIsUsedPredefindPara();
    });
	function chechIsUsedPredefindPara() {
	    var usertype =  $('#usertype').val() ,
            id = $('.appbundle_para_listpara').val();
        if($('#predefindpara').is(':checked')){
            $('.appbundle_para_listpara').focus();
            UsePredefindPara();
            if( usertype == "parent" ){
                getParentParams( id , "#loaderajaxpr" );
            }else if( usertype == "assmat"){
                getAssmatParams( id , "#loaderajaxam" );
            }
        }else{
            NotUsePredefindPara();
        }
    }
    function UsePredefindPara() {
        $('.slideThree label').each( function () {
            $(this).removeAttr( "for" );
            $(this).removeClass("toggle-check");
            $(this).css("cursor" , "default");
            $(this).parent().prev().removeAttr( "for" );
        });
    }
    function NotUsePredefindPara() {
        $('.slideThree label').each( function () {
        	var inputid = $(this).prev("input").attr("id");
            $(this).attr( "for" , inputid );
            $(this).parent().prev().attr('for',inputid);
            $(this).addClass("toggle-check");
            $(this).css("cursor" , "pointer");
        });
    }
    //Delaget Checker if the user has a pridefind paralist
    chechIsUsedPredefindPara();
    //get Params for parent
    function getParentParams(listid , loaderDyz ){
        var id = listid ,
            loader = $(loaderDyz);
        loader.show();
        if( id != 0 ){
            $.get(Routing.generate('getlistpara', { "usertype": "parent" , "id": id }), {}, function (response) {
                if (response != null) {
                    // pr_infogenerales
                    $('#appbundle_para_infogeneselect').prop('checked',response["pr_infogenerales"].dispaly );
                    $('#appbundle_para_infogeneupdate').prop('checked',response["pr_infogenerales"].allowUpdate);
                    //pr_respo1
                    $('#appbundle_para_respo1select').prop('checked',response["pr_respo1"].dispaly);
                    $('#appbundle_para_respo1update').prop('checked',response["pr_respo1"].allowUpdate);
                    //pr_respo2
                    $('#appbundle_para_respo2select').prop('checked',response["pr_respo2"].dispaly);
                    $('#appbundle_para_respo2update').prop('checked',response["pr_respo2"].allowUpdate);
                    //pr_enfants
                    $('#appbundle_para_enfantsselect').prop('checked',response["pr_enfants"].dispaly);
                    $('#appbundle_para_enfantsupdate').prop('checked',response["pr_enfants"].allowUpdate);
                    //pr_enfant_am
                    $('#appbundle_para_enfamselect').prop('checked',response["pr_enfant_am"].dispaly);
                    $('#appbundle_para_enfamupdate').prop('checked',response["pr_enfant_am"].allowUpdate);
                    $('#appbundle_para_enfamdelete').prop('checked',response["pr_enfant_am"].allowDelete);
                    //pr_agenda
                    $('#appbundle_para_agendaselect').prop('checked',response["pr_agenda"].dispaly);
                    $('#appbundle_para_agendasinin').prop('checked',response["pr_agenda"].allowInsert);
                    //"pr_agenda_enfants"
                    $('#appbundle_para_agendasininforchild').prop('checked',response["pr_agenda_enfants"].allowInsert);
                    //"pr_agenda_insc"
                    $('#appbundle_para_reselistselect').prop('checked',response["pr_agenda_insc"].dispaly);
                    $('#appbundle_para_reselistdelete').prop('checked',response["pr_agenda_insc"].allowDelete);
                    //pr_downlond_doc
                    $('#appbundle_para_allowdownlond').prop('checked',response["pr_downlond_doc"].dispaly);
                    loader.fadeOut();
                } else {
                    console.log("Ctrl Errore ! liste vide ");
                    loader.fadeOut();
                }
            }, 'json')
                .fail(function() {
                    console.log(" Api errore get all parms for parents");
                    loader.fadeOut();
                });
        }else{
            console.log("Check box  selecte one para list ");
            loader.fadeOut();
        }
    }
    //page user = parent list para .changer
    $('#appbundle_listpara_parent').change(function () {
        var id = $(this).val();
        if( $('#predefindpara').is(':checked') ){
            getParentParams( id , "#loaderajaxpr" );
        }else{
            console.log("list para not selected ");
        }
    });
    //get Params for parent
    function getAssmatParams(listid , loaderDyz ){
        var id = listid,
            loader = $(loaderDyz);
        loader.show();
        if( id != 0 ){
            $.get(Routing.generate('getlistpara', { "usertype": "assmat" , "id": id }), {}, function (response) {
                if (response != null) {
                    // am_infogenerales
                    $('#appbundle_para_infoamselect').prop('checked',response["am_infogenerales"].dispaly );
                    $('#appbundle_para_infoamupdate').prop('checked',response["am_infogenerales"].allowUpdate);
                    //am_agrements
                    $('#appbundle_para_agreselect').prop('checked',response["am_agrements"].dispaly);
                    $('#appbundle_para_agreupdate').prop('checked',response["am_agrements"].allowUpdate);
                    $('#appbundle_para_agredelete').prop('checked',response["am_agrements"].allowDelete);
                    //am_mesenfant_am
                    $('#appbundle_para_mesenfamselect').prop('checked',response["am_mesenfant_am"].dispaly);
                    $('#appbundle_para_mesenfamupdate').prop('checked',response["am_mesenfant_am"].allowUpdate);
                    $('#appbundle_para_mesenfamdelete').prop('checked',response["am_mesenfant_am"].allowDelete);
                    //am_enfant_am
                    $('#appbundle_para_amenfselect').prop('checked',response["am_enfant_am"].dispaly);
                    $('#appbundle_para_amenfupdate').prop('checked',response["am_enfant_am"].allowUpdate);
                    $('#appbundle_para_amenfdelete').prop('checked',response["am_enfant_am"].allowDelete);
                    //am_agenda
                    $('#appbundle_para_amagendaselect').prop('checked',response["am_agenda"].dispaly);
                    $('#appbundle_para_amagendasinin').prop('checked',response["am_agenda"].allowInsert);
                    //am_agenda_enfants
                    $('#appbundle_para_amagendasininforchild').prop('checked',response["am_agenda_enfants"].allowInsert);
                    //am_agenda_insc
                    $('#appbundle_para_amreselistselect').prop('checked',response["am_agenda_insc"].dispaly);
                    $('#appbundle_para_amreselistdelete').prop('checked',response["am_agenda_insc"].allowDelete);
                    //am_downlond_doc
                    $('#appbundle_para_amallowdownlond').prop('checked',response["am_downlond_doc"].dispaly);
                    loader.fadeOut();
                } else {
                    console.log("Ctrl Errore ! liste vide ");
                    loader.fadeOut();
                }
            }, 'json')
                .fail(function() {
                    console.log(" Api errore get all parms for assmats");
                    loader.fadeOut();
                });
        }else{
            console.log(" selecte one para list ");
            loader.fadeOut();
        }
    }
    //page user = parent list para .changer
    $('#appbundle_listpara_assmat').change(function () {
        var id = $(this).val();
        if( $('#predefindpara').is(':checked') ){
            getAssmatParams( id , "#loaderajaxam" );
        }else{
            console.log("Check box list para not selected ");
        }
    });
    //Section De parametrage
	//Add new Para list ( parameter peridefind list )
	//      _Parent Add nwe progrece
	$('#addnewlistpara_parent').click( function () {
		var savebtn = $('#saveParentParams'),
			canselebtn = $('#cansleaddpara_parent');

            $('#newlistpara_parent').fadeIn(300);
            savebtn.fadeOut(300 ,function () {
                savebtn.html('<i class="fa fa-plus-circle"></i> Ajouter ');
                savebtn.toggleClass("btn-primary btn-danger");
                savebtn.fadeIn(500 , function () {
                    canselebtn.fadeIn(300);
                });
                savebtn.css('bottom','0');
            });
        $(this).fadeOut();
        $('#appbundle_para_new_list_para_parent').val("").attr("required" ,"required").focus();
        $('.setToParents').hide();
        $('#parentaction').val(1);
    });
	//		_Parent cansel Add naw para
	$('#cansleaddpara_parent').click(function () {
		var btnadd = $('#saveParentParams');

        $('#newlistpara_parent').fadeOut(500, function () {
            btnadd.html('<i class=" fa fa-floppy-o"></i> Sauvegarder');
            btnadd.toggleClass("btn-primary btn-danger");
            btnadd.css('bottom','0');
            $("#addnewlistpara_parent").fadeIn(300);
        });
        $(this).fadeOut(500);
        $('#appbundle_para_new_list_para_parent').val("").removeAttr("required" );
        $('.setToParents').show();
        $('#parentaction').val(0);
    });
    //      _Assmat Add nwe progrece
    $('#addnewlistpara_assmat').click( function () {
        var savebtn = $('#saveAssmatsParams'),
            canselebtn = $('#cansleaddpara_assmat');

        $('#newlistpara_assmat').fadeIn(300);
        savebtn.fadeOut(300 ,function () {
            savebtn.html('<i class="fa fa-plus-circle"></i> Ajouter ');
            savebtn.toggleClass("btn-primary btn-danger");
            savebtn.fadeIn(500 , function () {
                canselebtn.fadeIn(300);
            });
        });
        $('.loaderajax').css('top','200px');
        $(this).fadeOut();
        $('#appbundle_para_new_list_para_assmat').val("").attr("required" ,"required").focus();
        $('.setToAssmats').hide();
        $('#assmataction').val(1);
    });
    //		_Assmat cansel Add naw para
    $('#cansleaddpara_assmat').click(function () {
        var btnadd = $('#saveAssmatsParams');
        $('#newlistpara_assmat').fadeOut(500, function () {
            btnadd.html('<i class=" fa fa-floppy-o"></i> Sauvegarder');
            btnadd.toggleClass("btn-primary btn-danger");
            $("#addnewlistpara_assmat").fadeIn(300);
        });
        $('.loaderajax').css('top','97px');
        $(this).fadeOut(500);
        $('.setToAssmats').show();
        $('#appbundle_para_new_list_para_assmat').val("").removeAttr("required" );
        $('#assmataction').val(0);
    });
    //On liste para selest has changed  _ Parent
    $("#appbundle_para_list_para_parent").change(function () {
        var id = $(this).val(),
            loader = $('#loaderajaxpr'),
            btndelete = $('#deletelistpara_parent');
        loader.css('top', $('#newlistpara_parent').is(":visible") ? '200px' : '97px');
        getParentParams( id , "#loaderajaxpr" );
        if(id != 0 )
            btndelete.css('display','inline-block');
        else
            btndelete.css('display','none');
    });
    $('#appbundle_para_list_para_parent').trigger('change');
    //On liste para selest has changed  _ Assmat
    $("#appbundle_para_list_para_assmat").change(function () {
        var id = $(this).val(),
            loader = $('#loaderajaxam'),
            btndelete = $('#deletelistpara_assmat');
        loader.css('top', $('#newlistpara_assmat').is(":visible") ? '200px' : '97px');
        getAssmatParams( id , "#loaderajaxam" );
        if(id != 0 )
            btndelete.css('display','inline-block');
        else
            btndelete.css('display','none');
    });
    $('#appbundle_para_list_para_assmat').trigger('change');
    //get dropdown paraliste as jsone using ajax
    function getDropDowlParalist(usertype){
        $.get(Routing.generate('getdropdownlist', { usertype: usertype }), {}, function (response) {
            if(response != "" ){
                if( usertype == "parent"){
                    $('#appbundle_para_list_para_parent').html(response.data);
                    $('#appbundle_para_list_para_parent').trigger('change');
                }else if( usertype == "assmat"){
                    $('#appbundle_para_list_para_assmat').html(response.data);
                    $('#appbundle_para_list_para_assmat').trigger('change');
                }
            }else{
                $('#modal_update_enfam').find('.modal-body').html("Errore ! ;" + response.data);
            }
        }, 'json')
            .fail(function() {
                console.log(" Api errore ( dropdown paralist)");
            });
    }
    //delete para liset
    $('#modal_update_enfam').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget),
            usertype = button.data('usertype'),
            todo = button.data('todo'),
            modal = $(this);
        var submitbtnid = usertype == "parent" ? "submitModalActionParent" : usertype == "assmat" ? "submitModalActionAssmat" : "" ;
        var loader = ' <div class="loader animated fadeIn"> <img src="'+assetsBaseDirImgs+'default.gif" alt="loader"> </div>' ,
            btns = '<p> Êtes-vous sûr de vouloir effectuer cette opération ?</p>  '+
                '<div class="modal-footer"> <a type="button" class="btn btn-default" data-dismiss="modal">Non</a>'+
                '<a id="'+ submitbtnid +'" type="button" class="btn btn-primary">Oui</a></div>';
        modal.find("#myModalLabel").html(todo);
        modal.find('.modal-body').html(btns);
    });
    //delete para liset Parent/
    $('#modal_update_enfam').on('click', '#submitModalActionParent', function () {
        var id = $('#appbundle_para_list_para_parent').val();
        $('#modal_update_enfam').find('.modal-body').html(' <div class="loader animated fadeIn"> <img src="'+assetsBaseDirImgs+'default.gif" alt="loader" style="width: 50px;"> </div>');
        $.get(Routing.generate('deleteparalistparent', { id: id }), {}, function (response) {
            if(response == true){
                    $("#modal_update_enfam").modal('hide');
                    getDropDowlParalist("parent")
                }else{
                    $('#modal_update_enfam').find('.modal-body').html("Errore !:" + response.data);
                }
        }, 'json')
            .fail(function() {
                console.log(" Api ( submit modale parent ) errore ");
            });
    });
    //delete para liset Assmat deleteparalistassmat
    $('#modal_update_enfam').on('click', '#submitModalActionAssmat', function () {
        var id = $('#appbundle_para_list_para_assmat').val();
        $('#modal_update_enfam').find('.modal-body').html(' <div class="loader animated fadeIn"> <img src="'+assetsBaseDirImgs+'default.gif" alt="loader" style="width: 50px;"> </div>');
        $.get(Routing.generate('deleteparalistassmat', { id: id }), {}, function (response) {
                if(response == true){
                    $("#modal_update_enfam").modal('hide');
                    getDropDowlParalist("assmat")
                }else{
                    $('#modal_update_enfam').find('.modal-body').html("Errore !:" + response.data);
                }
        }, 'json')
            .fail(function() {
                console.log(" Api ( submit modale assmat ) errore ");
            });
    });

    //gestion des documents
    $("#check_All").click(function () {
            enableSelectDocAcces();
    });
    //parents
    $('#check_parent').click(function () {
        switcheSatat('check_sparent');
        $('#showSelectModaleParent').hide();
    });
    //am
    $('#check_assmat').click(function () {
        switcheSatat('check_sam');
        $('#showSelectModaleAm').hide();
    });
    //part
    $('#check_part').click(function () {
        switcheSatat('check_spart');
        $('#showSelectModalePart').hide();
    });
    //get users ids to selecte ids
    //sparants #####
    $('#check_sparent').click(function () {
        switcheSatat('check_parent');
        if($(this).is(':checked')){
            $('#showSelectModaleParent').show();
        }else{
            $('#showSelectModaleParent').hide();
        }
    });
    //sam    #####
    $('#check_sam').click(function () {
        switcheSatat('check_assmat');
        if($(this).is(':checked')){
            $('#showSelectModaleAm').show();
        }else{
            $('#showSelectModaleAm').hide();
        }
    });
    //spart   #####
    $('#check_spart').click(function () {
        switcheSatat('check_part');
        if($(this).is(':checked')){
            $('#showSelectModalePart').show();
        }else{
            $('#showSelectModalePart').hide();
        }
    });
    //temp coll
    $('#check_scollectif').click(function () {
        // switcheSatat('check_part');
        if($(this).is(':checked')){
            $('#showSelectModaletempscol').show();
        }else{
            $('#showSelectModaletempscol').hide();
        }
    });
    function enableSelectDocAcces(){
        var allparams = $('.checkesGroupe'),
            allModalTrigers = $('.listeicone');
        if($('#check_All').is(':checked')){
            $('.checkesGroupe .slideThree input').each( function () {
                $(this).prop("checked", false);
                $(this).attr("disabled", true);
                allparams.css('opacity','0.3');
                allModalTrigers.css('display','none');
            });
        }else{
            $('.checkesGroupe .slideThree input').each( function () {
                $(this).attr("disabled", false);
                allparams.css('opacity','1');
                // allModalTrigers.css('display','block');
            });
        }
    }
    enableSelectDocAcces();
    function switcheSatat( E_this ) {
        $('#'+E_this).prop("checked", false);
    }
    //table showe doc users access
    $(".Mytable ").niceScroll({
            cursorcolor: "#42aaf5",
            cursoropacitymin: 1,
            cursoropacitymax: 1,
            cursorwidth: "5px",
            cursorborder: "1px solid #fff",
            cursorborderradius: "5px"
    });
    $(".Mytable2 ").niceScroll({
            cursorcolor: "#42aaf5",
            cursoropacitymin: 1,
            cursoropacitymax: 1,
            cursorwidth: "5px",
            cursorborder: "1px solid #fff",
            cursorborderradius: "5px"
    });
    $(".Mytable3 ").niceScroll({
            cursorcolor: "#42aaf5",
            cursoropacitymin: 1,
            cursoropacitymax: 1,
            cursorwidth: "5px",
            cursorborder: "1px solid #fff",
            cursorborderradius: "5px"
        });
    function setSclorToModalBody() {

        //int Select User Modale Tabale
        $('#selectUserTable').DataTable({
            // scrollY: 400
            info: false,
            ordering: false,
            scrollY:        "200px",
            scrollCollapse: true,
            paging:         false,
            jQueryUI:       true
        });
        /** Select Modale table of checkboxs **/
        // $(".dataTables_scrollBody ").niceScroll({
        //         cursorcolor: "#42aaf5",
        //         cursoropacitymin: 1,
        //         cursoropacitymax: 1,
        //         cursorwidth: "10px",
        //         cursorborder: "1px solid #fff",
        //         cursorborderradius: "0px"
        //     }
        // );
    }
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
                var tmpsIds = $('#scollectifids').val().split(','),
                    newid = ""+calEvent.id+"" ,
                    evlinks = $(this);
                var index = tmpsIds.indexOf(newid);
                if( $.inArray( newid , tmpsIds  ) == -1 ){
                    tmpsIds.push(newid);
                    evlinks.css('background-color', '#ee5d16');
                }else{
                    if (index > -1) {
                        tmpsIds.splice(index, 1);
                        evlinks.css('background-color', '#5fb3f0');
                    }
                }
                $('#scollectifids').val(tmpsIds.join(','));
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
    //get useres
    $('#modal_doc_acces').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget),
            usertype = button.data('usertype'),
            todo = button.data('todo'),
            usersids = '' ,
            title = "",
            checkBoxClass = "",
            modal = $(this),
            loader = '<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x fa-fw" style="color: #ee5d16;"></i></div>';
        modal.find("#myModalLabel").html("Chargement ...");
        modal.find('.modal-body').html(loader);
        //get table to select users
        if( todo === "getusersoftype"){
            if(usertype === "parent"){
                title = " parents";
                usersids = $('#sparentids').val().split(',');
                checkBoxClass = "parentsCheckBox";
            }else if (usertype === "assmat"){
                title = " assmats";
                usersids = $('#samids').val().split(',');
                checkBoxClass = "amCheckBox";
            }else if (usertype === "part"){
                title = " partenaires";
                usersids = $('#spartids').val().split(',');
                checkBoxClass = "partCheckBox";
            }

            var body = '' +
                ' <div class="tab" role="tabpanel">'+
                    '<ul class="nav nav-tabs" role="tablist">'+
                        '<li role="presentation" class="active">' +
                            '<a href="#allParents" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false">Tous Les '+ title +'</a>' +
                        '</li>'+
                        '<li role="presentation">' +
                            '<a href="#selecedParets" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true">Les '+title+' sélectionnés</a>' +
                        '</li>'+
                    '</ul>'+
                    '<div class="tab-content tabs">'+
                        '<div role="tabpanel" class="tab-pane active " id="allParents">' +
                            '';

            var insed = "<div class='ModaleSelectBody modallargebody' ><table class='table table-bordered' id='selectUserTable' style='font-size: 11px;'> <thead> <tr> <th></th> <th>" +
                " #ID </th>  " ;
            insed +=  usertype == "parent"?"<th>Pseudo</th><th>Respo 1</th> <th>Respo 2</th> " : "<th>Pseudo</th><th>Nom</th><th>Prenom</th> " ;
            insed +="</tr></thead>";

            $.get(Routing.generate('getusersoftype', { 'usertype': usertype }), {} , function (response) {
                // console.log(response);
                if(response.length > 0) {
                    // insed += "<tbody >";
                    var ischecked = "";
                    for (var i = 0; i < response.length; i++) {
                        ischecked = ( $.inArray( ""+response[i]['id']+"" , usersids  ) == -1 ) ? "" :"checked='checked'";
                        insed += "<tr><td><input type='checkbox' class='"+checkBoxClass+"' name='test' id='"+response[i]['id']  +"' "+ ischecked  +" /></td><td>"+response[i]['gwid']  +"</td><td>"+ response[i]['username'] +"</td>" ;
                        insed += usertype == "parent" ? "<td>"+ response[i]['name'] +"</td><td>"+ response[i]['pre'] +"</td></tr>" : " ";
                        insed += usertype == "assmat" ? "<td>"+ response[i]['name'] +"</td><td>"+ response[i]['pre'] +"</td></tr>" : " ";
                        insed += usertype == "part" ? "<td>"+ response[i]['name'] +"</td><td>"+ response[i]['pre'] +"</td></tr>" : " ";
                    }

                    insed +=" </table></div>";
                    body +=insed+' </div>'+
                                '<div role="tabpanel" class="tab-pane fade" id="selecedParets">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="modal-footer"> <a data-dismiss="modal" type="button" class="btn btn-primary">Terminer </a></div>';
                    modal.find("#myModalLabel").html("Sélectionner des "+title);
                    // modal.find('.modal-body').addClass('animated fadeIn');
                    modal.find('.modal-body').html(body);
                    setSclorToModalBody();
                }else{
                    modal.find("#myModalLabel").html("Sélectionner des "+title);
                    // modal.find('.modal-body').addClass('animated fadeIn');
                    modal.find('.modal-body').html(' Aucune résultat . <div class="modal-footer"> <a data-dismiss="modal" type="button" class="btn btn-primary">Ok </a></div>');
                }
            }, 'json')
                .fail(function() {
                    console.log(" Api ( submit modale users ) errore !!");
                });
        }
        //get agenda to select temps collectifs
        else if (todo === "gettempcol"){
            var tempsColIds = $('#scollectifids').val().split(',') ;
            modal.find("#myModalLabel").html("Sélectionner les temps collectifs ");
            $.ajax({
                type: "POST",
                data: {tempsColIds:tempsColIds},
                url: Routing.generate('gettempcol' ),
                success: function(data){
                    modal.find('.modal-body').html('<div class="calendarModal" id="calendarModal"></div> <div class="modal-footer"> <a data-dismiss="modal" type="button" class="btn btn-primary">Terminer </a></div>');
                    setAgendaModalEvents(data.data);
                }
            });
        }
    });
    // save parents id in hiden input
    /**
     * add or delete a new id in hidien input value
     * @param value
     * @param newid
     * @returns {string}
     */
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
    $('#modal_doc_acces').on('click', '.parentsCheckBox', function () {
        var thisid = $(this).attr('id'),
            valueold = $("#sparentids").val();
        $("#sparentids").val( updateHidienInput( valueold , thisid ) );
    });
    // save assmats id in hiden input
    $('#modal_doc_acces').on('click', '.amCheckBox', function () {
        var thisid = $(this).attr('id'),
            valueold = $("#samids").val();
        $("#samids").val( updateHidienInput( valueold , thisid ) );
    });
    // save parts id in hiden input
    $('#modal_doc_acces').on('click', '.partCheckBox', function () {
        var thisid = $(this).attr('id'),
            valueold = $("#spartids").val();
        $("#spartids").val( updateHidienInput( valueold , thisid ) );
    });

    //SEND USERS ACCES VIA EMAIL : GROUPE
    $('.checkUserId').click(function(){
        var inputSelecedIds = $('#selecetd_users_ids'),
            ids = inputSelecedIds.val() != "" ? inputSelecedIds.val().split(',') : [],
            thisId = $(this).attr('id');
        if( $(this).is(':checked')){
            ids.push(thisId);
            if (inputSelecedIds.val() == "")
                $('#sendEmailGroupe').removeClass('disabled');
        }
        else{
            ids.splice($.inArray(thisId , ids ) , 1 );
            if (ids[0] == null )
                $('#sendEmailGroupe').addClass('disabled');
        }
        inputSelecedIds.val(ids.join(','));
    });
    $('#selecteAllUsersIds').click(function(){
        var inputSelecedIds = $('#selecetd_users_ids'),
            ids = inputSelecedIds.val() != "" ? inputSelecedIds.val().split(',') : [];
        if($(this).is(':checked')){
            $('.checkUserId').each(function () {
               $(this).prop('checked',true);
                ids.push($(this).attr('id'));
            });
            $('#sendEmailGroupe').removeClass('disabled');
        }else{
            $('.checkUserId').each(function(){
                $(this).prop('checked',false);
                ids.splice($.inArray($(this).attr('id') , ids ) , 1 );
            });
            $('#sendEmailGroupe').addClass('disabled');
        }
        inputSelecedIds.val(ids.join(','));
    });
});


