        <footer class="main-footer">
            <strong>Copyright &copy; TEFA Pengembangan Perangkat Lunak Dan Gim 2022 </strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="<?php echo base_url('template/plugins/jquery/jquery.min.js') ?>"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url('template/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url('template/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <!-- ChartJS -->
        <script src="<?php echo base_url('template/plugins/chart.js/Chart.min.js') ?>"></script>
        <!-- JQVMap -->
        <script src="<?php echo base_url('template/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
        <script src="<?php echo base_url('template/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url('template/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url('template/plugins/moment/moment.min.js') ?>"></script>
        <script src="<?php echo base_url('template/plugins/daterangepicker/daterangepicker.js') ?>"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?php echo base_url('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
        <!-- Summernote -->
        <script src="<?php echo base_url('template/plugins/summernote/summernote-bs4.min.js') ?>"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo base_url('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('template/js/adminlte.js') ?>"></script>
        <!-- jQuery -->
        <script src="<?php echo base_url('template/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
        <script src="<?php echo base_url('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
        <script src="<?php echo base_url('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
        <script src="<?php echo base_url('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
        <script src="<?php echo base_url('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
        <script src="<?php echo base_url('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
        <script src="<?php echo base_url('template/plugins/jszip/jszip.min.js') ?>"></script>
        <script src="<?php echo base_url('template/plugins/pdfmake/pdfmake.min.js') ?>"></script>
        <script src="<?php echo base_url('template/plugins/pdfmake/vfs_fonts.js') ?>"></script>
        <script src="<?php echo base_url('template/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
        <script src="<?php echo base_url('template/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
        <script src="<?php echo base_url('template/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
        <script>
            $(document).ready(function() {
                $('.table').DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print"]
                }).buttons().container().appendTo('.dataTables_wrapper .col-md-6:eq(0)');
            });
        </script>
        <?= $this->renderSection('js') ?>
        </body>

        </html>