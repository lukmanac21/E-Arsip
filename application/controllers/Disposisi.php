<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('main');
        $this->load->library('session');
        if ($this->session->userdata['logged_in'] == FALSE) {
            redirect('Login');
        }
    }
    public function index()
    {
        $id_role                = $this->session->userdata('id_role');
        $data['menu']           = $this->main->get_menu_selected($id_role);
        $data['disposisi']      = $this->main->get_data_join('mst_disposisi', 'mst_surat_masuk', 'mst_surat_masuk.id_surat_masuk = mst_disposisi.id_surat');

        $this->load->view('disposisi/index', $data);
    }
    public function cetak($id_disposisi)
    {
        $where                  = ['mst_disposisi.id_disposisi' => $id_disposisi];
        $mpdf                   = new \Mpdf\Mpdf(['format' => 'A4']);
        $data['disposisi']      = $this->main->get_data_disposisi_array($where);
        $html                   = $this->load->view('laporan/disposisi', $data, true);
        $file_name              = $data['disposisi']['perihal_surat'] . "-" . date("d-m-Y", strtotime($data['disposisi']['tgl_disposisi'])) . ".pdf";
        //echo $this->db->last_query(); 
        $mpdf->WriteHTML($html);
        $mpdf->Output($file_name, \Mpdf\Output\Destination::INLINE);
    }
    public function add_data()
    {
        $id_role                = $this->session->userdata('id_role');
        $data['menu']           = $this->main->get_menu_selected($id_role);
        $data['surat']          = $this->main->get_data('mst_surat_masuk');

        $this->load->view('disposisi/tambah', $data);
    }
    public function save_data()
    {
        $data['id_surat']               = $this->input->post('id_surat');
        $data['tgl_disposisi']          = $this->input->post('tgl_disposisi');
        $data['diteruskan_kepada']      = $this->input->post('diteruskan_kepada');
        $data['isi_disposisi']          = $this->input->post('isi_disposisi');
        $data['created_by']              = $this->session->has_userdata('id_user');
        $this->main->insert_data('mst_disposisi', $data);
        redirect('Disposisi/index');
    }
    public function edit_data($id_disposisi)
    {
        $id_role                = $this->session->userdata('id_role');
        $data['menu']           = $this->main->get_menu_selected($id_role);
        $where                  = ['id_disposisi' => $id_disposisi];
        $data['disposisi']      = $this->main->get_data_where('mst_disposisi', $where);
        $data['surat']          = $this->main->get_data('mst_surat_masuk');

        $this->load->view('disposisi/ubah', $data);
    }
    public function update_data()
    {
        $data['id_surat']               = $this->input->post('id_surat');
        $data['tgl_disposisi']          = $this->input->post('tgl_disposisi');
        $data['diteruskan_kepada']      = $this->input->post('diteruskan_kepada');
        $data['isi_disposisi']          = $this->input->post('isi_disposisi');
        $data['created_by']             = $this->session->userdata('id_user');
        $where['id_disposisi']          = $this->input->post('id_disposisi');

        $this->main->update_data('mst_disposisi', $data, $where);
        redirect('Disposisi/index');
    }
    public function delete_data()
    {
        $where['id_disposisi']         = $this->input->post('id_disposisi');
        $this->main->delete_data('mst_disposisi', $where);
        redirect('Disposisi/index');
    }
}
