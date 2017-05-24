<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_online extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('template_front');
        $this->load->model('registrasi_online_model');
    }

    public function index() {
        if(!$this->session->userdata('logged_in_pasien')) {
            $data['error'] = 'false';
            $this->template_front->display('registrasi_online_view', $data);
        } else {
            redirect(site_url('registrasi/step_two'));
        }
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

    public function register() {
        $this->form_validation->set_rules('username','<b>Nama Akun</b>','trim|required|min_length[5]|max_length[20]|is_unique[hospital_users.user_username]'); // Username minimal 5 karakter dan maksimal 20 karakter
        $this->form_validation->set_rules('nama','<b>Nama Lengkap</b>','trim|required|min_length[5]'); // Email harus Valid
        $this->form_validation->set_rules('email','<b>Email</b>','trim|required|min_length[5]|valid_email|is_unique[hospital_users.user_email]'); // Email harus Valid
        $this->form_validation->set_rules('phone','<b>No. Handphone</b>','trim|required|integer'); // No. HP (harus Angka)
        $this->form_validation->set_rules('password','<b>Password</b>','trim|required|min_length[3]'); // Pass minimal 3 karakter
        $this->form_validation->set_rules('verify','<b>Captcha</b>','trim|required|min_length[5]|max_length[5]'); // Captcha harus 5 karakter

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = 'true';
            $this->template_front->display('registrasi_online_view', $data);
        } else {
            $verify     = trim($this->input->post('verify', 'true'));
            $security   = $this->session->userdata('security_code');

            if((!empty($verify) && ($verify == $security))) {
                // $kode_aktivasi = md5(uniqid(rand()));
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

                $this->db->insert('hospital_users', $data);

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

                $this->session->set_flashdata('notificationsuccess','<b>Registrasi Akun Anda Berhasil, Silahkan Login.</b>');
                redirect(site_url('registrasi_online'));
            } else {
                $this->session->set_flashdata('notificationerror','<b>MAAF !!, Captcha Salah, ulangi lagi.</');
                redirect(site_url('registrasi_online'));
            }
        }
    }

    public function login() {
        $username   = trim($this->input->post('username'));
        $password   = trim($this->input->post('password'));        
        $temp_user  = $this->registrasi_online_model->get_user($username)->row();
        $num_user   = count($temp_user);        
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');        
        
        if ($num_user == 0) {
            $this->session->set_flashdata('notificationerror','<b>Maaf !! Username Anda Tidak Terdaftar.</b>');
            redirect(site_url('registrasi_online'));                
        } elseif ($num_user > 0) {
            $temp_account = $this->registrasi_online_model->check_user_account($username, sha1($password))->row();
            $num_account = count($temp_account);        
            if ($num_account > 0) {   
                $array_item = array('username'          => $temp_account->user_username, 
                                    'nama'              => $temp_account->user_name,
                                    'email'             => $temp_account->user_email,
                                    'logged_in_pasien'  => TRUE
                            );
                    
                $this->session->set_userdata($array_item);
                $this->session->set_flashdata('notificationsuccess','<b>Login Sukses.</b>');
                redirect(site_url('registrasi/step_two'));
            } else {
                $this->session->set_flashdata('notificationerror','<b>Login Gagal, Username atau Password Anda Salah.</b>');
                redirect(site_url('registrasi_online'));
            }               
        }
    }

    public function logout() {
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-chace');
        $this->session->sess_destroy();
        redirect(site_url('registrasi_online'));
    }
}
/* Location: ./application/controller/Registrasi_online.php */