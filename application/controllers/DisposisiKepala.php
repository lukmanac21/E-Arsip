<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DisposisiKepala extends CI_Controller
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
        $id_role                = $this->session->userdata('id_role');
        $data['menu']           = $this->main->get_menu_selected($id_role);
        $data['disposisi']      = $this->main->get_data_join('mst_disposisi', 'mst_surat_masuk', 'mst_surat_masuk.id_surat_masuk = mst_disposisi.id_surat');

        $this->load->view('disposisi-kepala/index', $data);
    }
    public function edit_data($id_disposisi)
    {
        $id_role                = $this->session->userdata('id_role');
        $data['menu']           = $this->main->get_menu_selected($id_role);
        $where                  = ['id_disposisi' => $id_disposisi];
        $data['disposisi']      = $this->main->get_data_where('mst_disposisi', $where);
        $data['surat']          = $this->main->get_data('mst_surat_masuk');
        $this->load->view('disposisi-kepala/ubah', $data);
    }
    public function update_data()
    {
        $data['diteruskan_kepada']      = $this->input->post('diteruskan_kepada');
        $data['isi_disposisi']          = $this->input->post('isi_disposisi');
        $where['id_disposisi']          = $this->input->post('id_disposisi');

        $this->main->update_data('mst_disposisi', $data, $where);
        redirect('DisposisiKepala/index');
    }

    public function batal_verif($id_disposisi)
    {
        $data['id_paraf_kepala']        = NULL;
        $where['id_disposisi']          = $id_disposisi;
        $this->main->update_data('mst_disposisi', $data, $where);
        redirect('DisposisiKepala/index');
    }

    public function verif($id_disposisi)
    {
        //ambil role kepala kecamatan
        $where_kepala                   = ['id_role' => $this->session->userdata('id_role')];
        $kepala                         = $this->main->get_data_where('mst_paraf', $where_kepala);
        $where['id_disposisi']          = $id_disposisi;
        $data['id_paraf_kepala']        = $kepala->id_paraf;
        $this->main->update_data('mst_disposisi', $data, $where);
        redirect('DisposisiKepala/index');
    }
}
