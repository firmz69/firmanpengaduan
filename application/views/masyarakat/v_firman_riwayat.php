<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex aling-item-center">
                <h5 class="m-0 font-weight-bold text-primary mt-2">Riwayat</h5>

            </div>
        </div>

        <div class="card-body">
            <?= $this->session->flashdata('pengaduan'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width='1%'>No</th>
                            <th width='5%'>NIK</th>
                            <th width='15%'>Tanggal</th>
                            <th width='10%'>Kategori</th>
                            <th width='15%'>Subkategori</th>
                            <th width='20%'>Pengaduan</th>
                            <th width='5%'>Detail</th>
                            <th width='5%'>Status</th>

                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $count = 0;

                        foreach ($riwayat as $r) :
                            $count = $count + 1;
                        ?>

                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $r['nik'] ?></td>
                                <td><?= $r['tgl_pengaduan']  ?></td>
                                <td><?= $r['kategori']  ?></td>
                                <td><?= $r['subkategori']  ?></td>
                                <td><?= $r['isi_laporan']  ?></td>
                                <td>
                                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#detail<?= $r['id_pengaduan'] ?>">
                                        Detail
                                    </button>
                                </td>
                                <th>
                                    <?php if ($r['status'] == '0') : ?>
                                        <a type="button" class="btn btn-danger" href="<?php base_url('C_firman_dashboard/proses_masyarakat/') . $r['id_pengaduan']  ?>">
                                            Segera
                                        </a>
                                    <?php endif ?>
                                    <?php if ($r['status'] == "proses") : ?>
                                        <a type="button" class="btn btn-primary" href="<?= base_url('C_firman_dashboard/proses_masyarakat/') . $r['id_pengaduan']  ?>">
                                            Proses
                                        </a>
                                    <?php endif ?>
                                    <?php if ($r['status'] == "selesai") : ?>
                                        <a type="button" class="btn btn-success" href="<?= base_url('C_firman_dashboard/proses_masyarakat/') . $r['id_pengaduan']  ?>">
                                            Selesai
                                        </a>
                                    <?php endif ?>

                                    <!-- Modal -->
                                    <div class="modal fade" id="detail<?= $r['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <input type="text" class="form-control" id="pelapor" aria-describedby="emailHelp" value="<?= $r['nama_lengkap'] ?>">
                                                            </div>

                                                            <div class="mb-3 col-md-6">
                                                                <label for="exampleInputPassword1">Tanggal</label>
                                                                <input type="date" class="form-control" id="tgl_pengaduan" value="<?= $r['tgl_pengaduan'] ?>">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="exampleInputEmail1">Kategori</label>
                                                                <input type="text" class="form-control" id="kategori" aria-describedby="emailHelp" value="<?= $r['kategori'] ?>">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="exampleInputEmail1">Subkategori</label>
                                                                <input type="text" class="form-control" id="sub_kategori" aria-describedby="emailHelp" value="<?= $r['subkategori'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1">Isi Pengaduan</label>
                                                            <textarea type="text" class="form-control" id="isi_laporan" aria-describedby="emailHelp" value=""><?= $r['isi_laporan'] ?></textarea>
                                                        </div>
                                                    </fieldset>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Foto</label>
                                                        <div>
                                                            <img src="<?php echo base_url() . '/assets/img/upload/' . $r['foto']; ?>" alt="" style="width: 250px; border-radius: 5px;">
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

<!-- Tambah Kategori Modal -->


<!-- Modal -->
<div class="modal fade" id="tambahPetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('tambah_petugas') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_petugas" name="nama_petugas" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" id="telpon" name="telpon" placeholder="Telepone">
                    </div>
                    <div class="form-group">
                        <select name="level" id="level" type="text" class="form-control form-control-user">
                            <option selected value="">-- Pilih --</option>
                            <option>admin</option>
                            <option>petugas</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">+ Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>