<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratmasuk extends CI_Controller
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
        $data['menu']             = $this->main->get_menu_selected($id_role);
        $data['surat_masuk']   = $this->main->get_data('mst_surat_masuk');

        $this->load->view('suratmasuk/index', $data);
    }
    public function add_data()
    {
        $id_role                = $this->session->userdata('id_role');
        $data['menu']             = $this->main->get_menu_selected($id_role);

        $this->load->view('suratmasuk/tambah', $data);
    }
    public function save_data()
    {
        $data['no_surat']               = $this->input->post('no_surat');
        $data['tgl_surat']              = $this->input->post('tgl_surat');
        $data['pengirim_surat']         = $this->input->post('pengirim_surat');
        $images                         = "";
        $upload                         = $this->main->upload_file_surat();
        if ($upload['result'] == "success") { // Jika proses upload sukses
            $images = $upload['file']['file_name'];
        } else { // Jika proses upload gagal
            var_dump($upload['error']); // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
        }

        $data['bukti_surat']         = $images ? $images : '';

        $this->main->insert_data('mst_surat_masuk', $data);
        redirect('Suratmasuk/index');
    }
    public function edit_data($id_surat_masuk)
    {
        $id_role                = $this->session->userdata('id_role');
        $data['menu']             = $this->main->get_menu_selected($id_role);
        $where                     = ['id_surat_masuk' => $id_surat_masuk];
        $data['surat_masuk']         = $this->main->get_data_where('mst_surat_masuk', $where);

        $this->load->view('suratmasuk/ubah', $data);
    }
    public function update_data()
    {
        $where['id_surat_masuk']        = $this->input->post('id_surat_masuk');
        $data['no_surat']               = $this->input->post('no_surat');
        $data['tgl_surat']              = $this->input->post('tgl_surat');
        $data['pengirim_surat']         = $this->input->post('pengirim_surat');
        $gambarLama                     = $this->input->post('gambarLama');

        $upload                         = $this->main->upload_file_surat();
        if ($upload['result'] == "success") { // Jika proses upload sukses
            $images = $upload['file']['file_name'];
            if (file_exists('./assets/img/suratmasuk/' . $gambarLama)) {
                unlink('./assets/img/suratmasuk/' . $gambarLama);
            }
        } else { // Jika proses upload gagal
            $images = $gambarLama; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
        }

        $data['bukti_surat']         = $images;

        $this->main->update_data('mst_surat_masuk', $data, $where);
        redirect('Suratmasuk/index');
    }
    public function delete_data()
    {
        $where['id_surat_masuk']         = $this->input->post('id_surat_masuk');
        $gambarLama                      = $this->input->post('gambarLama');
        if (file_exists('./assets/img/suratmasuk/' . $gambarLama)) {
            unlink('./assets/img/suratmasuk/' . $gambarLama);
        }
        $this->main->delete_data('mst_surat_masuk', $where);
        redirect('Suratmasuk/index');
    }
}
