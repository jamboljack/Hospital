<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Step_two extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in_pasien')) redirect(site_url('registrasi_online'));
        $this->load->library('template_front');
        $this->load->model('registrasi_online_model');
    }

    public function index() {
        if(!$this->session->userdata('logged_in_pasien')) {
            redirect(site_url('registrasi_online'));
        } else {
            $data['error']          = 'false';
            $data['listIdentitas']  = $this->registrasi_online_model->select_identitas()->result();
            $data['listAgama']      = $this->registrasi_online_model->select_agama()->result();
            $data['listDarah']      = $this->registrasi_online_model->select_darah()->result();
            $data['listDidik']      = $this->registrasi_online_model->select_pendidikan()->result();
            $data['listStatus']     = $this->registrasi_online_model->select_status()->result();
            $data['listKerja']      = $this->registrasi_online_model->select_pekerjaan()->result();
            $data['listPelanggan']  = $this->registrasi_online_model->select_pelanggan()->result();
            // Provinsi
            $data['listProvinsi']   = $this->registrasi_online_model->select_provinsi()->result();
            // List Anggota Keluarga per User Login
            $data['listAnggota']    = $this->registrasi_online_model->select_anggota_keluarga()->result();
            $this->template_front->display('registrasi_online_view', $data);
        }
    }

    // dijalankan saat Provinsi di klik
    public function pilih_kabupaten() {
        $data['listKabupaten']     = $this->registrasi_online_model->select_kabupaten($this->uri->segment(4));
        $this->load->view('v_drop_down_kabupaten', $data);
    }

    // dijalankan saat Kabupaten di klik
    public function pilih_kecamatan() {
        $data['listKecamatan']     = $this->registrasi_online_model->select_kecamatan($this->uri->segment(4));
        $this->load->view('v_drop_down_kecamatan', $data);
    }

    public function ubahpassword() {
        $data['error']      = 'false';
        $data['detail']     = $this->registrasi_online_model->select_profil()->row();
        $this->template_front->display('registrasi_online_view', $data);
    }

    public function ubahprofil() {
        $data['error']      = 'false';
        $data['detail']     = $this->registrasi_online_model->select_profil()->row();
        $this->template_front->display('registrasi_online_view', $data);
    }

    public function savedatakeluarga() {
        $this->registrasi_online_model->insert_data_anggota();
        $this->session->set_flashdata('notificationsuccess','<b>Simpan Data Anggota Keluarga Berhasil.</b>');
        redirect(site_url('registrasi/step_two'));
    }

    public function tambah_anggota() {
        $data['error']          = 'false';
        $data['listIdentitas']  = $this->registrasi_online_model->select_identitas()->result();
        $data['listAgama']      = $this->registrasi_online_model->select_agama()->result();
        $data['listDarah']      = $this->registrasi_online_model->select_darah()->result();
        $data['listDidik']      = $this->registrasi_online_model->select_pendidikan()->result();
        $data['listStatus']     = $this->registrasi_online_model->select_status()->result();
        $data['listKerja']      = $this->registrasi_online_model->select_pekerjaan()->result();
        $data['listPelanggan']  = $this->registrasi_online_model->select_pelanggan()->result();
        // Provinsi
        $data['listProvinsi']   = $this->registrasi_online_model->select_provinsi()->result();
        // Detail Data Anggota Keluarga yang Diri Sendiri
        $data['listAnggota']    = $this->registrasi_online_model->select_anggota_keluarga()->result();
        $data['detail']         = $this->registrasi_online_model->select_detail_keluarga()->row();
        $this->template_front->display('registrasi_online_view', $data);
    }

    public function updatepassword() {
        $this->form_validation->set_rules('passwordbaru', 'Password Baru', 'trim|required');
        $this->form_validation->set_rules('passwordkonfirm', 'Konfirmasi Password', 'required|matches[passwordbaru]');

        if ($this->form_validation->run() == FALSE) {
            $data['error']      = 'true';
            $data['detail']     = $this->registrasi_online_model->select_profil()->row();
            $this->template_front->display('registrasi_online_view', $data);
        } else {
            $password = $this->input->post('password');
            $passlama = sha1(trim($this->input->post('passwordlama')));

            if ($passlama <> $password) {
                $this->session->set_flashdata('notificationerror','<b>Password Lama Anda Salah.</b>');
                redirect(site_url('registrasi/step_two/ubahpassword'));
            } else {
                $this->registrasi_online_model->update_password();
                $this->session->set_flashdata('notificationsuccess','<b>Update Password Anda Berhasil.</b>');
                redirect(site_url('registrasi/step_two/ubahpassword'));
            }
        }
    }

     public function updateprofil() {
        $this->form_validation->set_rules('phone', 'No. Handphone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $data['error']      = 'true';
            $data['detail']     = $this->registrasi_online_model->select_profil()->row();
            $this->template_front->display('registrasi_online_view', $data);
        } else {
            $this->registrasi_online_model->update_profil();
            $this->session->set_flashdata('notificationsuccess','<b>Update Data Profil Berhasil.</b>');
            redirect(site_url('registrasi/step_two/ubahprofil'));
        }
    }
}
/* Location: ./application/controller/registrasi/Step_two.php */