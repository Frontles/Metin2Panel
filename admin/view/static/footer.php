<?php if  (session('admin_rank')): ?>

<!-- footer content -->
    <footer style="color: black">
        <div class="pull-right">
            <a style="color: lightseagreen;" href="https://www.metin2panel.com" target="_blank">Metin2 Panel</a> Tarafından Geliştirilmiştir. 2020®
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
</div>



 
  
    <script src="<?= admin_public_url('/vendors/dropzone/dist/min/dropzone.min.js') ?>"></script>
    
      <script type="text/javascript"
     src="https://code.jquery.com/jquery-3.3.1.min.js">
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="<?= admin_public_url("/datepicker/jquery.datetimepicker.full.min.js") ?>"></script>
    
    <!-- ECharts -->
    <script src="<?= admin_public_url('/js/datepicker.js?v=12') ?>"></script>
    <script src="<?=admin_public_url('/vendors/echarts/dist/echarts.min.js')?> "></script>

    <script src="<?= admin_public_url('/vendors/echarts/map/js/world.js')?>"></script>
    <!-- jQuery -->
    <script src="<?= admin_public_url('/vendors/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?= admin_public_url('/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?= admin_public_url('/vendors/fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?= admin_public_url('/vendors/nprogress/nprogress.js') ?>"></script>
    <!-- iCheck -->
    <script src="<?= admin_public_url('/vendors/iCheck/icheck.min.js') ?>"></script>
    <!-- Datatables -->


<script src="<?= admin_public_url('/vendors/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= admin_public_url('/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?= admin_public_url('/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= admin_public_url('/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
<script src="<?= admin_public_url('/vendors/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
<script src="<?= admin_public_url('/vendors/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= admin_public_url('/vendors/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= admin_public_url('/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
<script src="<?= admin_public_url('/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
<script src="<?= admin_public_url('/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= admin_public_url('/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
<script src="<?= admin_public_url('/vendors/datatables.net-scroller/js/datatables.scroller.min.js') ?>"></script>
<script src="<?= admin_public_url('/vendors/jszip/dist/jszip.min.js') ?>"></script>
<script src="<?= admin_public_url('/vendors/pdfmake/build/pdfmake.min.js') ?>"></script>
<script src="<?= admin_public_url('/vendors/pdfmake/build/vfs_fonts.js') ?>"></script>
<script src="<?= admin_public_url('/js/extra.js') ?>"></script>



    <!-- Custom Theme Scripts -->
    <script src="<?= admin_public_url('/build/js/custom.min.js') ?>"></script>
    <!-- Datatables -->
    <script>
    $(document).ready(function() {
        var handleDataTableButtons = function() {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
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


    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<!-- /Datatables -->

    </body>
    </html>
<?php endif;?>