<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
    }

    public function view_admin()
    {
        $data['produk'] = $this->m_produk->read_all_produk()->result_array();
        $this->load->view('admin/produk', $data);
    }

    public function tambah_produk()
    {
        $nama_produk = $this->input->post('nama_produk');
        $harga_produk = $this->input->post('harga_produk');
        $diskon = $this->input->post('diskon');
        $jumlah_produk = $this->input->post('jumlah_produk');
        $tanggal_kadaluarsa = $this->input->post('tanggal_kadaluarsa');
        $tanggal_produksi = $this->input->post('tanggal_produksi');
        $deskripsi = $this->input->post('deskripsi');

        $foto_name = md5($nama_produk . $harga_produk . $diskon . $jumlah_produk . rand(1, 9999));

        $path = './assets/gambar/';

        $this->load->library('upload');
        $config['upload_path'] = './assets/gambar';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '2048'; //2MB max
        $config['max_width'] = '4480'; // pixel
        $config['max_height'] = '4480'; // pixel
        $config['file_name'] = $foto_name;
        $this->upload->initialize($config);
        $gambar_produk_upload = $this->upload->do_upload('gambar_produk');

        if ($gambar_produk_upload) {
            $gambar_produk = $this->upload->data();
        } else {
            $this->session->set_flashdata('error_file_gambar_produk',
                'error_file_gambar_produk');
            redirect('Produk/view_admin');
        }

        $hasil = $this->m_produk->insert_produk($nama_produk, $gambar_produk['file_name'],
            $harga_produk, $diskon, $jumlah_produk, $tanggal_kadaluarsa, $tanggal_produksi, $deskripsi);

        if ($hasil == false) {

            $this->session->set_flashdata('eror_input', 'eror_input');
            redirect('Produk/view_admin');

        } else {

            $this->session->set_flashdata('input', 'input');
            redirect('Produk/view_admin');

        }

    }

    public function edit_produk()
    {
        $id_produk = $this->input->post('id_produk');
        $nama_produk = $this->input->post('nama_produk');
        $harga_produk = $this->input->post('harga_produk');
        $diskon = $this->input->post('diskon');
        $jumlah_produk = $this->input->post('jumlah_produk');
        $tanggal_kadaluarsa = $this->input->post('tanggal_kadaluarsa');
        $tanggal_produksi = $this->input->post('tanggal_produksi');
        $deskripsi = $this->input->post('deskripsi');

        $foto_name = md5($nama_produk . $harga_produk . $diskon . $jumlah_produk . rand(1, 9999));

        $path = './assets/gambar/';

        $this->load->library('upload');
        $config['upload_path'] = './assets/gambar';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '2048'; //2MB max
        $config['max_width'] = '4480'; // pixel
        $config['max_height'] = '4480'; // pixel
        $config['file_name'] = $foto_name;
        $this->upload->initialize($config);
        $gambar_produk_upload = $this->upload->do_upload('gambar_produk');

        if ($gambar_produk_upload) {
            $gambar_produk = $this->upload->data();
        } else {
            $this->session->set_flashdata('error_file_gambar_produk',
                'error_file_gambar_produk');
            redirect('Produk/view_admin');
        }

        $hasil = $this->m_produk->update_produk($nama_produk, $gambar_produk['file_name'],
            $harga_produk, $diskon, $jumlah_produk, $tanggal_kadaluarsa, $tanggal_produksi, $deskripsi, $id_produk);

        if ($hasil == false) {

            $this->session->set_flashdata('eror_update', 'eror_update');
            redirect('Produk/view_admin');

        } else {

            @unlink($path . $this->input->post('gambar_produk_old'));
            $this->session->set_flashdata('update', 'update');
            redirect('Produk/view_admin');

        }

    }

    public function hapus_produk()
    {
        $id_produk = $this->input->post('id_produk');

        $path = './assets/gambar/';
        $hasil = $this->m_produk->delete_produk($id_produk);

        if ($hasil == false) {
            $this->session->set_flashdata('eror_hapus', 'eror_hapus');
        } else {
            $this->session->set_flashdata('hapus', 'hapus');
        }
        @unlink($path.$this->input->post('gambar_produk_old'));
        redirect('Produk/view_admin');
    }

}
