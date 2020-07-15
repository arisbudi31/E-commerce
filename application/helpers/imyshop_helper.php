<?php
function getDropdownList($table, $column){
 // fungsi membuat option select
    $CI =& get_instance();
    $query = $CI->db->select($column)->from($table)->get();

    if ($query->num_rows()>=1) {
        $option1 = [''=>'-select-'];
        $option2 = array_column($query->result_array(), $column[1], $column[0]);
        $options = $option1 +$option2;
        return $options;
    }
    //Jika data kosong
    return $options = ['' => '-select-']; //mengembalikan nilai ke select
}

function getCategories(){
    
    $CI =& get_instance();
    $query = $CI->db->get('category')->result();
    return $query;
}
//fungsi memuat jumlah data pada chart
function getChart(){
    
    $CI =& get_instance();
    
    $user_id = $CI->session->userdata('id');
/**
 * jika ada user id
 * menghitung total data di tabel chart
 */
    if($user_id){
        $query = $CI->db->where('id_user', $user_id)->count_all_results('cart');
        return $query;
    }

    return false;
}

function hashEncrypt($input){
    $hash = password_hash($input, PASSWORD_DEFAULT);
    return $hash;
}

function hashEncryptVerify($input, $hash){
    
    if (password_verify($input, $hash)) {
        return true; //jika plaintext input sama dengan hash nya
    }
    else{
        return false;
    }
}