<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('template_front');
        $this->load->model('home_model');
    }
    
    public function index() {
        $data['error']          = false;
    	$data['listKelompok'] 	= $this->home_model->select_kelompok()->result();
    	$data['listMenu'] 		= $this->home_model->select_menu()->result();
        $data['kontak']         = $this->home_model->select_kontak()->row();
        $this->template_front->display('home_view', $data);
    }

    public function create_image(){
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

    public function sendmessage() {
        $this->form_validation->set_rules('email','<b>Email</b>','trim|required|min_length[5]|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $data['error']          = true;
            $data['listKelompok']   = $this->home_model->select_kelompok()->result();
            $data['listMenu']       = $this->home_model->select_menu()->result();
            $data['kontak']         = $this->home_model->select_kontak()->row();
            $this->template_front->display('home_view', $data);
        } else {                        
            $verify     = trim($this->input->post('verify', 'true'));
            $security   = $this->session->userdata('security_code');

            if((!empty($verify) && ($verify == $security))) {
                $this->home_model->insert_message();
                $this->session->set_flashdata('notification','Terima Kasih atas Kritik & Saran Anda.');
                redirect(site_url('home'));
            } else {                
                $this->session->set_flashdata('notification','MAAF !!, Captcha Salah, ulangi lagi.');
                redirect(site_url('home'));
            }
        }
    }
}
/* Location: ./application/controller/Home.php */