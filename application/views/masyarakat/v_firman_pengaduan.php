<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex aling-item-center">
                <h5 class="m-0 font-weight-bold text-primary mt-2">Pengaduan</h5>

            </div>
        </div>
        <div class="card-body">
            <form action="<?= base_url('masyarakat_pengaduan') ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Kategori</label>
                        <select name="kategori" id="kategori" type="text" class="form-control form-control-user">
                            <option select>-- Pilih --</option>
                            <?php foreach ($kategori as $k) { ?>
                                <option value="<?= $k['id_kategori'] ?>"><?= $k['kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">SubKategori</label>
                        <select name="subkategori" id="sub_kategori" type="text" class="form-control form-control-user">
                            <option selected value="">-- Pilih --</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="">Bukti Foto</label>
                        <div class="form-control">
                            <input type="file" name="foto" id="foto" size="20">

                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="">Pengaduan</label>
                        <textarea name="isi_laporan" cols="30" rows="10" class="form-control form-control-user"></textarea>

                    </div>

                    <div class="col-md-7">
                        <br>
                        <button type="submit" class="btn btn-primary">+ Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; UKK-Fireman 2024</span>
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
<div class="modal fade" id="logoutModalmasyarakat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin untuk keluar??</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik Logout jika Anda ingin keluar</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>