    <!-- Datatables -->
    {!!Html::script('vendors/datatables.net/js/jquery.dataTables.min.js')!!}
    {!!Html::script('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')!!}
    {!!Html::script('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')!!}
    {!!Html::script('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')!!}
    {!!Html::script('vendors/datatables.net-buttons/js/buttons.flash.min.js')!!}
    {!!Html::script('vendors/datatables.net-buttons/js/buttons.html5.min.js')!!}
    {!!Html::script('vendors/datatables.net-buttons/js/buttons.print.min.js')!!}
    {!!Html::script('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')!!}
    {!!Html::script('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')!!}
    {!!Html::script('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')!!}
    {!!Html::script('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')!!}
    {!!Html::script('vendors/datatables.net-scroller/js/datatables.scroller.min.js')!!}
    {!!Html::script('vendors/jszip/dist/jszip.min.js')!!}
    {!!Html::script('vendors/pdfmake/build/pdfmake.min.js')!!}
    {!!Html::script('vendors/pdfmake/build/vfs_fonts.js')!!}

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($(".datatable-buttons").length) {
            $(".datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->