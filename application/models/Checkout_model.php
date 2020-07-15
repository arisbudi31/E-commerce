<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends MY_Model {

    public $table = 'orders';

    public function getDefaultValues(){
        return [
            'name'      =>  '',
            'address'   =>  '',
            'phone'     =>  '',
            'status'   =>  ''
        ];
    }

    public function getValidationRules(){
        $validation_rules = [
            [
                'field' =>  'name',
                'label' =>  'Nama',
                'rules' =>  'required|trim'
            ],

            [
                'field' =>  'address',
                'label' =>  'Alamat',
                'rules' =>  'required|trim'
            ],

            [
                'field' =>  'phone',
                'label' =>  'No Handphone',
                'rules' =>  'required|trim|max_length[15]'
            ]
        ];

        return $validation_rules;
    }
    

}

/* End of file Checkout_model.php */