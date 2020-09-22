<?php
function get_access($id_role,$id_menu){
    $ci = get_instance();
    $result = $ci->db->get_where('mst_user_access',['id_role' => $id_role, 'id_sub_menu' =>$id_menu]);    
    if($result->num_rows() > 0){
        return "checked = 'checked'";
    }
}
?>