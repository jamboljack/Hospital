<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Step_four extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in_pasien')) redirect(site_url('registrasi_online'));
        $this->load->library('template_front');
        $this->load->model('step_four_model');
    }

    public function index() {
        if(!$this->session->userdata('logged_in_pasien')) {
            redirect(site_url('registrasi_online'));
        } else {
            redirect(site_url('registrasi/step_two'));
        }
    }

    public function id($antrian_id = '') {
        if(!$this->session->userdata('logged_in_pasien')) {
            redirect(site_url('registrasi_online'));
        } else {
            $antrian_id             = $this->uri->segment(4);
            $data['error']          = 'false';
            $data['detail']         = $this->step_four_model->select_detail_antrian($antrian_id)->row();
            $this->template_front->display('registrasi_online_view', $data);
        }
    }
}
/* Location: ./application/controller/registrasi/Step_four.php */