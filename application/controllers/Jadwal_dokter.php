<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_dokter extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('template_front');
        $this->load->model('jadwal_dokter_model');
    }
    
    public function index() {
        $data['status']         = 'today';
        //$data['listTipe']       = $this->jadwal_dokter_model->ambil_poliklinik();
        $data['listTipe']       = $this->jadwal_dokter_model->select_tipe()->result();
        $data['listTipeHead']   = $this->jadwal_dokter_model->select_polikliknik()->result();
        $this->template_front->display('jadwal_dokter_view', $data);
    }

    // dijalankan saat Poliklinik di klik
    public function pilih_dokter() {
        $data['listDokter']     = $this->jadwal_dokter_model->ambil_dokter($this->uri->segment(3));
        $this->load->view('v_drop_down_dokter',$data);
    }

     public function search($tipe_id = '', $dokter_id = '', $tgl1 = '', $tgl2 = '') {
        $tipe_id        = $this->input->post('lstTipe');
        $dokter_id      = $this->input->post('lstDokter');
        $Tgl1           = $this->input->post('tgl1');
        $Tgl2           = $this->input->post('tgl2');

        //echo $tipe_id.'-'.$dokter_id.'-'.$Tgl1.'-'.$Tgl2;
        
        if (!empty($Tgl1)) {
            $xtgl1  = explode("-",$Tgl1);
            $thn    = $xtgl1[2];
            $bln    = $xtgl1[1];
            $tgl    = $xtgl1[0];
            $TGL1   = $thn.'-'.$bln.'-'.$tgl;
        } else {
            $TGL1   = '';
        }

        if (!empty($Tgl2)) {
            $xtgl2  = explode("-",$Tgl2);
            $thn1   = $xtgl2[2];
            $bln1   = $xtgl2[1];
            $tgl1   = $xtgl2[0];
            $TGL2   = $thn1.'-'.$bln1.'-'.$tgl1;
        } else {
            $TGL2   = '';
        }

        if ($tipe_id == 'all') { // Jika Semua Poliklinik
            $data = array(
                    'Type'      => 'Semua Poliklinik', // Untuk Info Header
                    'Dokter'    => 'all',
                    'Tanggal1'  => $Tgl1, // Untuk Info Header
                    'Tanggal2'  => $Tgl2, // Untuk Info Header
                    'TG1'       => $TGL1,
                    'TG2'       => $TGL2
                );

            $data['info']           = $data;
            $data['status']         = 'cari';
            //$data['listTipe']       = $this->jadwal_dokter_model->ambil_poliklinik();
            $data['listTipe']       = $this->jadwal_dokter_model->select_tipe()->result();
            $data['listTipeHead']   = $this->jadwal_dokter_model->select_polikliknik()->result();
            $this->template_front->display('jadwal_dokter_view', $data);
        } elseif ($tipe_id <> 'all' && $dokter_id == 'all') { // Jika Per Poliklinik dan Semua Dokter
            // Nama Poliklinik / Spesialis
            $detailType         = $this->jadwal_dokter_model->select_detail_poliklinik($tipe_id)->row();
            $NamaPoliklinik     = trim($detailType->tipe_name);

            $data = array(
                    'Type'      => $NamaPoliklinik, // Untuk Info Header Poliklinik
                    'Dokter'    => 'all',
                    'Tanggal1'  => $Tgl1, // Untuk Info Header
                    'Tanggal2'  => $Tgl2, // Untuk Info Header
                    'TG1'       => $TGL1,
                    'TG2'       => $TGL2
                );

            $data['info']           = $data;
            $data['status']         = 'cari';
            //$data['listTipe']       = $this->jadwal_dokter_model->ambil_poliklinik();
            $data['listTipe']       = $this->jadwal_dokter_model->select_tipe()->result();
            $data['listTipeHead']   = $this->jadwal_dokter_model->select_detail_poliklinik($tipe_id)->result();
            $this->template_front->display('jadwal_dokter_view', $data);
        } elseif ($tipe_id <> 'all' && $dokter_id <> 'all') { // Jika Per Poliklinik dan Semua Dokter
            // Nama Poliklinik / Spesialis
            $detailType         = $this->jadwal_dokter_model->select_detail_poliklinik($tipe_id)->row();
            $NamaPoliklinik     = trim($detailType->tipe_name);

            $data = array(
                    'Type'      => $NamaPoliklinik, // Untuk Info Header Poliklinik
                    'Dokter'    => $dokter_id,
                    'Tanggal1'  => $Tgl1, // Untuk Info Header
                    'Tanggal2'  => $Tgl2, // Untuk Info Header
                    'TG1'       => $TGL1,
                    'TG2'       => $TGL2
                );

            $data['info']           = $data;
            $data['status']         = 'cari';
            //$data['listTipe']       = $this->jadwal_dokter_model->ambil_poliklinik();
            $data['listTipe']       = $this->jadwal_dokter_model->select_tipe()->result();
            $data['listTipeHead']   = $this->jadwal_dokter_model->select_detail_poliklinik($tipe_id)->result();
            $this->template_front->display('jadwal_dokter_view', $data);
        }
     }    
}
/* Location: ./application/controller/Jadwal_dokter.php */