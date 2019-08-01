<script>
    var $teamTable = $('#teamTable');


    $().ready(function() {


	$(document).on("click", ".deleteUser", function(){
        idUser = $(this).parents("tr").attr('data-id');

        user = $(this).parents("tr");

        

        swal({
        title: "Etes vous sûr ?",
        text: "Vous allez le supprimer definitivement !",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn btn-info btn-fill",
        confirmButtonText: "Oui",
        cancelButtonClass: "btn btn-danger btn-fill",
        cancelButtonText: "Non",
        closeOnConfirm: false,
        }, function() {
            swal("Tout est bon!", "", "success");
            user.remove();

            $.post('?ajax=deleteuser', 
                {
                    id: idUser,
                }, 
                function (data)
                {
                    window.location.replace('/');
                },
            );

        });

    });

    $(document).on("click", "#buttonAddTeam", function(){
        nameTeam = $('#inputNameTeam').val();
            console.log(nameTeam);

            $.post('?ajax=addteam', 
                {
                    name: nameTeam,
                }, 
                function (data)
                {
                    window.location.replace('/');
                },
            );

        });


    $(document).on("click", ".deletePronos", function(){

        idPronos = $(this).parents("tr").html();

        user = $(this).parents("tr");

        

        console.log(idPronos);

        swal({
        title: "Etes vous sûr ?",
        text: "Vous allez le supprimer definitivement !",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn btn-info btn-fill",
        confirmButtonText: "Oui",
        cancelButtonClass: "btn btn-danger btn-fill",
        cancelButtonText: "Non",
        closeOnConfirm: false,
        }, function() {

            swal("Désolé", "cette opération ne marche pas, il n'y pas toutes les autorisations nécessaires", "error");

        });

        });

	$(document).on("click", ".add", function(){

    id = $(this).parents("tr").attr('data-id');

    swal({
        title: "Choisir une durée?",
        text: "",
        html: "<h5 class='text-warning'>Cette foncionnalité ne marche pas pour l'instant</h5><select><option>1semaine</option><option>1mois</option><option>3mois</option><option>6mois</option><option>1ans</option></select>",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn btn-info btn-fill",
        confirmButtonText: "Valider",
        cancelButtonClass: "btn btn-danger btn-fill",
        cancelButtonText: "Annuler",
        closeOnConfirm: false,
        }, function() {
            swal("Erreur!", "J'ai pas eu le temps de m'en occuper, ça sert à rien d'essayer x)", "error");
            user.remove();
        });


    
    });



        $teamTable.bootstrapTable({
            toolbar: ".toolbar",
            clickToSelect: false,
            showRefresh: false,
            showToggle: false,
            search: false,
            showColumns: false,
            pagination: true,
            searchAlign: 'left',
            pageSize: 5,
            clickToSelect: false,
            locale: "fr-FR",
            pageList: [5],

            formatShowingRows: function(pageFrom, pageTo, totalRows) {
                //do nothing here, we don't want to show the text "showing x of y from..."
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + " Equipe visible";
            },
            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });

        // //activate the tooltips after the data table is initialized
        // $('[rel="tooltip"]').tooltip();

        $(window).resize(function() {
            $userTable.tipsbootstrapTable('resetView');
        });



        $("#addTeam").click(function (e) {
            e.preventDefault();
            $.post(
                '/cible_admin.php', 
                {
                    type: "1",
                    name: $("#nameTeam").val(),
                    city: $("#cityTeam").val(),
                },

                function (data) {
                    var city = $("#cityTeam").val();
                    var name = $("#nameTeam").val();

                    if (data == 'Success') {
                        $('#teamTab').bootstrapTable('insertRow', {index: 0, row: {nom: name}})
                        $('#team1').append( '<option value="'+name+'">'+name+'</option>' );
                        $('#team2').append( '<option value="'+name+'">'+name+'</option>' );
                        $('#cityTeam').val("");
                        $('#nameTeam').val("");
                    } else {
                    }

                },

            );
        });
    });

</script>