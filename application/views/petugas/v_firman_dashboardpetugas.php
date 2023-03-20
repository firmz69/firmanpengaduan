       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h6 class="h3 mb-0 text-bold text-gray-800">Selamat Datang <?= $petugas['level'] ?></h6> 
           <br>

           <div class="row">

               <!-- Earnings (Monthly) Card Example -->
               <div class="col-xl-4 col-md-6 mb-4">
                   <div class="card border-left-warning shadow h-100 py-2">
                       <div class="card-body">
                           <div class="row no-gutters align-items-center">
                               <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                       Data Laporan</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengaduan ?></div>
                               </div>
                               <div class="col-auto">

                               </div>
                           </div>
                       </div>
                   </div>
               </div>

               <!-- Earnings (Monthly) Card Example -->
               <div class="col-xl-4 col-md-6 mb-4">
                   <div class="card border-left-warning shadow h-100 py-2">
                       <div class="card-body">
                           <div class="row no-gutters align-items-center">
                               <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                       Data Proses</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $proses ?></div>
                               </div>
                               <div class="col-auto">

                               </div>
                           </div>
                       </div>
                   </div>
               </div>

               <!-- Earnings (Monthly) Card Example -->
               <div class="col-xl-4 col-md-6 mb-4">
                   <div class="card border-left-warning shadow h-100 py-2">
                       <div class="card-body">
                           <div class="row no-gutters align-items-center">
                               <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Selesai
                                   </div>
                                   <div class="row no-gutters align-items-center">
                                       <div class="col-auto">
                                           <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $selesai ?></div>
                                       </div>

                                   </div>
                               </div>
                               <div class="col-auto">

                               </div>
                           </div>
                       </div>
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
       <div class="modal fade" id="logoutModalpetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Yakin Untuk Keluar??</h5>
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