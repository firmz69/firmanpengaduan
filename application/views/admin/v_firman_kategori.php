<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex aling-item-center">
                <h5 class="m-0 font-weight-bold text-primary mt-2">Kategori</h5>
                <button class="ml-auto btn btn-outline-light bg-primary" href="" data-toggle="modal" data-target="#tambahKategori">

                    + Kategori
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th >Kategori</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>



                    <tbody>
                        <?php
                        $count = 0;

                        foreach ($kategori as $k) :
                            $count = $count + 1;
                        ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo $k['kategori']; ?></td>
                                <th><a class="btn btn-danger" href="<?php echo base_url('hapus_kategori/') . $k['id_kategori'] ?> "><i class="fa fa-trash"></i></a> 
                                <a class="btn btn-primary" href="<?php echo base_url('C_firman_Update/editKategori/') . $k['id_kategori'] ?> " data-toggle="modal" data-target="#editKategori<?= $k['id_kategori'] ?>"><i class="fa fa-edit"></i></a>
                                </th>

                            </tr>


                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex aling-item-center">
                <h5 class="m-0 font-weight-bold text-primary mt-2 ">SubKategori</h5>
                <button class="ml-auto btn btn-outline-primary text-light bg-primary" href="" data-toggle="modal" data-target="#tambahSubKategori">

                    + SubKategori
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="display table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>SubKategori</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>



                    <tbody>
                        <?php
                        $count = 0;

                        foreach ($subkategori as $sk) :
                            $count = $count + 1;
                        ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo $sk['kategori']; ?></td>
                                <td><?php echo $sk['subkategori']; ?></td>

                                <th><a class="btn btn-danger" href="<?php echo base_url('C_firman_Update/hapusSubKategori/') . $sk['id_subkategori'] ?>"><i class="fa fa-trash"></i></a> <a class="btn btn-primary" href="" data-toggle="modal" data-target="#editSubKategori<?= $sk['id_subkategori'] ?>"><i class="fa fa-edit"></i></a>
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

<!-- Tambah Kategori Modal -->


<!-- Modal -->
<div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('tambah_kategori') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kategori" name="kategori" placeholder="Kategori">
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
<!-- Tambah SubKategori Modal -->


<!-- Modal -->
<div class="modal fade" id="tambahSubKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah SubKategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('tambah_subkategori') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Kategori</h6>

                        <select name="kategori" id="kategori" type="text" class="form-control form-control-user">
                            <option selected value="">-- Pilih --</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id_kategori'] ?>"><?= $k['kategori'] ?></option>
                            <?php endforeach ?>



                        </select>

                    </div>
                </div>
                <div class="modal-body">
                    <h6>SubKategori</h6>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="subkategori" name="subkategori">
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

<?php foreach ($kategori as $k) : ?>
    <div class="modal fade" id="editKategori<?= $k["id_kategori"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                    <form action="<?php echo base_url('C_firman_Update/editKategori/' . $k["id_kategori"]) ?>" method="post">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Kategori</h6>
                        <td><input type="text" class="form-control form-control-user" id="kategori" name="kategori" value="<?= $k['kategori'] ?>"></td>
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

<?php foreach ($subkategori as $sk) : ?>
    <div class="modal fade" id="editSubKategori<?= $sk["id_subkategori"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit SubKategori</h5>
                    <form action="<?php echo base_url('C_firman_Update/editSubkategori/' . $sk["id_subkategori"]) ?>" method="post">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Kategori</h6>
                        <td><input type="text" class="form-control form-control-user" id="kategori" name="kategori" value="<?= $sk['kategori'] ?>" disabled></td>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Subkategori</h6>
                        <td><input type="text" class="form-control form-control-user" id="subkategori" name="subkategori" value="<?= $sk['subkategori'] ?>"></td>
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