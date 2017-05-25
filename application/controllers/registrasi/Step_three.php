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

    public function saveorder() {
        $data = array(
            'user_username'     => trim($this->input->post('username')),
            'user_password'     => sha1(trim($this->input->post('password'))),
            'user_name'         => strtoupper(trim($this->input->post('nama'))),
            'user_email'        => trim($this->input->post('email')),
            'user_phone'        => trim($this->input->post('phone')),
            'user_level'        => 'Pasien',
            'user_status'       => 'Active',
            'user_date_update'  => date('Y-m-d'),
            'user_time_update'  => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('hospital_antrian', $data);
        // ID Antrian yang baru dibuat
        $antrian_id = $this->db->insert_id();
        /*$sender_email = 'bpmppt.kudus01@gmail.com';
        $sender_name = 'DPM PTSP Kudus';
        $name = trim($this->input->post('name'));
        $email = trim($this->input->post('email'));
        $subject = "Account Activation";
        $message = "Kepada : ".$name."
                    <br>
                    <p>
                    Silahkan Klik Link untuk Aktivasi Akun Anda : <a href=".'http://bpmppt.kuduskab.go.id/aktivasi/kode/'.$kode_aktivasi.">Link</a>
                    <br>
                    atau Copy Paste Link berikut http://bpmppt.kuduskab.go.id/aktivasi/kode/".$kode_aktivasi.
                    "</p><br>
                    <p>
                    Hormat Kami,<br>
                    Administrator eRegistration<br>
                    Dinas Penanaman Modal & Pelayanan Terpadu Satu Pintu Kabupaten Kudus <br>
                    <a href='http://bpmppt.kuduskab.go.id'>http://bpmppt.kuduskab.go.id</a>
                    </p>";

        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->from($sender_email, $sender_name);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
        */
        $this->session->set_flashdata('notificationsuccess','<b>Pendaftaran Berhasil.</b>');
        redirect(site_url('registrasi/finish/id/'.$antrian_id));
    }
}
/* Location: ./application/controller/registrasi/Step_three.php */