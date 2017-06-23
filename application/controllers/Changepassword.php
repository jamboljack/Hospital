<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('template_front');
        $this->load->model('changepassword_model');
    }
    
    public function index() {
        if(!$this->session->userdata('logged_in_pasien')) {
            redirect(site_url('registrasi_online'));
        } else {
            redirect(site_url('registrasi/step_two'));
        }
    }

    public function key($key = '') {
        $data['error']  = 'false';
        $key            = trim($this->uri->segment(3));
        $data['detail'] = $this->changepassword_model->select_user($key)->row();
        $this->template_front->display('changepassword_view', $data);
    }

    public function updatepassword() {
        $this->form_validation->set_rules('passwordbaru', 'Password Baru', 'trim|required');
        $this->form_validation->set_rules('passwordkonfirm', 'Konfirmasi Password', 'required|matches[passwordbaru]');

        if ($this->form_validation->run() == FALSE) {
            $data['error']  = 'true';
            $key            = trim($this->uri->segment(3));
            $data['detail'] = $this->changepassword_model->select_user($key)->row();
            $this->template_front->display('changepassword_view', $data);
        } else {
            $this->changepassword_model->update_password();
            $this->session->set_flashdata('notificationsuccess','Update Password Anda Berhasil.');
            redirect(site_url('registrasi_online'));
        }
    }
}
/* Location: ./application/controller/Changepassword.php */