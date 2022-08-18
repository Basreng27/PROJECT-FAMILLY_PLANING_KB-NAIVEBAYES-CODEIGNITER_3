<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper('url_helper');
        $this->load->helper('text');
        $this->load->helper('date');
        $this->load->library('pagination');
        $this->load->model('M_page');
        $this->load->model('M_admin');
    }

    public function dashboard_admin()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $data['data_kasus'] = $this->M_admin->get_all_kasus()->result();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/dashboard_admin', $data);
        $this->load->view('admin/footer_admin');
    }

    public function profile()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $user = $this->session->userdata('username');
        $data['username'] = $this->M_admin->get_profile($user)->result();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/footer_admin');
    }

    public function data_admin()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $data['akun'] = $this->M_admin->get_all_akun()->result();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/data_admin', $data);
        $this->load->view('admin/footer_admin');
    }

    public function tambah_admin()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $this->load->view('admin/header_admin');
        $this->load->view('admin/tambah_admin');
        $this->load->view('admin/footer_admin');
    }

    public function edit_admin()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $username = $this->uri->segment(2);
        $new_username = str_replace('%20', ' ', $username);

        $data['data_username'] = $this->M_admin->get_data_akun($new_username)->result();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/edit_admin', $data);
        $this->load->view('admin/footer_admin');
    }

    public function proses_edit_profile()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $password = $this->input->post('new_password');

        $data_akun = array(
            'username' => $username,
            'nama' => $nama,
            'password' => md5($password)
        );

        $this->M_admin->update_data_profile($username, $data_akun);

        redirect('profile');
    }

    public function proses_edit_admin()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $password = $this->input->post('new_password');
        $hak = $this->input->post('hak');

        $data_akun = array(
            'username' => $username,
            'nama' => $nama,
            'password' => md5($password),
            'hak' => $hak
        );

        $this->M_admin->update_data_akun($username, $data_akun);

        redirect('data_admin');
    }

    public function delete_admin()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $username = $this->uri->segment(2);
        $new_username = str_replace('%20', ' ', $username);

        $this->M_admin->delete_data_akun($new_username);

        redirect('data_admin');
    }

    public function data_kb()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $data['data_kb'] = $this->M_admin->get_all_kb()->result();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/data_kb', $data);
        $this->load->view('admin/footer_admin');
    }

    public function data_keterangan()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $data['data_keterangan'] = $this->M_admin->get_all_keterangan()->result();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/data_keterangan', $data);
        $this->load->view('admin/footer_admin');
    }


    public function tambah_kb()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $this->load->view('admin/header_admin');
        $this->load->view('admin/tambah_kb');
        $this->load->view('admin/footer_admin');
    }

    public function tambah_keterangan()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $this->load->view('admin/header_admin');
        $this->load->view('admin/tambah_keterangan');
        $this->load->view('admin/footer_admin');
    }

    public function proses_tambah_kb()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $kode_kb = $this->input->post('kode_kb');
        $nama_kb = $this->input->post('nama_kb');
        $solusi = $this->input->post('solusi');

        $data_kb = array(
            'kode_kb' => $kode_kb,
            'nama_kb' => $nama_kb,
            'solusi' => $solusi
        );

        $cek_kb = $this->M_admin->cek_kb($kode_kb)->num_rows();

        if ($cek_kb > 0) {
            $data['terdaftar'] = "ada";

            $this->load->view('admin/header_admin');
            $this->load->view('admin/tambah_kb', $data);
            $this->load->view('admin/footer_admin');
        } else {

            $this->M_admin->insert_kb($data_kb);

            $keterangan = $this->M_admin->get_all_keterangan()->result();

            foreach ($keterangan as $data) {
                $this->M_admin->insert_aturan($kode_kb, $data->kode_keterangan);
            }

            $adat['berhasil'] = "berhasil";
            $this->load->view('admin/header_admin');
            $this->load->view('admin/tambah_kb', $adat);
            $this->load->view('admin/footer_admin');
        }
    }

    public function proses_tambah_keterangan()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $kode_keterangan = $this->input->post('kode_keterangan');
        $keterangan = $this->input->post('keterangan');

        $data_keterangan = array(
            'kode_keterangan' => $kode_keterangan,
            'keterangan' => $keterangan
        );

        $cek_keterangan = $this->M_admin->cek_keterangan($kode_keterangan)->num_rows();

        if ($cek_keterangan > 0) {
            $data['terdaftar'] = "ada";

            $this->load->view('admin/header_admin');
            $this->load->view('admin/tambah_keterangan', $data);
            $this->load->view('admin/footer_admin');
        } else {

            $this->M_admin->insert_keterangan($data_keterangan);

            $kb = $this->M_admin->get_all_kb()->result();

            foreach ($kb as $data) {
                $this->M_admin->insert_aturan($data->kode_kb, $kode_keterangan);
            }

            $adat['berhasil'] = "berhasil";
            $this->load->view('admin/header_admin');
            $this->load->view('admin/tambah_keterangan', $adat);
            $this->load->view('admin/footer_admin');
        }
    }

    public function edit_kb()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $kode_kb = $this->uri->segment(2);
        $new_kode_kb = str_replace('%20', ' ', $kode_kb);

        $data['data_kb'] = $this->M_admin->get_data_kb($new_kode_kb)->result();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/edit_kb', $data);
        $this->load->view('admin/footer_admin');
    }

    public function edit_keterangan()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $kode_keterangan = $this->uri->segment(2);
        $new_kode_keterangan = str_replace('%20', ' ', $kode_keterangan);

        $data['data_keterangan'] = $this->M_admin->get_data_keterangan($new_kode_keterangan)->result();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/edit_keterangan', $data);
        $this->load->view('admin/footer_admin');
    }

    public function proses_edit_kb()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $kode_kb = $this->input->post('kode_kb');
        $nama_kb = $this->input->post('nama_kb');
        $solusi = $this->input->post('solusi');

        $data_kb = array(
            'kode_kb' => $kode_kb,
            'nama_kb' => $nama_kb,
            'solusi' => $solusi
        );

        $this->M_admin->update_data_kb($kode_kb, $data_kb);

        redirect('data_kb');
    }

    public function proses_edit_keterangan()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $kode_keterangan = $this->input->post('kode_keterangan');
        $keterangan = $this->input->post('keterangan');

        $data_keterangan = array(
            'kode_keterangan' => $kode_keterangan,
            'keterangan' => $keterangan
        );

        $this->M_admin->update_data_keterangan($kode_keterangan, $data_keterangan);

        redirect('data_keterangan');
    }

    public function delete_kb()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $kode_kb = $this->uri->segment(2);
        $new_kode_kb = str_replace('%20', ' ', $kode_kb);

        $this->M_admin->delete_data_kb($new_kode_kb);

        redirect('data_kb');
    }

    public function delete_keterangan()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $kode_keterangan = $this->uri->segment(2);
        $new_kode_keterangan = str_replace('%20', ' ', $kode_keterangan);

        $this->M_admin->delete_data_keterangan($new_kode_keterangan);

        redirect('data_keterangan');
    }

    public function data_kasus()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $data['data_kasus'] = $this->M_admin->get_all_kasus()->result();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/data_kasus', $data);
        $this->load->view('admin/footer_admin');
    }

    public function aturan()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $data['get_kb'] = $this->M_admin->get_all_kb()->result();

        $this->load->view('admin/header_admin');
        $this->load->view('admin/aturan', $data);
        $this->load->view('admin/footer_admin');
    }

    public function proses_tambah_admin()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $hak = $this->input->post('hak');

        $data_akun = array(
            'nama' => $nama,
            'username' => $username,
            'password' => md5($password),
            'hak' => $hak
        );

        $cek_akun = $this->M_admin->cek_admin($username)->num_rows();

        if ($cek_akun > 0) {
            $data['terdaftar'] = "ada";

            // echo "<pre>" . print_r($total, true);
            // exit(1);

            $this->load->view('admin/header_admin');
            $this->load->view('admin/tambah_admin', $data);
            $this->load->view('admin/footer_admin');
        } else {
            $this->M_admin->insert_akun($data_akun);

            $data['berhasil'] = "berhasil";
            $this->load->view('admin/header_admin');
            $this->load->view('admin/tambah_admin', $data);
            $this->load->view('admin/footer_admin');
        }
    }

    public function simpan_bobot()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect('login');
        }

        // $kode_kb = $this->input->post('kode_kb');
        // $kode_keterangan = $this->input->post('kode_keterangan');
        // $bobot = $this->input->post('bobot');

        // $data_bobot = array(
        //     'kode_kb' => $kode_kb,
        //     'kode_keterangan' => $kode_keterangan,
        //     'bobot' => $bobot
        // );

        // echo "<pre>" . print_r($data_bobot, true);
        // exit(1);
        $kd_kb = $this->uri->segment(2);
        $kd_ket = $this->uri->segment(3);
        $bobot = $this->uri->segment(4);
        $kode_kb = str_replace('%20', ' ', $kd_kb);
        $kode_keterangan = str_replace('%20', ' ', $kd_ket);

        $this->M_admin->update_bobot($kode_kb, $kode_keterangan, $bobot);

        redirect('aturan');
    }
}
