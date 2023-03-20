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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width='1%'>No</th>
                            <th width='5%'>NIK</th>
                            <th width='15%'>Tanggal</th>
                            <th width='10%'>Kategori</th>
                            <th width='15%'>Subkategori</th>
                            <th width='20%'>Isi Pengaduan</th>
                            <th width='5%'>Detail</th>
                            <th width='5%'>Status</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $count = 0;

                        foreach ($riwayatadmin as $ra) :
                            $count = $count + 1;
                        ?>

                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $ra['nik']  ?></td>
                                <td><?= $ra['tgl_pengaduan']  ?></td>
                                <td><?= $ra['kategori']  ?></td>
                                <td><?= $ra['subkategori']  ?></td>
                                <td><?= $ra['isi_laporan']  ?></td>
                                <td>
                                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#detailAdmin<?= $ra['id_pengaduan'] ?>">
                                        Detail
                                    </button>
                                </td>


                                <th>
                                    <?php if ($ra['status'] == '0') : ?>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ngadu<?= $ra['id_pengaduan'] ?>">
                                            Segera
                                        </button>
                                    <?php endif ?>
                                    <?php if ($ra['status'] == "proses") : ?>
                                        <a type="button" class="btn btn-primary" href="<?= base_url('C_firman_dashboard/proses_admin/') . $ra['id_pengaduan'] ?>">
                                            Proses
                                        </a>
                                    <?php endif ?>
                                    <?php if ($ra['status'] == "selesai") : ?>
                                        <a type="button" class="btn btn-success" href="<?= base_url('C_firman_dashboard/selesai_admin/') . $ra['id_pengaduan'] ?>">
                                            Selesai
                                        </a>
                                    <?php endif ?>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ngadu<?= $ra['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tindakan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?= base_url('C_firman_Update/upload_tanggapan/') . $ra['id_pengaduan'] ?>">
                                                        <fieldset disabled>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="exampleInputEmail1">Pelapor</label>
                                                                    <input type="text" class="form-control" id="pelapor" aria-describedby="emailHelp" value="<?= $ra['nama_lengkap'] ?>">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="exampleInputPassword1">Tanggal</label>
                                                                    <input type="date" class="form-control" id="tgl_pengaduan" value="<?= $ra['tgl_pengaduan'] ?>">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="exampleInputEmail1">Kategori</label>
                                                                    <input type="text" class="form-control" id="kategori" aria-describedby="emailHelp" value="<?= $ra['kategori'] ?>">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="exampleInputEmail1">Subkategori</label>
                                                                    <input type="text" class="form-control" id="sub_kategori" value="<?= $ra['subkategori'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1">Isi Pengaduan</label>
                                                                <textarea type="text" class="form-control" id="isi_laporan" value=""><?= $ra['isi_laporan'] ?></textarea>
                                                            </div>
                                                        </fieldset>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Tanggapan</label>
                                                            <textarea class="form-control" name="tanggapan" id="tanggapan" placeholder="Masukan Tanggapan"></textarea>
                                                        </div>
                                                        <div>
                                                            <label for="exampleInputEmail1" class="form-label">Status</label>
                                                            <select name="status" class="form form-control mt-2" id="">
                                                                <option selected>-- Pilih --</option>
                                                                <option value="proses">Proses</option>
                                                                <option value="selesai">Selesai</option>
                                                            </select>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="detailAdmin<?= $ra['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <fieldset disabled>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-6">
                                                                <label for="exampleInputEmail1">Pelapor</label>
                                                                <input type="text" class="form-control" id="pelapor" value="<?= $ra['nama_lengkap'] ?>">
                                                            </div>

                                                            <div class="mb-3 col-md-6">
                                                                <label for="exampleInputPassword1">Tanggal</label>
                                                                <input type="date" class="form-control" id="tgl_pengaduan" value="<?= $ra['tgl_pengaduan'] ?>">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="exampleInputEmail1">Kategori</label>
                                                                <input type="text" class="form-control" id="kategori" value="<?= $ra['kategori'] ?>">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="exampleInputEmail1">Subkategori</label>
                                                                <input type="text" class="form-control" id="sub_kategori" value="<?= $ra['subkategori'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1">Isi Pengaduan</label>
                                                            <textarea type="text" class="form-control" id="isi_laporan" value=""><?= $ra['isi_laporan'] ?></textarea>
                                                        </div>
                                                    </fieldset>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Foto</label>
                                                        <div>
                                                            <img src="<?php echo base_url() . '/assets/img/upload/' . $ra['foto']; ?>" alt="" style="width: 250px; border-radius: 5px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
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
<div class="modal fade" id="logoutModaladmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a class="btn btn-primary" href="<?= base_url('logout_admin') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>