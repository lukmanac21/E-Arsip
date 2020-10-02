<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratkeluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('main');
        $this->load->library('session');
        if (!$this->session->has_userdata('id_user')) {
            redirect('Login');
        }
    }
    public function index()
    {
        $id_role                        = $this->session->userdata('id_role');
        $data['menu']                   = $this->main->get_menu_selected($id_role);
        $data['surat_keluar']           = $this->main->get_data_two_join('mst_surat_keluar', 'mst_jenis', 'mst_surat_keluar.id_jenis = mst_jenis.id_jenis', 'mst_opd', 'mst_surat_keluar.id_opd = mst_opd.id_opd');

        $this->load->view('Suratkeluar/index', $data);
    }
    public function add_data()
    {
        $id_role                        = $this->session->userdata('id_role');
        $data['menu']                   = $this->main->get_menu_selected($id_role);
        $data['opd']                    = $this->main->get_data('mst_opd');
        $data['bagian']                 = $this->main->get_data('mst_bagian');
        $data['jenis']                 = $this->main->get_data('mst_jenis');

        $this->load->view('Suratkeluar/tambah', $data);
    }
    public function cetak_data($id_surat_keluar)
    {
        $where                          = ['mst_surat_keluar.id_surat_keluar' => $id_surat_keluar];
        $data['surat_keluar']           = $this->main->get_data_four_join_where_array('mst_surat_keluar', 'mst_jenis', 'mst_surat_keluar.id_jenis = mst_jenis.id_jenis', 'mst_opd', 'mst_surat_keluar.id_opd = mst_opd.id_opd', 'mst_paraf', 'mst_surat_keluar.id_paraf = mst_paraf.id_paraf', 'mst_bagian', 'mst_surat_keluar.id_bagian = mst_bagian.id_bagian', $where);
        $mpdf                           = new \Mpdf\Mpdf(['format' => 'A4']);
        $html                           = $this->load->view('laporan/surat_keluar', $data, true);
        $file_name                      = $data['surat_keluar']['nama_jenis'] . "-" . $data['surat_keluar']['nama_opd'] .  "-" . date("d-m-Y", strtotime($data['surat_keluar']['tgl_surat'])) . ".pdf";
        $mpdf->WriteHTML($html);
        $mpdf->Output($file_name, \Mpdf\Output\Destination::INLINE);
    }
    public function save_data()
    {
        $data['no_surat']               = $this->input->post('no_surat');
        $data['tgl_surat']              = $this->input->post('tgl_surat');
        $data['id_opd']                 = $this->input->post('id_opd');
        $data['id_bagian']              = $this->input->post('id_bagian');
        $data['id_jenis']               = $this->input->post('id_jenis');
        $data['perihal']                = $this->input->post('perihal');
        $data['sifat']                  = $this->input->post('sifat');
        $data['isi_surat']              = $this->input->post('isi_surat');
        $data['lampiran']               = $this->input->post('lampiran');

        $this->main->insert_data('mst_surat_keluar', $data);
        redirect('Suratkeluar/index');
    }
    public function edit_data($id_surat_keluar)
    {
        $id_role                        = $this->session->userdata('id_role');
        $data['menu']                   = $this->main->get_menu_selected($id_role);
        $where                          = ['id_surat_keluar' => $id_surat_keluar];
        $data['surat_keluar']           = $this->main->get_data_where('mst_surat_keluar', $where);
        $data['opd']                    = $this->main->get_data('mst_opd');
        $data['bagian']                 = $this->main->get_data('mst_bagian');

        $this->load->view('Suratkeluar/ubah', $data);
    }
    public function update_data()
    {
        $where['id_surat_keluar']       = $this->input->post('id_surat_keluar');
        $data['no_surat']               = $this->input->post('no_surat');
        $data['tgl_surat']              = $this->input->post('tgl_surat');
        $data['id_opd']                 = $this->input->post('id_opd');
        $data['id_bagian']              = $this->input->post('id_bagian');
        $data['id_jenis']               = $this->input->post('id_jenis');
        $data['perihal']                = $this->input->post('perihal');
        $data['sifat']                  = $this->input->post('sifat');
        $data['isi_surat']              = $this->input->post('isi_surat');
        $data['lampiran']              = $this->input->post('lampiran');


        $this->main->update_data('mst_surat_keluar', $data, $where);
        redirect('Suratkeluar/index');
    }
}
