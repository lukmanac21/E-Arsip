<?php
defined('BASEPATH') or exit('No direct script access allowed');

class main extends CI_MODEL
{
    function check_login($table, $where)
    {
        $query =  $this->db->select('*')
            ->from($table)
            ->where($where)
            ->get();
        return $query;
    }
    function get_data($table)
    {
        $query = $this->db->get($table);
        return $query->result();
    }
    function get_data_where($table, $where)
    {
        $query = $this->db->get_where($table, $where);
        return $query->row();
    }
    function multi_row_where($table, $where)
    {
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }
    function show_all_data_order_by($table, $field)
    {
        $query = $this->db->select('*')->from($table)->order_by($field)->get();
        return $query->result();
    }
    function get_data_where_dinas($table, $where)
    {
        $query = $this->db->select('*')->from($table)->where($where)->get();
        return $query->result();
    }
    function get_data_join($table, $table_join, $where)
    {
        $query = $this->db->select('*')->from($table)->join($table_join, $where)->get();
        return $query->result();
    }
    function get_data_two_join_where($table, $table_join, $where_join, $table_joins, $where_joins, $where)
    {
        $query = $this->db->select('*')->from($table)->join($table_join, $where_join)->join($table_joins, $where_joins)->where($where)->get();
        return $query->result();
    }
    function get_data_two_join($table, $table_join, $where_join, $table_joins, $where_joins)
    {
        $query = $this->db->select('*')->from($table)->join($table_join, $where_join)->join($table_joins, $where_joins)->get();
        return $query->result();
    }
    function get_data_disposisi($where)
    {
        $query = $this->db->select('mst_surat_masuk.pengirim_surat , mst_surat_masuk.tgl_surat , mst_surat_masuk.no_surat , mst_surat_masuk.perihal_surat , mst_surat_masuk.tgl_terima_surat , mst_surat_masuk.no_agenda_surat , sekretaris.nama_paraf as nama_sekretaris , kepala.nama_paraf as nama_kepala , mst_disposisi.isi_disposisi, mst_disposisi.tgl_disposisi, mst_disposisi.diteruskan_kepada, sekretaris.img_paraf as paraf_sekretaris, kepala.img_paraf as paraf_kepala')
            ->from('mst_disposisi')
            ->join('mst_surat_masuk', 'mst_disposisi.id_surat = mst_surat_masuk.id_surat_masuk')
            ->join('mst_paraf as kepala', 'mst_disposisi.id_paraf_kepala = kepala.id_paraf')
            ->join('mst_paraf as sekretaris', 'mst_disposisi.id_paraf_sek = sekretaris.id_paraf')
            ->where($where)
            ->get();
        return $query->row();
    }
    function get_data_disposisi_array($where)
    {
        $query = $this->db->select('mst_surat_masuk.pengirim_surat , mst_surat_masuk.tgl_surat , mst_surat_masuk.no_surat , mst_surat_masuk.perihal_surat , mst_surat_masuk.tgl_terima_surat , mst_surat_masuk.no_agenda_surat , sekretaris.nama_paraf as nama_sekretaris , kepala.nama_paraf as nama_kepala , mst_disposisi.isi_disposisi, mst_disposisi.tgl_disposisi, mst_disposisi.diteruskan_kepada, sekretaris.img_paraf as paraf_sekretaris, kepala.img_paraf as paraf_kepala')
            ->from('mst_disposisi')
            ->join('mst_surat_masuk', 'mst_disposisi.id_surat = mst_surat_masuk.id_surat_masuk')
            ->join('mst_paraf as kepala', 'mst_disposisi.id_paraf_kepala = kepala.id_paraf')
            ->join('mst_paraf as sekretaris', 'mst_disposisi.id_paraf_sek = sekretaris.id_paraf')
            ->where($where)
            ->get();
        return $query->row_array();
    }
    function get_data_join_where($table, $table_join, $where_join, $where)
    {
        $query = $this->db->select('*')->from($table)->join($table_join, $where_join)->where($where)->get();
        return $query->result();
    }
    function get_menu_selected($id_role)
    {
        $this->db->select('*')
            ->from('mst_user_access')
            ->join('mst_sub_menu', 'mst_user_access.id_sub_menu = mst_sub_menu.id_sub_menu')
            ->join('mst_menu', 'mst_menu.id_menu = mst_sub_menu.id_menu')
            ->where('mst_user_access.id_role =', $id_role)
            ->group_by('mst_menu.id_menu');
        $query = $this->db->get();
        return $query->result();
    }
    function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
    }
    function update_data($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function upload_file_surat()
    {
        $this->load->library('upload'); // Load librari upload
        $config['upload_path'] = './assets/img/suratmasuk/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['overwrite'] = true;
        $config['file_name'] = '';
        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    public function upload_file_paraf()
    {
        $this->load->library('upload'); // Load librari upload
        $config['upload_path'] = './assets/img/paraf/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['overwrite'] = true;
        $config['file_name'] = '';
        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
}
