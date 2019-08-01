<script>
var $userTable = $('#userTable');

    $().ready(function() {

    // function operateFormatter(value, row, index) {
    //     return [
    //         '<a rel="tooltip" title="Ajouter abonnement" class="btn btn-link btn-success table-action subscribe" href="javascript:void(0)">',
    //         '<i class="fa fa-cart-plus"></i>',
    //         '</a>',
    //         '<a rel="tooltip" title="Supprimer" class="btn btn-link btn-danger table-action remove" href="javascript:void(0)">',
    //         '<i class="fa fa-remove"></i>',
    //         '</a>'
    //     ].join('');
    // }


    //     window.operateEvents = {
    //         // 'click .subscribe': function(e, value, row, index) {

    //         // },
    //         // 'click .edit': function(e, value, row, index) {
    //         //     info = JSON.stringify(row);

    //         //     swal('You click edit icon, row: ', info);
    //         //     console.log(info);
    //         // },
    //         // 'click .remove': function(e, value, row, index) {
    //         //     console.log(value);

    //         //     swal({
    //         //     title: "Etes vous sûr ?",
    //         //     icon: 'warning',
    //         //     dangerMode: true,
    //         //     buttons: true,
    //         //     });

    //         //     $userTable.bootstrapTable('remove', {
    //         //         field: 'id',
    //         //         values: [row.id]
    //         //     });
    //         // }
    //     };

        $userTable.bootstrapTable({
            clickToSelect: false,
            showRefresh: false,
            search: true,
            showToggle: false,
            showColumns: true,
            pagination: true,
            searchAlign: 'left',
            pageSize: 3,
            clickToSelect: false,
            pageList: [3],

            formatShowingRows: function(pageFrom, pageTo, totalRows) {

            },

            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });

        $('[data-toggle="tooltip"]').tooltip()

        $(window).resize(function() {
            $userTable.bootstrapTable('resetView');
        });


    });
</script>

