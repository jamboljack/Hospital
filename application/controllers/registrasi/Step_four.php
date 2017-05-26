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

    public function cetak($antrian_id = '') {
    	$antrian_id     = $this->uri->segment(4);
        $pasien_nama    = $this->uri->segment(5);
        
        $time          = time();
        $filename      = 'Bukti_Pendaftaran_'.$antrian_id.'_'.$time.'_'.$pasien_nama;
		$pdfFilePath = FCPATH."download/$filename.pdf";
			
		if (file_exists($pdfFilePath) == FALSE){
			ini_set('memory_limit','100M');
			$data['detail']         = $this->step_four_model->select_detail_antrian($antrian_id)->row();
			// View yang di Konvert ke PDF
			$html 					= $this->load->view('bukti_pendaftaran_view', $data, true);
			
			$this->load->library('pdf');
			$param = '"en-GB-x","A4-L","","",5,5,5,5,6,3'; // Landscape
			$pdf = $this->pdf->load($param);
			$pdf->SetHeader(''); 
			$pdf->SetFooter('');
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		redirect("download/$filename.pdf");
    }
}
/* Location: ./application/controller/registrasi/Step_four.php */