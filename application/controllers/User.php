<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $role = $this->session->userdata('role');
        if($role !='admin'){
            redirect(base_url('/'));
            return;
        }
    }
    

    public function index($page = null)
    {
        $data['title'] = 'Admin: Pengguna';
        $data['content'] = $this->user->paginate($page)->get();
        $data['total_rows'] = $this->user->totalContent();
        $data['pagination'] = $this->user->makePagination(
            base_url('user'), 2, $data['total_rows']
        );

        $data['page'] = 'pages/user/index';

        $this->viewData($data);
        
    }

    public function search($page = null)
	{
		if (isset($_POST['keyword'])) {
			$this->session->set_userdata('keyword', $this->input->post('keyword'));
		} else {
			redirect(base_url('user'));
		}

		$keyword	= $this->session->userdata('keyword');
		$data['name'] = 'Admin: Pengguna';
        $data['content'] = $this->user
        ->like('name', $keyword)
        ->orlike('email', $keyword)
        ->paginate($page)
        ->get();
        $data['total_rows'] = $this->user->like('name', $keyword)
        ->orlike('email', $keyword)
        ->totalContent();
        $data['pagination'] = $this->user->makePagination(
            base_url('user/search'), 3, $data['total_rows'] 
        );
        $data['page'] = 'pages/user/index';
		
		$this->viewData($data);
	}

	public function reset()
	{
		$this->session->unset_userdata('keyword');
		redirect(base_url('user'));
	}

    public function create(){
        if(!$_POST){
            $input = (object) $this->user->getDefaultValues();
        }
        else{
            $input = (object) $this->input->post(null, true);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password','min_length[8]|required');
            $input->password = hashEncrypt($input->password);
            
        }
        
        if(!empty($_FILES) && $_FILES['image']['name'] !== ''){
            $image_name = url_title($input->title, '-', true) . '-' . date('YmdHis');
            $upload = $this->user->uploadImage('image', $image_name);
            if($upload){
                $input->image = $upload['file_name'];
            }
            else{
                redirect(base_url('user/create'));
            }
        }

        if(!$this->user->validate()){
            $data['title'] = 'Admin Pengguna';
            $data['input'] = $input;
            $data['form_action'] = base_url('user/create');
            $data['page'] = 'pages/user/form';

            $this->viewData($data);
            return;
        }

        if($this->user->create($input)){
            $this->session->set_flashdata('success', 'Data berhasil diinput');           
        }
        else{
            $this->session->set_flashdata('error', 'Data gagal disimpan');          
        }

        redirect(base_url('user'));
    }

    public function edit($id){
        $data['content'] = $this->user->where('id', $id)->first();

        if(!$data['content']){
            $this->session->set_flashdata('warning', 'Maaf data tidak ditemukan');   
            redirect(base_url('user'));       
        }

        if(!$_POST){
            $data['input'] = $data['content'];
        }
        else{
            $data['input'] = (object) $this->input->post(null, true);
            if($data['input']->password !== ''){
                $data['input']->password = hashEncrypt($data['input']->password);
            }
            else{
                $data['input']->password = $data['content']->password;
            }
        }
        
        if(!empty($_FILES) && $_FILES['image']['name'] !== ''){
            $image_name = url_title($data['input']->name, '-', true) . '-' . date('YmdHis');
            $upload = $this->user->uploadImage('image', $image_name);
            if($upload){
                if($data['content']->image !==''){
                    $this->user->deleteImage($data['content']->image);
                }
                $data['input']->image = $upload['file_name'];
            }
            else{
                redirect(base_url("user/edit/$id"));
            }
        }

        if(!$this->user->validate()){
            $data['title'] = 'Admin: Pengguna';
            $data['form_action'] = base_url("user/edit/$id");
            $data['page'] = 'pages/user/form';

            $this->viewData($data);
            return;
        }

        if($this->user->where('id', $id)->update($data['input'])){
            $this->session->set_flashdata('success', 'Data berhasil disimpan');            
        }
        else{
            $this->session->set_flashdata('error', 'Data gagal diperbarui');          
        }

        redirect(base_url('user'));

    }

    public function delete($id){
        if(!$_POST){           
            redirect(base_url('user'));          
        }

        $user = $this->user->where('id', $id)->first();

        if(!$user){
            $this->session->set_flashdata('warning', 'Maaf data tidak ditemukan');  
            redirect(base_url('user'));         
        }

        if($this->user->where('id', $id)->delete()){
            $this->user->deleteImage($user->image);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');            
        }
        else{
            $this->session->set_flashdata('error', 'Oopss, terjadi kesalaha');
        }

        redirect(base_url('user'));

    }

    public function unique_email()
	{
		$email		= $this->input->post('email');
		$id			= $this->input->post('id');
		$user	= $this->user->where('email', $email)->first();

		if ($user) {
			if ($id == $user->id) {
				return true;
			}
			$this->load->library('form_validation');
			$this->form_validation->set_message('unique_email', '%s sudah digunakan!');
			return false;
		}

		return true;
	}

}

/* End of file User.php */