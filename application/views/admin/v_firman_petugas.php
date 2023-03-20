<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex aling-item-center">
                <h5 class="m-0 font-weight-bold text-primary mt-2">Petugas</h5>
                <button class="ml-auto btn btn-outline-primary bg-primary text-light" href="" data-toggle="modal" data-target="#tambahPetugas">
                    Tambah Petugas
                </button>
            </div>
        </div>

        <div class="card-body">
            <?= $this->session->flashdata('petugas'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th >No</th>
                            <th >Username</th>
                            <th>Nama</th>
                            <th >Telepone</th>
                            <th >Level</th>
                            <th >Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;

                        foreach ($lihat_petugas as $p) :
                            $count = $count + 1;
                        ?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $p['username'] ?></td>
                                <td><?= $p['nama_petugas'] ?></td>
                                <td><?= $p['telpon'] ?></td>
                                <td><?= $p['level'] ?></td>
                                <th><a class="btn btn-danger" href="<?= base_url('C_firman_Update/hapusPetugas/') . $p['id_petugas'] ?>" onclick="return confirm('Anda takin ingin menghapus ini?')"><i class="fa fa-trash"></i></a> <a class="btn btn-primary" href="" data-toggle="modal" data-target="#editPetugas<?= $p['id_petugas'] ?>"><i class="fa fa-edit"></i></a>
                                </th>

                            </tr>

                        <?php endforeach; ?>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">+ Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($lihat_petugas as $p) : ?>
    <div class="modal fade" id="editPetugas<?= $p["id_petugas"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
                    <form action="<?php echo base_url('C_firman_Update/editPetugas/' . $p["id_petugas"]) ?>" method="post">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Nama</h6>
                        <td><input type="text" class="form-control form-control-user" id="nama_petugas" name="nama_petugas" value="<?= $p['nama_petugas'] ?>"></td>
                    </div>
                    <div class="form-group">
                        <h6>Username</h6>
                        <td><input type="text" class="form-control form-control-user" id="username" name="username" value="<?= $p['username'] ?>"></td>
                    </div>
                    <div class="form-group">
                        <h6>Telepone</h6>
                        <td><input type="text" class="form-control form-control-user" id="telpon" name="telpon" value="<?= $p['telpon'] ?>"></td>
                    </div>
                    <div class="form-group">
                        <h6>Level</h6>
                        <select name="level" id="level" type="text" class="form-control form-control-user">
                            <option selected value="<?= $p['level'] ?>"><?= $p['level'] ?></option>
                            <option>admin</option>
                            <option>petugas</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>