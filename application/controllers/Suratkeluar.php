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
        $data['surat_keluar']           = $this->main->get_data_two_join('mst_surat_keluar','mst_jenis','mst_surat_keluar.id_jenis = mst_jenis.id_jenis','mst_opd','mst_surat_keluar.id_opd = mst_opd.id_opd');

        $this->load->view('Suratkeluar/index', $data);
    }
    public function add_data()
    {
        $id_role                        = $this->session->userdata('id_role');
        $data['menu']                   = $this->main->get_menu_selected($id_role);
        $data['opd']                    = $this->main->get_data('mst_opd');

        $this->load->view('Suratkeluar/tambah', $data);
    }
    public function cetak_data($id_surat_keluar){
        $where                          = ['mst_surat_keluar.id_surat_keluar' => $id_surat_keluar];
        $data['surat_keluar']           = $this->main->get_data_two_join_where_array('mst_surat_keluar','mst_jenis','mst_surat_keluar.id_jenis = mst_jenis.id_jenis','mst_opd','mst_surat_keluar.id_opd = mst_opd.id_opd',$where);
        $mpdf                           = new \Mpdf\Mpdf(['format' => 'A4']);
        $html                           = $this->load->view('laporan/surat_keluar', $data, true);
        $file_name                      = $data['surat_keluar']['perihal_surat'] . "-" . date("d-m-Y", strtotime($data['surat_keluar']['tgl_surat'])) . ".pdf";
        $mpdf->WriteHTML($html);
        $mpdf->Output($file_name, \Mpdf\Output\Destination::INLINE);
    }
    public function save_data()
    {
        $data['no_surat']               = $this->input->post('no_surat');
        $data['tgl_surat']              = $this->input->post('tgl_surat');
        $data['id_opd']                 = $this->input->post('id_opd');
        $data['id_jenis']               = $this->input->post('id_jenis');
        $data['perihal']                = $this->input->post('perihal');
        $data['sifat']                  = $this->input->post('sifat');
        $data['isi_surat']              = $this->input->post('isi_surat');

        $this->main->insert_data('mst_surat_keluar', $data);
        redirect('Suratkeluar/index');
    }
    public function edit_data($id_surat_masuk)
    {
        $id_role                    = $this->session->userdata('id_role');
        $data['menu']               = $this->main->get_menu_selected($id_role);
        $where                      = ['id_surat_masuk' => $id_surat_masuk];
        $data['surat_masuk']        = $this->main->get_data_where('mst_surat_keluar', $where);

        $this->load->view('Suratkeluar/ubah', $data);
    }
    public function update_data()
    {
        $where['id_surat_masuk']        = $this->input->post('id_surat_masuk');
        $data['no_surat']               = $this->input->post('no_surat');
        $data['tgl_surat']              = $this->input->post('tgl_surat');
        $data['pengirim_surat']         = $this->input->post('pengirim_surat');
        $data['perihal_surat']          = $this->input->post('perihal_surat');
        $data['tgl_terima_surat']       = $this->input->post('tgl_terima_surat');
        $data['no_agenda_surat']       = $this->input->post('no_agenda_surat');
        $gambarLama                     = $this->input->post('gambarLama');

        $upload                         = $this->main->upload_file_surat();
        if ($upload['result'] == "success") { // Jika proses upload sukses
            $images = $upload['file']['file_name'];
            if (file_exists('./assets/img/Suratkeluar/' . $gambarLama)) {
                unlink('./assets/img/Suratkeluar/' . $gambarLama);
            }
        } else { // Jika proses upload gagal
            $images = $gambarLama; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
        }

        $data['bukti_surat']         = $images;

        $this->main->update_data('mst_surat_keluar', $data, $where);
        redirect('Suratkeluar/index');
    }

}
