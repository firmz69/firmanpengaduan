<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_firman_Admin extends CI_Model
{


    // Model Admin Kategori
    function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    function insertKategori($data)
    {
        $this->db->insert('kategori', $data);
    }


    function hapusKategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }


    // Model Admin SubKategori

    function joinSubKategori()
    {
        $this->db->select('*');
        $this->db->from('subkategori');
        $this->db->join('kategori', 'kategori.id_kategori=subkategori.id_kategori');
        return $this->db->get()->result_array();
    }


    function insertSubKategori($data)
    {
        $this->db->insert('subkategori', $data);
    }


    // Riwayat Admin //
    function getRiwayatAdmin()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        $this->db->join('subkategori', 'subkategori.id_subkategori=pengaduan.id_subkategori');
        $this->db->join('kategori', 'kategori.id_kategori=subkategori.id_kategori');
        return $this->db->get()->result_array();
    }

    function proses($id)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        $this->db->join('subkategori', 'subkategori.id_subkategori=pengaduan.id_subkategori');
        $this->db->join('kategori', 'kategori.id_kategori=subkategori.id_kategori');
        $this->db->where('id_pengaduan', $id);
        return $this->db->get()->row_array();
    }


    function prosesTanggapan($id)
    {
        $this->db->select('*');
        $this->db->from('tanggapan');
        $this->db->join('petugas', 'petugas.id_petugas=tanggapan.id_petugas');
        $this->db->where('id_pengaduan', $id);
        return $this->db->get()->result_array();
    }





    // Model Petugas
    function getPetugas()
    {
        return $this->db->get('petugas')->result_array();
    }

    function insertPetugas($tambahPetugas)
    {
        $this->db->insert('petugas', $tambahPetugas);
    }



    // Setup
    function insertAdmin($tambahAdmin)
    {
        $this->db->insert('petugas', $tambahAdmin);
    }


    // Model Masyarakat
    function getMasyarakat()
    {
        return $this->db->get('masyarakat')->result_array();
    }

    function MasyarakatprosesTanggapan($id)
    {
        $this->db->select('*');
        $this->db->from('tanggapan');
        $this->db->join('petugas', 'petugas.id_petugas=tanggapan.id_petugas');
        $this->db->where('id_pengaduan', $id);
        return $this->db->get()->result_array();
    }

    function userData($username)
    {
        return $this->db->get_where('masyarakat', ['username' => $username]);
    }
    function petugasData($username)
    {
        return $this->db->get_where('petugas', ['username' => $username]);
    }



    function editKategori($id, $update)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $update);
    }

    function editSubkategori($id, $update)
    {
        $this->db->where('id_subkategori', $id);
        $this->db->update('subkategori', $update);
    }

    function hapusSubKategori($id)
    {
        $this->db->where('id_subkategori', $id);
        $this->db->delete('subkategori');
    }

    function editPetugas($id, $update)
    {
        $this->db->where('id_petugas', $id);
        $this->db->update('petugas', $update);
    }

    function hapusPetugas($id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->delete('petugas');
    }

    function editProfile($nik, $update)
    {

        $this->db->where('nik', $nik);
        $this->db->update('masyarakat', $update);
    }

    function updateSelesai($id_pengaduan, $update)
    {
        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->update('pengaduan', $update);
    }
}
