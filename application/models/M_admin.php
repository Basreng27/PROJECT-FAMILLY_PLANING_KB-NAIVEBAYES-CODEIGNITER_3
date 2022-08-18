<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    function get_all_akun()
    {
        $this->db->select('*');
        $this->db->from('akun');

        $query = $this->db->get();
        return $query;
    }

    function get_all_keterangan()
    {
        $this->db->select('*');
        $this->db->from('keterangan');

        $query = $this->db->get();
        return $query;
    }

    function get_all_aturan()
    {
        $this->db->select('*');
        $this->db->from('aturan');
        $this->db->join('kb', 'kb.kode_kb = aturan.kode_kb');
        $this->db->join('keterangan', 'keterangan.kode_keterangan = aturan.kode_keterangan');

        $query = $this->db->get();
        return $query;
    }

    // function get_all_aturan()
    // {
    //     $this->db->select('*');
    //     $this->db->from('kb');
    //     $this->db->join('aturan', 'aturan.kode_kb = kb.kode_kb');

    //     $query = $this->db->get();
    //     return $query;
    // }

    function get_keterangan($kd_kb)
    {
        $this->db->select('*');
        $this->db->from('aturan');
        $this->db->join('keterangan', 'keterangan.kode_keterangan = aturan.kode_keterangan');
        $this->db->where('kode_kb', $kd_kb);
        $query = $this->db->get();
        return $query;
    }

    // function get_all_gejala()
    // {
    //     $this->db->select('*');
    //     $this->db->from('gejala');

    //     $query = $this->db->get();
    //     return $query;
    // }

    function get_all_kb()
    {
        $this->db->select('*');
        $this->db->from('kb');

        $query = $this->db->get();
        return $query;
    }

    function get_profile($user)
    {
        $this->db->select('*');
        $this->db->from('akun');
        $this->db->where('username', $user);

        $query = $this->db->get();
        return $query;
    }

    function get()
    {
        $this->db->select('*');
        $this->db->from('aturan');
        $this->db->join('kb', 'kb.kode_kb = aturan.kode_kb');

        $query = $this->db->get();
        return $query;
    }

    // function get_all_v($data)
    // {
    //     $this->db->select('*');
    //     $this->db->from('aturan_pakar');
    //     $this->db->join('gejala', 'gejala.kode_gejala = aturan_pakar.kode_gejala');
    //     $this->db->where('kode_virus', $data);

    //     $query = $this->db->get();
    //     return $query;
    // }

    // function get_all_diagnosa()
    // {
    //     $this->db->select('*');
    //     $this->db->from('diagnosa');

    //     $query = $this->db->get();
    //     return $query;
    // }

    // function get_kd_virus($kd_v)
    // {
    //     $this->db->select('*');
    //     $this->db->from('kasus');
    //     $this->db->where('kode_virus', $kd_v);

    //     $query = $this->db->get();
    //     return $query;
    // }
    function get_P1($data_kd_kb, $data_kd_keterangan)
    {
        $this->db->select('*');
        $this->db->from('aturan');
        $this->db->where('kode_kb', $data_kd_kb);
        $this->db->where('kode_keterangan', $data_kd_keterangan);

        $query = $this->db->get();
        return $query;
    }

    function bobot_1($data_kd_kb)
    {
        $this->db->select('*');
        $this->db->from('aturan');
        $this->db->where('kode_kb', $data_kd_kb);
        $this->db->where('bobot', '1');

        $query = $this->db->get();
        return $query;
    }

    function get_tampung($kd_kb, $kd_ket)
    {
        $this->db->select('*');
        $this->db->from('aturan');
        $this->db->where('kode_kb', $kd_kb);
        $this->db->where('kode_keterangan', $kd_ket);

        $query = $this->db->get();
        return $query;
    }

    function update_tampung_ada_tidak($kd_kb, $kd_keterangan, $dt_1, $dt_0)
    {
        $this->db->set('tampung_ada', $dt_1);
        $this->db->set('tampung_tidak_ada', $dt_0);
        $this->db->where('kode_kb', $kd_kb);
        $this->db->where('kode_keterangan', $kd_keterangan);
        $this->db->update('aturan');
    }

    function get_every($data_kd_kb)
    {
        $this->db->select('*');
        $this->db->from('aturan');
        $this->db->where('kode_kb', $data_kd_kb);
        $this->db->where('bobot', '1');

        $query = $this->db->get();
        return $query;
    }

    function bobot_0($data_kd_kb)
    {
        $this->db->select('*');
        $this->db->from('aturan');
        $this->db->where('kode_kb', $data_kd_kb);
        $this->db->where('bobot', '0');

        $query = $this->db->get();
        return $query;
    }

    function count_kasus()
    {
        $this->db->select('*');
        $this->db->from('kasus');
        $query = $this->db->get();
        return $query;
    }

    function count_nm_kb($kd_kb)
    {
        $this->db->select('*');
        $this->db->from('kasus');
        $this->db->where('kode_kb', $kd_kb);

        $query = $this->db->get();
        return $query;
    }

    function count($kode_keterangan)
    {
        $this->db->select('*');
        $this->db->from('aturan');
        $this->db->where('kode_keterangan', $kode_keterangan);
        $this->db->where('bobot', '1');

        $query = $this->db->get();
        return $query;
    }

    function get_all_kasus()
    {
        $this->db->select('*');
        $this->db->from('kasus');

        $query = $this->db->get();
        return $query;
    }

    function cek_admin($username)
    {
        $this->db->select('*');
        $this->db->from('akun');
        $this->db->where('username', $username);

        $query = $this->db->get();
        return $query;
    }

    // function cek_gejala($kode_gejala)
    // {
    //     $this->db->select('*');
    //     $this->db->from('gejala');
    //     $this->db->where('kode_gejala', $kode_gejala);

    //     $query = $this->db->get();
    //     return $query;
    // }

    function cek_kb($kode_kb)
    {
        $this->db->select('*');
        $this->db->from('kb');
        $this->db->where('kode_kb', $kode_kb);

        $query = $this->db->get();
        return $query;
    }

    function cek_keterangan($kode_keterangan)
    {
        $this->db->select('*');
        $this->db->from('keterangan');
        $this->db->where('kode_keterangan', $kode_keterangan);

        $query = $this->db->get();
        return $query;
    }

    function insert_akun($data_akun)
    {
        $this->db->set('username', $data_akun['username']);
        $this->db->set('password', $data_akun['password']);
        $this->db->set('nama', $data_akun['nama']);
        $this->db->set('hak', $data_akun['hak']);
        $this->db->insert('akun');
    }

    function insert_keterangan($data_keterangan)
    {
        $this->db->set('kode_keterangan', $data_keterangan['kode_keterangan']);
        $this->db->set('keterangan', $data_keterangan['keterangan']);
        $this->db->insert('keterangan');
    }

    function insert_aturan($kode_kb, $kode_keterangan)
    {
        $this->db->set('kode_kb', $kode_kb);
        $this->db->set('kode_keterangan', $kode_keterangan);
        $this->db->insert('aturan');
    }

    // function insert_aturan_kosong($kode_virus)
    // {
    //     $this->db->set('kode_virus', $kode_virus);
    //     $this->db->insert('aturan_pakar');
    // }

    // function insert_gejala($data_gejala)
    // {
    //     $this->db->set('kode_gejala', $data_gejala['kode_gejala']);
    //     $this->db->set('nama_gejala', $data_gejala['nama_gejala']);
    //     $this->db->insert('gejala');
    // }

    function insert_kb($data_kb)
    {
        $this->db->set('kode_kb', $data_kb['kode_kb']);
        $this->db->set('nama_kb', $data_kb['nama_kb']);
        $this->db->set('solusi', $data_kb['solusi']);
        $this->db->insert('kb');
    }

    function get_data_akun($new_username)
    {
        $this->db->select('*');
        $this->db->from('akun');
        $this->db->where('username', $new_username);

        $query = $this->db->get();
        return $query;
    }

    // function get_isi_tampung($kd_gjl)
    // {
    //     $this->db->select('*');
    //     $this->db->from('aturan_pakar');
    //     $this->db->where('kode_gejala', $kd_gjl);

    //     $query = $this->db->get();
    //     return $query;
    // }

    function get_data_kb($new_kode_kb)
    {
        $this->db->select('*');
        $this->db->from('kb');
        $this->db->where('kode_kb', $new_kode_kb);

        $query = $this->db->get();
        return $query;
    }

    function get_kd_kb($new_kode_kb)
    {
        $this->db->select('*');
        $this->db->from('kasus');
        $this->db->where('kode_kb', $new_kode_kb);

        $query = $this->db->get();
        return $query;
    }

    function get_data_keterangan($new_kode_keterangan)
    {
        $this->db->select('*');
        $this->db->from('keterangan');
        $this->db->where('kode_keterangan', $new_kode_keterangan);

        $query = $this->db->get();
        return $query;
    }

    // function get_data_gejala($new_kode_gejala)
    // {
    //     $this->db->select('*');
    //     $this->db->from('gejala');
    //     $this->db->where('kode_gejala', $new_kode_gejala);

    //     $query = $this->db->get();
    //     return $query;
    // }

    function update_data_akun($username, $data_akun)
    {
        $this->db->set('nama', $data_akun['nama']);
        $this->db->set('password', $data_akun['password']);
        $this->db->set('hak', $data_akun['hak']);
        $this->db->where('username', $username);
        $this->db->update('akun');
    }

    function update_data_profile($username, $data_akun)
    {
        $this->db->set('nama', $data_akun['nama']);
        $this->db->set('password', $data_akun['password']);
        $this->db->where('username', $username);
        $this->db->update('akun');
    }

    function update_tampung($kode_kb, $kode_keterangan, $isi)
    {
        $this->db->set('tampung', $isi);
        $this->db->where('kode_kb', $kode_kb);
        $this->db->where('kode_keterangan', $kode_keterangan);
        $this->db->update('aturan');
    }

    function update_bobot($kode_kb, $kode_keterangan, $bobot)
    {
        $this->db->set('bobot', $bobot);
        $this->db->where('kode_kb', $kode_kb);
        $this->db->where('kode_keterangan', $kode_keterangan);
        $this->db->update('aturan');
    }

    // function update_data_gejala($kode_gejala, $data_gejala)
    // {
    //     $this->db->set('nama_gejala', $data_gejala['nama_gejala']);
    //     $this->db->where('kode_gejala', $kode_gejala);
    //     $this->db->update('gejala');
    // }

    function update_data_kb($kode_kb, $data_kb)
    {
        $this->db->set('nama_kb', $data_kb['nama_kb']);
        $this->db->set('solusi', $data_kb['solusi']);
        $this->db->where('kode_kb', $kode_kb);
        $this->db->update('kb');
    }

    function update_data_keterangan($kode_keterangan, $data_keterangan)
    {
        $this->db->set('keterangan', $data_keterangan['keterangan']);
        $this->db->where('kode_keterangan', $kode_keterangan);
        $this->db->update('keterangan');
    }

    function delete_data_akun($new_username)
    {
        $this->db->select('*');
        $this->db->where('username', $new_username);
        $this->db->delete('akun');
    }

    function delete_data_kb($new_kode_kb)
    {
        $this->db->select('*');
        $this->db->where('kode_kb', $new_kode_kb);
        $this->db->delete('kb');
    }

    function delete_data_keterangan($new_kode_keterangan)
    {
        $this->db->select('*');
        $this->db->where('kode_keterangan', $new_kode_keterangan);
        $this->db->delete('keterangan');
    }

    // function delete_data_gejala($new_kode_gejala)
    // {
    //     $this->db->select('*');
    //     $this->db->where('kode_gejala', $new_kode_gejala);
    //     $this->db->delete('gejala');
    // }
}
