<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DisposisiSekretaris extends CI_Controller
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

        $this->load->view('disposisi-sekretaris/index', $data);
    }
    public function edit_data($id_disposisi)
    {
        $id_role                = $this->session->userdata('id_role');
        $data['menu']           = $this->main->get_menu_selected($id_role);
        $where                  = ['id_disposisi' => $id_disposisi];
        $data['disposisi']      = $this->main->get_data_where('mst_disposisi', $where);
        $data['surat']          = $this->main->get_data('mst_surat_masuk');
        $this->load->view('disposisi-sekretaris/ubah', $data);
    }
    public function update_data()
    {
        //ambil role kepala kecamatan
        $where_sek                      = ['id_role' => $this->session->userdata('id_role')];
        $sek                            = $this->main->get_data_where('mst_paraf', $where_sek);
        $data['diteruskan_kepada']      = $this->input->post('diteruskan_kepada');
        $data['isi_disposisi']          = $this->input->post('isi_disposisi');
        $data['id_paraf_sek']           = $sek->id_paraf;
        $where['id_disposisi']          = $this->input->post('id_disposisi');

        $this->main->update_data('mst_disposisi', $data, $where);
        redirect('DisposisiSekretaris/index');
    }

    public function batal_verif($id_disposisi)
    {
        $data['id_paraf_sek']        = NULL;
        $where['id_disposisi']          = $id_disposisi;
        $this->main->update_data('mst_disposisi', $data, $where);
        redirect('DisposisiSekretaris/index');
    }
}
