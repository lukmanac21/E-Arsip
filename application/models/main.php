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
