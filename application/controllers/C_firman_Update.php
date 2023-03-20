<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_firman_Update extends CI_Controller
{

    // CONTROLLER UPDATE FOR ADMIN // 
    // Controller CRUD Kategori Admin
    public function tambahKategori()
    {
        $this->load->model('M_firman_Admin');

        $kategori = $this->input->post('kategori');

        $tambahKategori = array(
            'kategori' => $kategori,
        );

        $this->M_firman_Admin->insertKategori($tambahKategori);
        redirect('kategori_admin');
    }

    public function editKategori($id)
    {

        $this->load->model('M_firman_Admin');
        $kategori = $this->input->post('kategori');

        $update = array(
            'kategori' => $kategori
        );

        $this->M_firman_Admin->editKategori($id, $update);
        redirect('kategori_admin');
    }

    public function hapusKategori($id)
    {
        $this->load->model('M_firman_Admin');
        $this->M_firman_Admin->hapusKategori($id);
        redirect('kategori_admin');
    }



    // Controller CRUD SubKategori Admin
    public function tambahSubKategori()
    {
        $this->load->model('M_firman_Admin');

        $kategori = $this->input->post('kategori');
        $subkategori = $this->input->post('subkategori');

        $tambahSubKategori = array(
            'id_kategori' => $kategori,
            'subkategori' => $subkategori,
        );

        $this->M_firman_Admin->joinSubKategori();
        $this->M_firman_Admin->insertSubKategori($tambahSubKategori);
        redirect('kategori_admin');
    }

    public function editSubkategori($id)
    {

        $this->load->model('M_firman_Admin');
        $subkategori = $this->input->post('subkategori');

        $update = array(
            'subkategori' => $subkategori
        );

        $this->M_firman_Admin->editSubkategori($id, $update);
        redirect('kategori_admin');
    }

    public function hapusSubKategori($id)
    {
        $this->load->model('M_firman_Admin');
        $this->M_firman_Admin->hapusSubKategori($id);
        redirect('kategori_admin');
    }


    // Update Tanggapan Admin 

    public function upload_tanggapan($id_pengaduan)
    {

        $this->load->model('M_firman_Admin');


        $data_petugas = $this->M_firman_Admin->petugasData($this->session->userData('username'))->row_array();

        $upload_data = array(
            'id_pengaduan' => $id_pengaduan,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $this->input->post('tanggapan'),
            'id_petugas' => $data_petugas['id_petugas'],
        );

        $this->db->insert('tanggapan', $upload_data);


        $update = array(
            'status' => $this->input->post('status'),
        );

        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->update('pengaduan', $update);

        redirect('riwayat_admin');
    }


    public function update_status_selesai($id_pengaduan)
    {
        $this->load->model('M_firman_Admin');

        $data_petugas = $this->M_firman_Admin->petugasData($this->session->userData('username'))->row_array();

        $upload_data = array(
            'id_pengaduan' => $id_pengaduan,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $this->input->post('tanggapan'),
            'id_petugas' => $data_petugas['id_petugas'],
        );

        $this->db->insert('tanggapan', $upload_data);

        $update = [
            'status' => 'selesai'
        ];

        $this->M_firman_Admin->updateSelesai($id_pengaduan, $update);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
    Berhasil Menyelesaikan laporan ! ');
        redirect('C_firman_dashboard/selesai_admin/' . $id_pengaduan);
    }


    // Controller CRUD Tabel Petugas Admin

    public function editPetugas($id)
    {

        $this->load->model('M_firman_Admin');
        $nama_petugas = $this->input->post('nama_petugas');
        $username = $this->input->post('username');
        $telpon = $this->input->post('telpon');
        $level = $this->input->post('level');

        $update = array(
            'nama_petugas' => $nama_petugas,
            'username' => $username,
            'telpon' => $telpon,
            'level' => $level
        );

        $this->M_firman_Admin->editPetugas($id, $update);
        redirect('petugas_admin');
    }

    public function hapusPetugas($id)
    {
        $this->load->model('M_firman_Admin');
        $this->M_firman_Admin->hapusPetugas($id);
        $this->session->set_flashdata('petugas', '<div class="alert alert-success" role="alert">
        Petugas berhasil dihapus!
          </div>');
        redirect('petugas_admin');
    }

    // Controller Bannned Tabel Masyarakat Admin
    public function banMasyarakat($id)
    {

        $this->load->model('M_firman_User');

        // $is_active = $this->input->post('is_active');

        $update = array(
            'is_active' => 'not_active'
        );

        $this->M_firman_User->banMasyarakat($id, $update);
        $this->session->set_flashdata('is_active', '<div class="alert alert-danger" role="alert">
        Masyarakat berhasil dibanned!
          </div>');
        redirect('masyarakat_admin');
    }

    public function aktifMasyarakat($id)
    {

        $this->load->model('M_firman_User');

        // $is_active = $this->input->post('is_active');

        $update = array(
            'is_active' => 'active'
        );

        $this->M_firman_User->aktifMasyarakat($id, $update);
        $this->session->set_flashdata('is_active', '<div class="alert alert-success" role="alert">
        Masyarakat berhasil diaktifkan!
          </div>');
        redirect('masyarakat_admin');
    }

    // Generate Laporan Admin
    public function laporan_pdf()
    {

        $this->load->model('M_firman_Admin');
        $this->load->model('M_firman_User');

        $data['user'] = $this->M_firman_Admin->userData($this->session->userData('username'))->row_array();
        $data['masyarakat'] = $this->M_firman_Admin->getMasyarakat();
        $data['petugas'] = $this->M_firman_Admin->getPetugas();
        $pengaduan = $this->M_firman_User->join_laporan();

        $data = array(
            "dataku" => array(
                "nama" => "Petani Kode",
                "url" => "http://petanikode.com"
            ),

            'pengaduan' => $pengaduan,
        );



        $this->load->library('Pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "laporan-pengaduan-masyarakat.pdf";
        $this->pdf->load_view('admin/laporanpdf', $data);
    }

    // CONTROLLER UPDATE FOR ADMIN // 







    // CONTROLLER UPDATE FOR MASYARAKAT // 

    // Controller Pengaduan Masyarakat
    public function tambahPengaduan()
    {
        $this->load->model('M_firman_User');

        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            echo "Gagal Nambah";
        } else {
            $foto = $this->upload->data();
            $foto = $foto['file_name'];
            $user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
            $subkategori = $this->input->post('subkategori');
            $kategori = $this->input->post('kategori');
            $laporan = $this->input->post('isi_laporan');

            $tambahPengaduan = array(

                'nik' => $user['nik'],
                'id_subkategori' => $subkategori,
                'id_kategori' => $kategori,
                'tgl_pengaduan' => date('Y-m-d'),
                'isi_laporan' => $laporan,
                'foto' => $foto,
            );

            $this->M_firman_User->insertPengaduan($tambahPengaduan);
            $this->M_firman_User->join_pengaduan();
            $this->session->set_flashdata('pengaduan', '<div class="alert alert-success" role="alert">Laporan berhasil di Tambahkan!</div>');
            redirect('riwayat_masyarakat');
        }
    }

    // Ajax Masyarakat
    public function get_sub_kategori()
    {
        $id_kategori = $this->input->post('id');
        $sub_kategori = $this->db->get_where('subkategori', ['id_kategori' => $id_kategori])->result();
        echo json_encode($sub_kategori);
    }

    // Edit Profile Masyarakat

    public function editProfile($nik)
    {
        $this->load->model('M_firman_Admin');

        $nama_lengkap = $this->input->post('nama_lengkap');
        $username = $this->input->post('username');
        $telepon = $this->input->post('telepon');

        $update = array(
            'nama_lengkap' => $nama_lengkap,
            'username' => $username,
            'telepon' => $telepon
        );
        $this->M_firman_Admin->editProfile($nik, $update);
        redirect('profile_masyarakat');
    }

    // CONTROLLER UPDATE FOR MASYARAKAT // 






    // CONTROLLER UPDATE FOR PETUGAS
    // Update Tanggapan Petugas
    public function petugas_upload_tanggapan($id_pengaduan)
    {

        $this->load->model('M_firman_Admin');


        $data_petugas = $this->M_firman_Admin->petugasData($this->session->userData('username'))->row_array();

        $upload_data = array(
            'id_pengaduan' => $id_pengaduan,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $this->input->post('tanggapan'),
            'id_petugas' => $data_petugas['id_petugas'],
        );

        $this->db->insert('tanggapan', $upload_data);


        $update = array(
            'status' => $this->input->post('status'),
        );

        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->update('pengaduan', $update);

        redirect('riwayat_petugas');
    }


    public function petugas_update_status_selesai($id_pengaduan)
    {
        $this->load->model('M_firman_Admin');

        $data_petugas = $this->M_firman_Admin->petugasData($this->session->userData('username'))->row_array();

        $upload_data = array(
            'id_pengaduan' => $id_pengaduan,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $this->input->post('tanggapan'),
            'id_petugas' => $data_petugas['id_petugas'],
        );

        $this->db->insert('tanggapan', $upload_data);

        $update = [
            'status' => 'selesai'
        ];

        $this->M_firman_Admin->updateSelesai($id_pengaduan, $update);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
		Berhasil Menyelesaikan laporan ! ');
        redirect('C_firman_dashboard/selesai_petugas/' . $id_pengaduan);
    }

    // Controller Bannned Tabel Masyarakat Petugas
    public function petugasbanMasyarakat($id)
    {

        $this->load->model('M_firman_User');

        $update = array(
            'is_active' => 'not_active'
        );

        $this->M_firman_User->banMasyarakat($id, $update);
        $this->session->set_flashdata('is_active', '<div class="alert alert-danger" role="alert">
			Masyarakat berhasil dibanned!
		  	</div>');
        redirect('masyarakat_petugas');
    }

    public function petugasaktifMasyarakat($id)
    {

        $this->load->model('M_firman_User');

        $update = array(
            'is_active' => 'active'
        );

        $this->M_firman_User->aktifMasyarakat($id, $update);
        $this->session->set_flashdata('is_active', '<div class="alert alert-success" role="alert">
			Masyarakat berhasil diaktifkan!
		  	</div>');
        redirect('masyarakat_petugas');
    }

    // CONTROLLER UPDATE FOR PETUGAS //
}
