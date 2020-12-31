    <!-- footer content -->
    <footer>
        <div class="pull-right">
            Created : <strong>Jawa - Ngoding</strong> | Gentelella - Template by <a href="https://colorlib.com">Colorlib</a></a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
    </div>

    <!-- jQuery -->

    <!-- Bootstrap -->
    <script src="<?= base_url('assets/'); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/'); ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url('assets/'); ?>vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?= base_url('assets/'); ?>vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="<?= base_url('assets/'); ?>vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="<?= base_url('assets/'); ?>vendors/Flot/jquery.flot.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?= base_url('assets/'); ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?= base_url('assets/'); ?>vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= base_url('assets/'); ?>vendors/moment/min/moment.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="<?= base_url('assets/'); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('assets/swal/'); ?>sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/swal/'); ?>myscript.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('assets/'); ?>build/js/custom.min.js"></script>

    <script>
        $('.tombol-hapus').on('click', function(e) {

            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Data akan dihapus permanen',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
        });
    </script>
    <script>
        $('.tombol-logout').on('click', function(e) {

            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Konfirmasi Logout',
                text: 'Klik keluar untuk mengakhiri session',
                type: 'danger',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Keluar'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
        });
    </script>



    </body>

    </html>
