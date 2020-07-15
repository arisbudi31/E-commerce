<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {
   
   public function __construct()
   {
       parent::__construct();
       $is_login = $this->session->userdata('is_login'); //validasi user apakah sudah login

       if($is_login){ //jika sudah login
           redirect(base_url()); //dikembalikan ke hamalan base url
           return;
       }
   }

   public function index(){
    if(!$_POST){ //jika mengakses bukan dengan method post
        $input = (object) $this->register->getDefaultValues(); //variabel input diisikan dengan nilai default
    }
    else{ //jika methode post
        $input = (object) $this->input->post(null, true); //variabel input akan diisikan dengan nilai dari form register
    }

    if(!$this->register->validate()){ //jika registrasi tidak tervalidasi
        $data['title']  = 'Register';   //memuat form register
        $data['input']  = $input;
        $data['page']   = 'pages/auth/register'; 
        $this->viewData($data);
        return; //memberhentikan proses sampai ke view saja
    }
    /**
     * jika validasi berhasil/kondisi post yang diterima
     * kondisi if validasi di atas akan dilompati
     * dan langsung memuat kondisi run
     */
    if($this->register->run($input)){ //jika berhasil menjalani
        $this->session->set_flashdata('success', 'Berhasil Melakukan Registrasi'); //menampilkan pesan berhasil
        redirect(base_url());
    }
    else{ //dan jika gagal
        $this->session->set_flashdata('error', 'Oopps! Terjadi  Kesalahan!'); //menampilkan pesan gagal dan dikembalikan ke halaman register
        redirect('register');
    }
   }
   

}

/* End of file Controllername.php */