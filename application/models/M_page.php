<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_page extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    function cek_akun($data_akun)
    {
        $this->db->select('*');
        $this->db->from('akun');
        $this->db->where('username', $data_akun['username']);
        $this->db->where('password', $data_akun['password']);

        $query = $this->db->get();
        return $query;
    }

    function insert_kasus($data_kasus, $kode)
    {
        $this->db->set('nama', $data_kasus['nama']);
        $this->db->set('jenis_kelamin', $data_kasus['jenis_kelamin']);
        $this->db->set('umur', $data_kasus['umur']);
        $this->db->set('alamat', $data_kasus['alamat']);
        $this->db->set('no_telepon', $data_kasus['no_telepon']);
        $this->db->set('tanggal', $data_kasus['tanggal']);
        $this->db->set('kode_kb', $kode);
        $this->db->insert('kasus');
    }

    // function insert_virus($result, $id)
    // {
    //     $this->db->set('virus', $result);
    //     $this->db->where('id_kasus', $id);
    //     // $this->db->set('virus', $geja);
    //     $this->db->update('kasus');
    // }

    // function get_id()
    // {
    //     $this->db->select('*');
    //     $this->db->from('kasus');
    //     $this->db->order_by('id_kasus', 'desc');

    //     $query = $this->db->get();
    //     return $query;
    // }

    function get_terbesar()
    {
        $this->db->select('*');
        $this->db->from('aturan');
        $this->db->order_by('tampung', 'desc');

        $query = $this->db->get();
        return $query;
    }

    function terbesar()
    {
        $this->db->select('*');
        $this->db->from('kasus');
        $this->db->order_by('id_kasus', 'desc');

        $query = $this->db->get();
        return $query;
    }

    // function get_all_aturan()
    // {
    //     $this->db->select('*');
    //     $this->db->from('aturan_pakar');
    //     $this->db->join('virus', 'virus.kode_virus = aturan_pakar.kode_gejala');
    //     $this->db->join('gejala', 'gejala.kode_gejala = aturan_pakar.kode_gejala');

    //     $query = $this->db->get();
    //     return $query;
    // }

    // function hsl($kd)
    // {
    //     $this->db->select('*');
    //     $this->db->from('aturan');
    //     $this->db->join('kb', 'kb.kode_kb = aturan.kode_kb');
    //     $this->db->join('keterangan', 'keterangan.kode_keterangan = aturan.kode_keterangan');
    //     $this->db->join('kasus', 'kasus.kode_kb = kb.kode_kb');
    //     $this->db->where('kb.kode_kb', $kd);

    //     $query = $this->db->get();
    //     return $query;
    // }

    function hsl($kd)
    {
        $this->db->select('*');
        $this->db->from('kasus');
        $this->db->join('kb', 'kb.kode_kb = kasus.kode_kb');
        $this->db->where('id_kasus', $kd);

        $query = $this->db->get();
        return $query;
    }
}
