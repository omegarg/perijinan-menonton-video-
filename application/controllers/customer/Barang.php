<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mbarangmasuk');
        $this->load->model('Mpermintaan');
        $this->load->model('Muser');
        if (!$this->session->userdata("customer")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Barang Baru';
        $data['barangmasuk'] = $this->Mbarangmasuk->tampil_barangmasuk();

        $this->load->view('header', $data);
        $this->load->view('customer/navbar', $data);
        $this->load->view('customer/barangmasuk/databarsuk', $data);
        $this->load->view('footer');
    }


    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('id_user', 'Pembuat', 'required');
        $this->form_validation->set_rules('id_permintaan', 'Permintaan Video', 'required');
        $this->form_validation->set_rules('kode_barangmasuk', 'Kode Barang Masuk', 'required');
        $this->form_validation->set_rules('tgl_barangmasuk', 'Tanggal', 'required'); 

        $inputan = $this->input->post();
        //jk ada inputan dari formulir
        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mbarangmasuk jalankan fungsi simpan_barangmasuk($inputan)
            $this->Mbarangmasuk->simpan_barangmasuk($inputan);
            //tampilkan customer/barangmasuk/index
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('customer/barangmasuk', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        //tampilkan kode_barangmasuk pada inputan
        $data['kode_barangmasuk'] = $this->Mbarangmasuk->kode_barangmasuk();
        $data['permintaanpembelian'] = $this->Mbarangmasuk->tampilbarangmasukbaru();
        $data['title'] = 'Tambah Barang Masuk';

        $this->load->view('header', $data);
        $this->load->view('customer/navbar', $data);
        $this->load->view('customer/barangmasuk/tambahbarsuk', $data);
        $this->load->view('footer');
    }


    public function detail($id_barangmasuk, $id_permintaanpembelian)
    {
        $data['barangmasuk'] = $this->Mbarangmasuk->detail_barangmasuk($id_barangmasuk);
        $data['detailpermintaanpembelian'] = $this->Mpermintaanpembelian->tampil_detailpermintaanpembelian($id_permintaanpembelian);

        $data['title'] = 'Detail Barang Masuk';

        $this->load->view('header', $data);
        $this->load->view('customer/navbar', $data);
        $this->load->view('customer/barangmasuk/detailbarsuk', $data);
        $this->load->view('footer');
    }

    public function cetak($id_barangmasuk, $id_permintaanpembelian)
    {
        $data['barangmasuk'] = $this->Mbarangmasuk->detail_barangmasuk($id_barangmasuk);
        $data['detailpermintaanpembelian'] = $this->Mpermintaanpembelian->tampil_detailpermintaanpembelian($id_permintaanpembelian);

        $data['title'] = 'Cetak Barang Masuk';

        $this->load->view('customer/barangmasuk/cetakbarsuk', $data);
    }

}
