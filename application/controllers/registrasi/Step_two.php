<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Step_two extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in_pasien')) redirect(site_url('registrasi_online'));
        $this->load->library('template_front');
        $this->load->model('registrasi_online_model');
    }
    
    public function create_image() {
        $md5_hash = md5(rand(0,999));
        $security_code = substr($md5_hash, 15, 5);
        $array_item = array('security_code' => $security_code);
        $this->session->set_userdata($array_item);

        $width = 100;
        $height = 30;
        $image = ImageCreate($width, $height);
        $white = ImageColorAllocate($image, 255, 255, 255);
        $black = ImageColorAllocate($image, 0, 0, 0);
        $grey = ImageColorAllocate($image, 204, 204, 204);
        ImageFill($image, 0, 0, $black);
        ImageString($image, 40, 30, 6, $security_code, $white);
        ImageRectangle($image,0,0,$width-1,$height-1,$grey);
        imageline($image, 300, $height/2, $width, $height/2, $grey);
        imageline($image, $width/2, 300, $width/2, $height, $grey);
        header("Content-Type: image/jpeg");
        ImageJpeg($image);
        ImageDestroy($image);
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
        $data['error'] = 'false';
        $this->template_front->display('registrasi_online_view', $data);
    }

    public function ubahprofil() {
        $data['error'] = 'false';
        $this->template_front->display('registrasi_online_view', $data);
    }

    public function savedatakeluarga() {
        $this->registrasi_online_model->insert_data_anggota();
        $this->session->set_flashdata('notificationsuccess','Simpan Data Anggota Keluarga Berhasil.');
        redirect(site_url('registrasi/step_two'));
    }
}
/* Location: ./application/controller/registrasi_online/Step_two.php */