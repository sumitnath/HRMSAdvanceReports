<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('queries');
    $this->load->library('form_validation');
   
  }

	public function index(){
    if($this->session->userdata('id')){
     return redirect('dashboard');
    }
      $this->load->view('login');
    

  }
  
  public function userLogin(){

  $this->form_validation->set_rules('email', 'Email', 'required');
  $this->form_validation->set_rules('password', 'Password', 'required');
  $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
    if ($this->form_validation->run() == FALSE)
    {
            $this->load->view('login');
    }
    else
    { 
      if($query= $this->queries->userLogin_m()){
        $userdata['id'] = $query->user_role_id;
        $userdata['name'] = $query->name;
        $userdata['username'] = $query->username;
        $userdata['user_id'] = $query->user_id;
  $this->session->set_userdata($userdata);
  redirect('dashboard');
    }else{
      $this->session->set_flashdata('error','Email / password is incorrect');
   $this->load->view('login');
    }
  
    }
  }

  public function logout(){
 $this->session->sess_destroy();
 return redirect('login');
  }
}

