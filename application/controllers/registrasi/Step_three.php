<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Step_three extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in_pasien')) redirect(site_url('registrasi_online'));
        $this->load->library('template_front');
        $this->load->model('step_three_model');
    }

    public function index() {
        if(!$this->session->userdata('logged_in_pasien')) {
            redirect(site_url('registrasi_online'));
        } else {
            redirect(site_url('registrasi/step_two'));
        }
    }

    public function id($pasien_id = '') {
        if(!$this->session->userdata('logged_in_pasien')) {
            redirect(site_url('registrasi_online'));
        } else {
            $pasien_id              = $this->uri->segment(4);
            $data['error']          = 'false';
            $data['status']         = 'awal';
            $data['detail']         = $this->step_three_model->select_detail_pasien($pasien_id)->row();
            $data['listPelanggan']  = $this->step_three_model->select_pelanggan()->result();
            $data['listPoliklinik'] = $this->step_three_model->select_poliklinik()->result();
            $this->template_front->display('registrasi_online_view', $data);
        }
    }

    public function search($tipe_id = '', $tgl = '') {
        $tipe_id    = $this->input->post('lstPoliklinik');
        $tgl        = $this->input->post('tgl_periksa');
        
        if (!empty($tgl)) {
            $xtgl   = explode("-",$tgl);
            $thn    = $xtgl[2];
            $bln    = $xtgl[1];
            $tgl    = $xtgl[0];
            $TGL    = $thn.'-'.$bln.'-'.$tgl;
        } else {
            $TGL    = '';
        }

        if ($tipe_id == 'all') { // Jika Semua Poliklinik
            $data = array(
                        'Poliklinik'    => 'Semua Poliklinik', // Untuk Info Header
                        'Tanggal'       => $TGL
                    );

            $data['error']          = 'false';
            $data['info']           = $data;
            $data['status']         = 'cari';
            $pasien_id              = $this->uri->segment(4);
            $data['detail']         = $this->step_three_model->select_detail_pasien($pasien_id)->row();
            $data['listPelanggan']  = $this->step_three_model->select_pelanggan()->result();
            $data['listPoliklinik'] = $this->step_three_model->select_poliklinik()->result();
            // Untuk Perulangan di Jadwal Praktek
            $data['listTipe']       = $this->step_three_model->select_poliklinik()->result(); 
            $this->template_front->display('registrasi_online_view', $data);
        } else {
            // Nama Poliklinik / Spesialis
            $detailType             = $this->step_three_model->select_detail_poliklinik($tipe_id)->row();
            $NamaPoliklinik         = trim($detailType->tipe_name);

            $data = array(
                        'Poliklinik'    => $NamaPoliklinik,
                        'Tanggal'       => $TGL
                    );

            $data['error']          = 'false';
            $data['info']           = $data;
            $data['status']         = 'cari';
            $pasien_id              = $this->uri->segment(4);
            $data['detail']         = $this->step_three_model->select_detail_pasien($pasien_id)->row();
            $data['listPelanggan']  = $this->step_three_model->select_pelanggan()->result();
            $data['listPoliklinik'] = $this->step_three_model->select_poliklinik()->result();
            // Untuk Perulangan di Jadwal Praktek
            $data['listTipe']       = $this->step_three_model->select_detail_poliklinik($tipe_id)->result(); 
            $this->template_front->display('registrasi_online_view', $data);
        }
    }

    public function saveantrian() {
        $dokter_id          = $this->input->post('dokter_id');
        $tanggal            = $this->input->post('tanggal');
        $jadwal_id          = $this->input->post('jadwal_id');
        $jam_layanan        = $this->input->post('jam_layanan');
        // Cek Data Antrian by Dokter dan Tanggal tersebut
        $kode               = '';
        $CheckDatabyDocter  = $this->step_three_model->select_antrian($dokter_id, $tanggal, $jadwal_id)->result();
        if (count($CheckDatabyDocter) > 0) { // Jika Ada Data Antrian Pasien
            $kodeurut   = count($CheckDatabyDocter)+1;
            $kode       = $dokter_id.$jadwal_id.$kodeurut;
        } else {
            $kodeurut   = 1;
            $kode       = $dokter_id.$jadwal_id.$kodeurut;
        }
        // Cari Jam Terakhir
        $CheckJam           = $this->step_three_model->select_jam_antrian($dokter_id, $tanggal, $jadwal_id)->row();
        if (count($CheckJam) > 0) { // Jika Ada Data Antrian Pasien
            $jamterakhir    = $CheckJam->antrian_jam_layani;
            $jamproses      = strtotime("+15 minutes", strtotime($jamterakhir));
            $jamantrian     = date('H:i:s', $jamproses);
        } else {
            $jamterakhir    = $jam_layanan;
            $jamproses      = strtotime("+15 minutes", strtotime($jamterakhir));
            $jamantrian     = date('H:i:s', $jamproses);
        }

        //echo $jamantrian;
        //echo $dokter_id.'-'.$jadwal_id.'-'.$kodeurut.' Jam : '.date('H:i:s', $jamantrian).' Tgl.'.$tanggal;

        $data = array(
            'user_username'         => $this->session->userdata('username'),
            'pasien_id'             => $this->input->post('pasien_id'),
            'dokter_id'             => $this->input->post('dokter_id'),
            'jadwal_id'             => $this->input->post('jadwal_id'),
            'antrian_kode'          => $kode,
            'antrian_tanggal'       => $this->input->post('tanggal'),
            'antrian_jam_layani'    => $jamantrian,
            'antrian_date_update'   => date('Y-m-d'),
            'antrian_time_update'   => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('hospital_antrian', $data);
        // ID Antrian yang baru dibuat
        $antrian_id = $this->db->insert_id();
        $this->session->set_flashdata('notificationsuccess','<b>Pendaftaran Berhasil.</b>');
        redirect(site_url('registrasi/step_four/id/'.$antrian_id.'/'.$this->uri->segment(5)));
    }
}
/* Location: ./application/controller/registrasi/Step_three.php */