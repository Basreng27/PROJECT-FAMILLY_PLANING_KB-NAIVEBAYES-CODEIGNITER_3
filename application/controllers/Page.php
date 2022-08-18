<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
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

    public function home()
    {
        // if ($this->session->userdata('status') == "login") {
        //     if ($this->session->userdata('hak') == "admin") {
        //         redirect('dashboard_admin');
        //     }
        // }

        if ($this->session->userdata('status') != "login_user") {
            redirect('login');
        }

        $this->load->view('page/header');
        $this->load->view('page/dashboard');
        $this->load->view('page/footer');
    }

    public function login()
    {
        // if ($this->session->userdata('status') == "login") {
        //     if ($this->session->userdata('hak') == "admin") {
        //         redirect('dashboard_admin');
        //     }
        // }

        if ($this->session->userdata('status') == "login_admin") {
            if ($this->session->userdata('hak') == "admin") {
                redirect('dashboard_admin');
            }
        } elseif ($this->session->userdata('status') == "login_user") {
            if ($this->session->userdata('hak') == "user") {
                redirect('dashboard');
            }
        }

        // $this->load->view('page/header');
        $this->load->view('page/login');
        // $this->load->view('page/footer');
    }

    function proses_login()
    {
        // if ($this->session->userdata('status') == "login") {
        //     if ($this->session->userdata('hak') == "admin") {
        //         redirect('dashboard_admin');
        //     }
        // }

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data_akun = array(
            'username' => $username,
            'password' => md5($password)
        );

        $cek = $this->M_page->cek_akun($data_akun)->num_rows();

        if ($cek > 0) {
            $akun = $this->M_page->cek_akun($data_akun)->row_array();

            if ($akun['hak'] == 'admin') {
                $data_session = array(
                    'username' => $username,
                    'nama' => $akun['nama'],
                    'hak' => $akun['hak'],
                    'status' => "login_admin"
                );

                $this->session->set_userdata($data_session);
                redirect(base_url('dashboard_admin'));
            } elseif ($akun['hak'] == 'user') {
                $data_session = array(
                    'username' => $username,
                    'nama' => $akun['nama'],
                    'hak' => $akun['hak'],
                    'status' => "login_user"
                );

                $this->session->set_userdata($data_session);
                redirect(base_url('dashboard'));
            } else {
                redirect('login');
            }
        } else {
            $data['tidak_terdaftar'] = "Tidak Terdaftar";

            $this->load->view('page/header');
            $this->load->view('page/login', $data);
            $this->load->view('page/footer');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function sistem_pakar()
    {
        if ($this->session->userdata('status') != "login_user") {
            redirect('login');
        }

        $data['get_keterangan'] = $this->M_admin->get_all_keterangan()->result();

        $this->load->view('page/header');
        $this->load->view('page/sistem_pakar', $data);
        $this->load->view('page/footer');
    }


    function trimArray($array)
    {
        $tampung = [];
        foreach ($array as $key => $list) {
            $tampung[$key] = trim($list);
        }

        return $tampung;
    }

    public function proses_rekomendasi()
    {
        if ($this->session->userdata('status') != "login_user") {
            redirect('login');
        }

        $nama = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $umur = $this->input->post('umur');
        $alamat = $this->input->post('alamat');
        $no_telepon = $this->input->post('no_telpon');
        $tanggal = $this->input->post('tanggal');
        $kode_keterangan = implode(', ', (array)$_POST['kode_keterangan']);

        $data_kasus = array(
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'umur' => $umur,
            'alamat' => $alamat,
            'no_telepon' => $no_telepon,
            'tanggal' => $tanggal
        );

        $get_all_kb = $this->M_admin->get()->result_array();
        $hasil = $get_all_kb;

        foreach ($get_all_kb as $key => $list) {
            //ambil data gejala
            $ket = $this->trimArray(explode(',', $kode_keterangan)); // $ket = str_replace('%20', ' ', strtolower(trim($gejala)));

            //menampung sementara nilai bobot 1
            $bobot_sementara = 0;
            $bt_1 = 0;
            $bt_0 = 0;

            //menampung sementara nilai bobot 0
            // $bobot_sementara_kosong = 0;
            //==================================================
            $data_kd_kb = $list['kode_kb']; //ambil kode virus
            $data_kd_keterangan = $list['kode_keterangan']; //ambil data kode gejala
            $obot = $list['bobot']; //ambil bobot 

            //cek_gejala dan bobot yang isinya 1
            if (in_array($data_kd_keterangan, $ket)) {
                if ($obot == 1) {
                    $hasil[$key]['dt'] = "Ada Gejala";
                    $hasil[$key]['tb'] = "ada bobot";

                    //hitung total kasus virus pada tabel kasus
                    $count_kb_kasus = $this->M_admin->count_nm_kb($data_kd_kb)->num_rows();
                    $hasil[$key]['total KB di kasus'] = $count_kb_kasus;

                    //hitung total gejala di aturan pakar yang bobotnya 1
                    $count_class = $this->M_admin->count($data_kd_keterangan)->num_rows();
                    $hasil[$key]['total keterangan aturan pakar yang bobot = 1'] = $count_class;

                    //mengambil isi array di ubah menjadi biasa
                    foreach ($ket as $yek => $lue) {
                        foreach ((array)$lue as $ke => $isi) {
                            $kd_k = $isi;
                            //cari kode_gejala yang bobotnya 1 pada setiap kode_virus
                            $cari_bobot_1 = $this->M_admin->get_P1($data_kd_kb, $kd_k)->row();
                            //lalu di cek                           
                            if ($cari_bobot_1->bobot > 0) {
                                $sementara = 1;
                            } else {
                                $sementara = 0;
                            }
                            //penampungan nilai
                            $bobot_sementara = $bobot_sementara + $sementara;
                        }
                    }

                    //menghitung total bobot 1 berdasarkan kode_virus 
                    $bobot_1 = $this->M_admin->bobot_1($data_kd_kb)->num_rows();

                    //P ada Hasil dari pencarian data bobot 1
                    $hasil[$key]['P ada'] = $bobot_sementara / $bobot_1;
                    $bt_1 = $hasil[$key]['P ada'] = $bobot_sementara / $bobot_1;

                    //menghitung total bobot 1 berdasarkan kode_virus 
                    $bobot_0 = $this->M_admin->bobot_0($data_kd_kb)->num_rows();

                    //P tidak ada Hasil dari pencarian data bobot 0
                    $hasil[$key]['P tidak ada'] = $bobot_sementara / $bobot_0;
                    $bt_0 = $hasil[$key]['P tidak ada'] = $bobot_sementara / $bobot_0;

                    //cari kode_gejala yang bobotnya 1 pada setiap kode_virus
                    $cek_1_bobot = $this->M_admin->get_every($data_kd_kb)->num_rows();
                    $hasil[$key]['total 1 pada setiap kode KB'] = $cek_1_bobot;
                } else {
                    $hasil[$key]['tb'] = "tidak ada bobot";
                    $hasil[$key]['P(X|Ci)*P(Ci)'] = 0;
                }
            } else {
                $hasil[$key]['dt'] = "tidak ada gejala";
                $hasil[$key]['P(X|Ci)*P(Ci)'] = 0;
                $bt_1 = $hasil[$key]['P(X|Ci)*P(Ci)'];
                $hasil[$key]['P ada'] = 0;
                $bt_0 = $hasil[$key]['P ada'];
                $hasil[$key]['P tidak ada'] = 0;
            }
            //update kolom tampung_ada dan tampung_tidak_ada
            $this->M_admin->update_tampung_ada_tidak($data_kd_kb, $data_kd_keterangan, $bt_1, $bt_0);

            //mengambil data tampung
            $tambah_ada = $this->M_admin->get_tampung($data_kd_kb, $data_kd_keterangan)->result();
            //variabel sementara
            $sementara_ada = 1;
            $tamp_ada = 0;

            //tampung_ada
            foreach ($tambah_ada as $ada) {
                if ($ada->tampung_ada > 0) {
                    $tamp_ada = $ada->tampung_ada;
                } else {
                    $tamp_ada = 0;
                }
                $sementara_ada = $sementara_ada + $tamp_ada; //harusnya dikali
            }

            //variabel sementara
            $sementara_tidak = 1;
            $tamp_tidak = 0;

            //tampung_tidak_ada
            foreach ($tambah_ada as $ada) {
                if ($ada->tampung_tidak_ada > 0) {
                    $tamp_tidak = $ada->tampung_tidak_ada;
                } else {
                    $tamp_tidak = 0;
                }
                $sementara_tidak = $sementara_tidak + $tamp_tidak; //harusnya dikali
            }

            //hitung P(X|Ci) bobot ada
            $hasil[$key]['Hasil Hitung P(X|Ci) bobot ada'] = $sementara_ada;

            //hitung P(X|Ci) bobot tidak ada
            $hasil[$key]['Hasil Hitung P(X|Ci) bobot tidak ada'] = $sementara_tidak;

            //hitung P(X|Ci) bobot ada dan P(X|Ci) bobot tidak ada
            $hasil[$key]['P(X|Ci)*P(Ci)'] =  $hasil[$key]['Hasil Hitung P(X|Ci) bobot ada'] * $hasil[$key]['Hasil Hitung P(X|Ci) bobot tidak ada'];

            $this->M_admin->update_tampung($data_kd_kb, $data_kd_keterangan, $hasil[$key]['P(X|Ci)*P(Ci)']);
        }


        $kode = $this->M_page->get_terbesar()->row();
        $kd = $kode->kode_kb;

        // echo "<pre>" . print_r($hasil, true);
        // exit(1);
        $this->M_page->insert_kasus($data_kasus, $kd);

        $id_ks = $this->M_page->terbesar()->row();
        $id_kasus = $id_ks->id_kasus;
        $idat['hsl'] = $this->M_page->hsl($id_kasus)->result();

        $this->load->view('page/header');
        $this->load->view('page/hasil', $idat);
        $this->load->view('page/footer');
    }

    // public function proses_rekomendasi()
    // {
    //     if ($this->session->userdata('status') == "login") {
    //         if ($this->session->userdata('hak') == "admin") {
    //             redirect('dashboard_admin');
    //         }
    //     }

    //     $nama = $this->input->post('nama');
    //     $jenis_kelamin = $this->input->post('jenis_kelamin');
    //     $umur = $this->input->post('umur');
    //     $alamat = $this->input->post('alamat');
    //     $no_telepon = $this->input->post('no_telpon');
    //     $tanggal = $this->input->post('tanggal');
    //     $kode_keterangan = implode(', ', (array)$_POST['kode_keterangan']);

    //     $data_kasus = array(
    //         'nama' => $nama,
    //         'jenis_kelamin' => $jenis_kelamin,
    //         'umur' => $umur,
    //         'alamat' => $alamat,
    //         'no_telepon' => $no_telepon,
    //         'tanggal' => $tanggal
    //     );

    //     $get_all_kb = $this->M_admin->get()->result_array();
    //     $hasil = $get_all_kb;

    //     foreach ($get_all_kb as $key => $list) {
    //         //ambil data gejala
    //         $ket = $this->trimArray(explode(',', $kode_keterangan)); // $gjala = str_replace('%20', ' ', strtolower(trim($gejala)));

    //         // //==================================================
    //         $data_nm_kb = $list['nama_kb']; //ambil nama kb
    //         $data_kd_kb = $list['kode_kb']; //ambil kode kb
    //         $data_kd_keterangan = $list['kode_keterangan']; //ambil data kode keterangan
    //         $obot = $list['bobot']; //ambil bobot 

    //         //cek_gejala dan bobot yang isinya 1
    //         if (in_array($data_kd_keterangan, $ket) && $obot == 1) {
    //             $hasil[$key]['dt'] = "Ada Gejala";

    //             //hitung total keterangan di aturan yang bobotnya 1
    //             $count_class = $this->M_admin->count($data_kd_keterangan)->num_rows();
    //             $hasil[$key]['total keterangan'] = $count_class;

    //             //hitung total kasus kb pada tabel kasus
    //             $count_kb_kasus = $this->M_admin->count_nm_kb($data_kd_kb)->num_rows();
    //             $hasil[$key]['total kb'] = $count_kb_kasus;
    //             // $rata = ($totalnilai != 0) ? ($totalnilai / $jumlah) * 100 : 0;
    //             //perhitungan P(Xk|Ci) berdasarkan kode_virus total gejala / total virus
    //             $hasil[$key]['Hitung P(Xk|Ci)'] = ($count_kb_kasus != 0) ? $hasil[$key]['total keterangan'] / $hasil[$key]['total kb'] * 1 : 0;
    //             // $hasil[$key]['Hitung P(Xk|Ci)'] = ($count_virus_kasus != 0) ? $hasil[$key]['total gejala'] / $hasil[$key]['total virus'] * 1 : 0;
    //             //hitung total kasus keseluruhan
    //             $total_kasus = $this->M_admin->count_kasus()->num_rows();
    //             //hasil akhir pembagiannya
    //             $hasil[$key]['P(X|Ci)*P(Ci)'] = $hasil[$key]['Hitung P(Xk|Ci)'] * ($count_kb_kasus / $total_kasus);
    //             //===========================================================
    //             //     // $this->M_admin->update_tampung($data_kd_gejala, $hasil[$key]['Hitung P(Xk|Ci)']);

    //             //     // $se = $this->M_admin->get_isi_tampung($data_kd_gejala)->result();
    //             //     // $hasil[$key]['Hitung P(Xk|Ci) untuk setiap kelas'] = $list['tampung'] * $list['tampung'];

    //         } else {
    //             $hasil[$key]['dt'] = "tidak ada gejala";
    //             $hasil[$key]['P(X|Ci)*P(Ci)'] = 0;
    //         }

    //         // $this->M_admin->update_tampung($data_kd_kb, $data_kd_keterangan, $hasil[$key]['P(X|Ci)*P(Ci)']);
    //     }

    //     $kode = $this->M_page->get_terbesar()->row();
    //     $kd = $kode->kode_kb;

    //     echo "<pre>" . print_r($hasil, true);
    //     exit(1);
    //     $this->M_page->insert_kasus($data_kasus, $kd);

    //     $id_ks = $this->M_page->terbesar()->row();
    //     $id_kasus = $id_ks->id_kasus;
    //     $idat['hsl'] = $this->M_page->hsl($id_kasus)->result();

    //     $this->load->view('page/header');
    //     $this->load->view('page/hasil', $idat);
    //     $this->load->view('page/footer');
    // }
}
