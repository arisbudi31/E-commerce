<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Myorder_model extends MY_Model {

    public $table ='orders';

    public function getDefaultValues(){
        return [
            'id_order'      => '',
            'account_name'  =>  '',
            'account_number'=>  '',
            'nominal'       =>  '',
            'note'          =>  '',
            'image'         =>  ''
        ];
    }

    public function getValidationRules(){
        $validation_rules = [   

            [
                'field'    =>   'account_name',
                'label'    =>   'Nama Pemilik',
                'rules'    =>   'trim|required'
            ],

            [
                'field'    =>   'account_number',
                'label'    =>   'No Rekening',
                'rules'    =>   'trim|required|max_length[50]'
            ],

            [
                'field'    =>   'nominal',
                'label'    =>   'Nominal',
                'rules'    =>   'trim|required|numeric'
            ],

            [
                'field'    =>   'image',
                'label'    =>   'Bukti Transfer',
                'rules'    =>   'callback_image_required'
            ],
        ];

        return $validation_rules;
    }

    public function uploadImage($field_image, $filename){
        $config = [
            'upload_path'      =>   './images/confirm',
            'file_name'        =>   $filename,
            'allowed_types'    =>  'jpg|JPG|png|PNG|gif|jpeg',  
            'max_size'         =>   1024,
            'max_width'        =>   0,
            'max_height'       =>   0,
            'overwrite'        =>   true,
            'file_ext_tolower' =>   true
        ];

        $this->load->library('upload', $config);
        
        if($this->upload->do_upload($field_image)){
            return $this->upload->data();
        }
        else{
            $this->session->set_flashdata('image_error', $this->upload->display_errors('',''));
            return false;
        }
    }
    

}

/* End of file Myorder_model.php */