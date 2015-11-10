(function ($) {
    'use strict';
    var responsiveHelper = undefined;
    var breakpointDefinition = {
        tablet: 1024,
        phone: 480
    };

    var initTableWithExportOptions = function () {
        var table = $('#tableWithExportOptions');
        var settings = {
            //"ajax":"/ajax",
            //"columnDefs": [ {
            //    "targets": -1,
            //    "data": null,
            //    "defaultContent": "<button class='btn btn-danger'>删除</button>"
            //}],
            //"columns": [
            //    { "data": "name" },
            //    { "data": "ipmi_area" },
            //    { "data": "ipmi_addr" },
            //    { "data": "manage_area" },
            //    { "data": "manage_addr" },
            //    { "data": "park_area" },
            //    { "data": "park_addr" },
            //    { "data": "use" },
            //    { "data": "model" },
            //    { "data": "id" }
            //],

            "sDom": "<'exportOptions'T><'table-responsive't><'row'<p i>>",
            "sPaginationType": "bootstrap",
            "destroy": true,
            "scrollCollapse": true,
            "bPaginate":false,
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                //"sInfo": "Showing <b>_START_ to _END_</b>  <b> _TOTAL_ </b> 条"
                "sInfo": "共 <b> _TOTAL_ </b> 条"
            },
            "iDisplayLength": 5,
            "oTableTools": {
                "sSwfPath": "assets/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": [ {
                    "sExtends": "xls",
                    "sButtonText": "<i class='fa fa-file-excel-o'></i>",
                }, {
                    "sExtends": "copy",
                    "sButtonText": "<i class='fa fa-copy'></i>",
                }]
            },
            fnDrawCallback: function (oSettings) {
                $('.export-options-container').append($('.exportOptions'));
                $('.exportOptions').addClass('pull-right');
                $('#ToolTables_tableWithExportOptions_0').tooltip({
                    title: 'Export as Excel',
                    container: 'body'
                });
                $('#ToolTables_tableWithExportOptions_1').tooltip({
                    title: 'Copy data',
                    container: 'body'
                });
            }
        };
        table.dataTable(settings);

        $("#tableWithExportOptions tbody").on( 'click', 'button', function () {

            $.ajax({
                url:'/del',
                type:'POST',
                data:{
                    id:$(this).data('id'),
                },
                success:function(){
                    window.location.reload();
                }

            });
        } );

        $('#search-table').keyup(function () {
            table.fnFilter($(this).val());
        });
        $('#show-modal').click(function () {
            $('#addNewAppModal').modal('show');
        });
        $('#add-data').click(function () {
            var name = $('#name').val();
            var ipmi_area = $('#ipmi_area').val();
            var ipmi_addr = $('#ipmi_addr').val();
            var manage_area = $('#manage_area').val();
            var manage_addr = $('#manage_addr').val();
            var park_area = $('#park_area').val();
            var park_addr = $('#park_addr').val();
            var use = $('#use').val();
            var model = $('#model').val();

            $.ajax({
                url:'/ajax',
                type:'POST',
                data:{
                    name:name,
                    ipmi_area:ipmi_area,
                    ipmi_addr:ipmi_addr,
                    manage_area:manage_area,
                    manage_addr:manage_addr,
                    park_area:park_area,
                    park_addr:park_addr,
                    use:use,
                    model:model
                },
                success:function(){
                    $('#addNewAppModal').modal('hide');

                    window.setTimeout(function(){
                        window.location.reload();
                    },1000);
                }

            });

            //table.dataTable().fnAddData([
            //    name,ipmi_area,ipmi_addr,manage_area,manage_addr,park_area,park_addr,use,model
            //]);



        });

    }


    initTableWithExportOptions();
})(window.jQuery);