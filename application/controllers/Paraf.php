<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paraf extends CI_Controller
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
        $data['paraf']          = $this->main->get_data_join('mst_paraf', 'mst_role', 'mst_paraf.id_role = mst_role.id_role');

        $this->load->view('paraf/index', $data);
    }
    public function add_data()
    {
        $id_role                = $this->session->userdata('id_role');
        $data['menu']           = $this->main->get_menu_selected($id_role);
        $data['jabatan']        = $this->main->multi_row_where('mst_role', 'jabatan is not null');

        $this->load->view('paraf/tambah', $data);
    }
    public function save_data()
    {
        $data['nama_paraf']     = $this->input->post('nama_paraf');
        $data['id_role']        = $this->input->post('jabatan');
        $images                 = "";
        $upload                 = $this->main->upload_file_paraf();
        if ($upload['result'] == "success") { // Jika proses upload sukses
            $images = $upload['file']['file_name'];
        } else { // Jika proses upload gagal
            var_dump($upload['error']); // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
        }

        $data['img_paraf']      = $images ? $images : '';

        $this->main->insert_data('mst_paraf', $data);
        redirect('paraf/index');
    }
    public function edit_data($id_paraf)
    {
        $id_role                = $this->session->userdata('id_role');
        $data['menu']           = $this->main->get_menu_selected($id_role);
        $where                  = ['id_paraf' => $id_paraf];
        $data['paraf']          = $this->main->get_data_where('mst_paraf', $where);
        $data['jabatan']        = $this->main->multi_row_where('mst_role', 'jabatan is not null');

        $this->load->view('paraf/ubah', $data);
    }
    public function update_data()
    {
        $where['id_paraf']      = $this->input->post('id_paraf');
        $data['nama_paraf']     = $this->input->post('nama_paraf');
        $data['id_role']        = $this->input->post('jabatan');
        $gambarLama             = $this->input->post('gambarLama');

        $upload                 = $this->main->upload_file_paraf();
        if ($upload['result'] == "success") { // Jika proses upload sukses
            $images = $upload['file']['file_name'];
            if (file_exists('./assets/img/paraf/' . $gambarLama)) {
                unlink('./assets/img/paraf/' . $gambarLama);
            }
        } else { // Jika proses upload gagal
            $images = $gambarLama; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
        }
        $data['img_paraf']      = $images;

        $this->main->update_data('mst_paraf', $data, $where);
        redirect('paraf/index');
    }
    public function delete_data()
    {
        $where['id_paraf']       = $this->input->post('id_paraf');
        $gambarLama              = $this->input->post('gambarLama');
        if (file_exists('./assets/img/paraf/' . $gambarLama)) {
            unlink('./assets/img/paraf/' . $gambarLama);
        }
        $this->main->delete_data('mst_paraf', $where);
        redirect('paraf/index');
    }
}
