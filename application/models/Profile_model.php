<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends MY_Model {

    protected $table = 'user';

    public function getDefaultValues(){
        return [
            'name'  =>  '',
            'email' =>  '',
            'image' =>  ''
        ];
    }

    public function getValidationRules(){
        $validation_rules = [
            [
                'field' =>  'name',
                'label' =>  'Nama',
                'rules' =>  'trim|required'
            ],

            [
                'field' =>  'email',
                'label' =>  'Email',
                'rules' =>  'required|trim|valid_email|callback_unique_email'
            ]
        ];

        return $validation_rules;
    }

    public function uploadImage($field_image, $filename){
        $config = [
            'upload_path'      =>   './images/user',
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
    
    public function deleteImage($filename){
        if(file_exists("./images/user/$filename")){
            unlink("./images/user/$filename");
        }
    }
    

}

/* End of file Profile_model.php */