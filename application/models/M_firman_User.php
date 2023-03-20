<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_firman_User extends CI_Model
{


    // Model Pengaduan Masyarakat
    function insertPengaduan($tambahPengaduan)
    {
        $this->db->insert('pengaduan', $tambahPengaduan);
    }

    // Model Join Pengaduan Masyarakat
    function join_pengaduan()
    {
        $this->db->select('*');
        $this->db->from('masyarakat');
        $this->db->join('pengaduan', 'pengaduan.nik=masyarakat.nik');
        return $this->db->get()->row_array();
    }
    function join_laporan()
    {
        $this->db->select('*');
        $this->db->from('masyarakat');
        $this->db->join('pengaduan', 'pengaduan.nik=masyarakat.nik');
        $this->db->join('subkategori', 'subkategori.id_subkategori=pengaduan.id_subkategori');
        $this->db->join('kategori', 'kategori.id_kategori=subkategori.id_kategori');
        return $this->db->get()->result_array();
    }

    // Model Riwayat Masyarakat
    function getRiwayat($nik)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        $this->db->join('subkategori', 'subkategori.id_subkategori=pengaduan.id_subkategori');
        $this->db->join('kategori', 'kategori.id_kategori=subkategori.id_kategori');
        $this->db->where('pengaduan.nik', $nik);
        return $this->db->get()->result_array();
    }


    function banMasyarakat($id, $update)
    {
        $this->db->where('id', $id);
        $this->db->update('masyarakat', $update);
    }

    function aktifMasyarakat($id, $update)
    {
        $this->db->where('id', $id);
        $this->db->update('masyarakat', $update);
    }
}
