			<!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Basyir 2023 - Booster Your Iman</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin akan Keluar Aplikasi?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" dibawah jika kamu siap mengakhiri sesi login terbaru kamu.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="\logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url();?>/assets/assets-admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>/assets/assets-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url();?>/assets/assets-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url();?>/assets/assets-admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url();?>/assets/assets-admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url();?>/assets/assets-admin/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url();?>/assets/assets-admin/js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url();?>/assets/assets-admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>/assets/assets-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url();?>/assets/assets-admin/js/demo/datatables-demo.js"></script>

    <script>
     	CKEDITOR.replace( 'editor1' );
 	</script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#jadwal_notifikasi').hide();
            var select = document.getElementById('jadwal');
            var value = select.options[select.selectedIndex].value;
            console.log(value); // en
            $('#jadwal').val(); // en
            $('#jadwal').on('change', function() {
                if ($('#jadwal').val() == 'now' ) {
                    $('#jadwal_notifikasi').hide();
                } else {
                    $('#jadwal_notifikasi').show();
                }
            });
                    // $('#thisCiamis').prop('checked',true)
                    // $('#nonCiamis').on('click', function() {
                    //     $('#daerahCiamis').hide();
                    //     $('#thisCiamis').prop('checked',false)
                    //     $('#JuduldaerahCiamis').hide();
                    //     $('#luarCiamis').show();
                    //     $('#kecamatan').prop('required',false)
                    //     $('#desa').prop('required',false)
                    // });
                    // $('#thisCiamis').on('click', function() {
                    //     $('#daerahCiamis').show();
                    //     $('#JuduldaerahCiamis').show();
                    //     $('#nonCiamis').prop('checked',false)
                    //     $('#luarCiamis').hide();
                    // });
        });
    </script>

</body>

</html>