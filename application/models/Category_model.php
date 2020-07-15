<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends MY_Model { //ok

    protected $perPage = 5;
    public function getDefaultValues(){
        return [
            'id'    =>  '',
            'slug'  =>  '',
            'title' =>  ''
        ];
    }

    public function getValidationRules(){
        $validation_rules = [
            [
                'field' =>  'slug',
                'label' =>  'Slug',
                'rules' =>  'trim|required|callback_unique_slug'
            ],

            [
                'field' =>  'title',
                'label' =>  'Title',
                'rules' =>  'trim|required'
            ]
        ];

        return $validation_rules;
    }
    

}

/* End of file Category_Model.php */