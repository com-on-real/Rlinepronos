<script>
var $pronosTable = $('#pronosTable');

// function operateFormatter(value, row, index) {
//     return [
//         '<a rel="tooltip" title="Supprimer" class="btn btn-link btn-danger table-action remove" href="javascript:void(0)">',
//         '<i class="fa fa-remove"></i>',
//         '</a>'
//     ].join('');
// }

// $().ready(function() {
//     // $pronosTable.operateEvents = {
//     //     // 'click .view': function(e, value, row, index) {
//     //     //     info = JSON.stringify(row);

//     //     //     swal('You click view icon, row: ', info);
//     //     //     console.log(info);
//     //     // },
//     //     // 'click .edit': function(e, value, row, index) {
//     //     //     info = JSON.stringify(row);

//     //     //     swal('You click edit icon, row: ', info);
//     //     //     console.log(info);
//     //     // },
//     //     // 'click .remove': function(e, value, row, index) {
//     //     //     console.log(row);
//     //     //     $pronosTable.bootstrapTable('remove', {
//     //     //         field: 'id',
//     //     //         values: [row.id]
//     //     //     });
//     //     }

$().ready(function() {
    $pronosTable.bootstrapTable({
        clickToSelect: false,
        showRefresh: false,
        search: false,
        showToggle: false,
        showColumns: true,
        pagination: true,
        searchAlign: 'left',
        pageSize: 3,
        clickToSelect: false,
        pageList: [3],

        formatShowingRows: function(pageFrom, pageTo, totalRows) {
            //do nothing here, we don't want to show the text "showing x of y from..."
        },
        formatRecordsPerPage: function(pageNumber) {
            return pageNumber + " visibles";
        },
        icons: {
            refresh: 'fa fa-refresh',
            toggle: 'fa fa-th-list',
            columns: 'fa fa-columns',
            detailOpen: 'fa fa-plus-circle',
            detailClose: 'fa fa-minus-circle'
        }
    });

    $(window).resize(function() {
        $pronosTable.bootstrapTable('resetView');
    });

    $('[data-toggle="tooltip"]').tooltip()

    $('#AddPronosSuccess').hide();
    nbMatch = 0;

    addConfrontation(); // On initialise une confrontation de base
    // addConfrontation();

    $('#combiner').click(function(){
        addConfrontation();
    });

    function addConfrontation()
    {
        oldMatch = nbMatch;
        nbMatch = nbMatch + 1;

        if(oldMatch == 0) // Set
        {
            $('#addpronos #team1').attr('id', 'team1_match' + nbMatch);
            $('#addpronos #team2').attr('id', 'team2_match' + nbMatch);
            $('#addpronos #cote').attr('id', 'cote_match' + nbMatch);
            $('#addpronos #date').attr('id', 'date_match'+ nbMatch);
            $('#addpronos #time').attr('id', 'time_match'+ nbMatch);
        }
        else
        {
            $('#addpronos #team1_match'+ oldMatch).attr('id', 'team1_match' + nbMatch);
            $('#addpronos #team2_match' + oldMatch).attr('id', 'team2_match' + nbMatch);
            $('#addpronos #cote_match' + oldMatch).attr('id', 'cote_match'+ nbMatch);
            $('#addpronos #date_match' + oldMatch).attr('id', 'date_match'+ nbMatch);
            $('#addpronos #time_match' + oldMatch).attr('id', 'time_match'+ nbMatch);

        }

        console.log($('#addpronos').html());

        $('#addpronos').before('<h5>Match '+ nbMatch + '</h5>' + $('#addpronos').html());

    }


    $("#btnAddPronos").click(function()
    {
        while(nbMatch > 0)
        {

            // Envoie une/des confrontation(s)
            $.post('?ajax=addpronos&confrontation',
                {
                    team1: $('#team1_match'+nbMatch).val(),
                    team2: $('#team2_match'+nbMatch).val(),
                    cote: $('#cote_match'+nbMatch).val(),
                    date:  $('#date_match'+nbMatch).val(),
                    time:  $('#time_match'+nbMatch).val(),
                },
                function (data)
                {
                    console.log(data);
                },
            );
            nbMatch = nbMatch - 1;
        }

        if(nbMatch == 0 )
        {
            var delai = setTimeout(addPronos(), 2000);
        }

        // Envoie pronos
        function addPronos()
        {
            $.post('?ajax=addpronos',
                {
                    content: $('#pronosText').val(),
                    reliability: $('#reliability').val(),
                    type: $('#pronosType').val()
                },
                function (data)
                {
                    window.location.replace('/');
                },
            );
        }



    });










});
</script>
