<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        $('#kategori').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url() ?>C_firman_Update/get_sub_kategori",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {

                        html += '<option value=' + data[i].id_subkategori + '>' + data[i].subkategori + '</option>';
                    }
                    $('#sub_kategori').html(html);
                    // console.dir(data);
                    // console.log();    

                }
            });
            return false;

        });

    });
</script>



<!-- Bootstrap core JavaScript-->
<script src=<?= base_url('assets/vendor/jquery/jquery.min.js') ?>></script>
<script src=<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>></script>

<!-- Core plugin JavaScript-->
<script src=<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>></script>

<!-- Custom scripts for all pages-->
<script src=<?= base_url('assets/js/sb-admin-2.min.js') ?>></script>

<!-- Page level plugins -->
<script src=<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>></script>

<!-- Page level custom scripts -->
<script src=<?= base_url('assets/js/demo/chart-area-demo.js') ?>></script>
<script src=<?= base_url('assets/js/demo/chart-pie-demo.js') ?>></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>

<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>




</body>

</html>