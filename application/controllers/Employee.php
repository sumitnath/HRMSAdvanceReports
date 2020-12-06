<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('queries');
    $this->load->library('form_validation');
   
  }

function index(){

}
function createEmployee(){
  $user_role['role'] = $this->queries->gt_role();
  $this->load->view('createEmployee',$user_role);
} 
function insertEmployee(){

  $this->form_validation->set_rules('name', 'Name', 'required');
  $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]|valid_email');
  $this->form_validation->set_rules('password', 'Password', 'required');
  $this->form_validation->set_rules('user_role_id', 'Role', 'required');
  $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
    if ($this->form_validation->run() == TRUE)
    {
      $this->queries->insertEmployee_m();
     $this->session->set_flashdata('success','Employee created Please login');
     return redirect('dashboard');
    }else{
      $this->createEmployee();
    
    }
}

function viewEmployee(){
    
    $this->load->library('pagination');
    $config =[
    'base_url'=> base_url('employee/viewEmployee'),
    'per_page'=> 8,
    'total_rows'=> $this->queries->getTotalNoData() -1 ,
    'reuse_query_string' => TRUE,
    'full_tag_open' => '<ul class="pagination pagination-lg">',
    'full_tag_close' => '</ul>',
      'last_tag_open' => '<li>',
      'last_tag_close' => '</li>',
      'next_tag_open' => '<li>',
      'next_tag_close' => '</li>',
      'prev_tag_open' => '<li>',
      'prev_tag_close' => '</li>',
      'cur_tag_open' => '<li class="active"><a>',
      'cur_tag_close' => '</a></li>',
      'num_tag_open' => '<li>',
      'num_tag_close' => '</li>',
    ];
    
    $this->pagination->initialize($config);
    $data['emp_info'] = $this->queries->getEmpData($config['per_page'],$this->uri->segment(3));
    $this->load->view('viewEmployee',$data);
} 


function empPersonalDetail($user_id){
  $data['emp'] = $this->queries->empPersonalDetail_m($user_id);
  $data['record'] =$this->queries->empPersonalRecord_m($user_id);
$this->load->view('empPersonalDetail',$data);
} 


function addEmpPersonalDetail($user_id){
  $config= [
    'upload_path'      => './uploads/',
    'allowed_types'    => 'gif|jpg|png'
  ];

 $this->load->library('upload');
 $this->upload->initialize($config);

 $this->form_validation->set_rules('firstname', 'First Name', 'required');
  $this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email');
  $this->form_validation->set_rules('lastname', 'last Name', 'required');
  $this->form_validation->set_rules('nationlity', 'Nationlity', 'required');
  $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
  $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
    
  if($this->form_validation->run() && $this->upload->do_upload('avtar'))
        {
       $data =  $this->upload->data();
      $image_path = base_url('uploads/'.$data['raw_name'].$data['file_ext']);
    if($this->queries->addEmpPersonalDetail_m($image_path))
     {
      $this->session->set_flashdata('success','Employee Data Successfully uploaded');
  
      }else{
        $this->session->set_flashdata('error','Failed to upload employee');
      }
      return redirect('dashboard/index');
    }else{
   $error['upload_error'] = $this->upload->display_errors();

   $this->empPersonalDetail($user_id,$error);

    }
}

function updateEmployee(){
  $data['emp']= $this->queries->lastEmployee_m();;
  $this->load->view('empPersonalDetail',$data);
}

function editEmpPersonalDetail($user_id){
  $data['record'] =$this->queries->empPersonalRecord_m($user_id);
  $this->load->view('editEmpInfo',$data);
}

function updateEmpInfo($user_id){
 $config= [
    'upload_path'      => './uploads/',
    'allowed_types'    => 'gif|jpg|png'
  ];
  $this->load->library('upload');
$this->upload->initialize($config);
$this->upload->do_upload('avtar');
 $this->form_validation->set_rules('firstname', 'First Name', 'required');
  $this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email');
  $this->form_validation->set_rules('lastname', 'last Name', 'required');
  $this->form_validation->set_rules('nationlity', 'Nationlity', 'required');
  $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
  $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
    
  if($this->form_validation->run()){
    if($this->upload->do_upload('avtar')){
      $data =  $this->upload->data();
      $image_path = base_url('uploads/'.$data['raw_name'].$data['file_ext']);
      echo $image_path ;
    $this->queries->updatePersonalDetail_m($image_path,$user_id);
    $this->session->set_flashdata('success','Employee Data Successfully uploaded');
     }else{
      $image_path = $this->input->post('old');
      echo $image_path ;
      $this->queries->updatePersonalDetail_m($image_path,$user_id);
      $this->session->set_flashdata('success','Employee Data Successfully uploaded');
    }
   return redirect('dashboard/index');
  }else{
    $this->editEmpPersonalDetail($user_id);

     }
}
function empContactDetail($user_id){
$data['emp'] = $this->queries->empPersonalDetail_m($user_id);
$data['record'] =$this->queries->empPersonalRecord_m($user_id);
$data['contact'] =$this->queries->empContactRecord_m($user_id);
$this->load->view('empContactDetail',$data);
}


function addContactDetail($user_id){
$this->form_validation->set_rules('address1', 'Address', 'required');
$this->form_validation->set_rules('city', 'City','required');
$this->form_validation->set_rules('state', 'State', 'required');
$this->form_validation->set_rules('zip_code', 'Zip_code', 'required|numeric');
$this->form_validation->set_rules('country', 'Country', 'required');
$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
$this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
if($this->form_validation->run()){
      if($this->queries->addContactDetail_m($user_id)){
      $this->session->set_flashdata('success','Employee Contact Successfully uploaded');   
    }else{
      $this->session->set_flashdata('error','Failed to upload employee Contact');
    }
    return redirect('dashboard');
}else{
  $this->empContactDetail($user_id);
}

}

function editContact($user_id){
  $data['contact'] =$this->queries->empContactRecord_m($user_id);
  $data['emp'] = $this->queries->empPersonalDetail_m($user_id);
  $data['records'] =$this->queries->empPersonalRecord_m($user_id);
  $this->load->view('editContact',$data);
}

function updateContact($user_id){
  $this->form_validation->set_rules('address1', 'Address', 'required');
  $this->form_validation->set_rules('city', 'City','required');
  $this->form_validation->set_rules('state', 'State', 'required');
  $this->form_validation->set_rules('zip_code', 'Zip_code', 'required|numeric');
  $this->form_validation->set_rules('country', 'Country', 'required');
  $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
  $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
  if($this->form_validation->run()){
 
        if($this->queries->UpdateContact_m($user_id)){
        $this->session->set_flashdata('success','Employee Contact Successfully updated');
      }else{
        $this->session->set_flashdata('error','Failed to updated employee Contact');
      }
      return redirect('dashboard');
  }else{
    $this->editContact($user_id);
  }

}
 
function empQualificationDetail($user_id){
  $data['emp'] = $this->queries->empPersonalDetail_m($user_id);
  $data['record'] =$this->queries->empPersonalRecord_m($user_id);
  $data['qualification'] =$this->queries->qualification($user_id);
  $this->load->view('empQualificationDetail',$data);
}

function addQualification($user_id){
  $this->form_validation->set_rules('puc', 'PUC ', 'required');
  $this->form_validation->set_rules('ssic', 'Ssic','required');
  $this->form_validation->set_rules('graduation', 'Graduation', 'required');
  $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
  if($this->form_validation->run()){
    if($this->queries->addQualification($user_id)){
    $this->session->set_flashdata('success','Employee Qualification Successfully Added');
    }else{
      $this->session->set_flashdata('error','Failed to add employee Qualification');
    }
return redirect('dashboard');
  }else{
    $this->empQualificationDetail($user_id);
  }
}


function editQualification($user_id){
  $data['emp'] = $this->queries->empPersonalDetail_m($user_id);
  $data['record'] =$this->queries->empPersonalRecord_m($user_id);
  $data['qualification'] =$this->queries->qualification($user_id);
  $this->load->view('editQualification',$data);
}

function updateQualification($user_id){
  $this->form_validation->set_rules('puc', 'PUC ', 'required');
  $this->form_validation->set_rules('ssic', 'Ssic','required');
  $this->form_validation->set_rules('graduation', 'Graduation', 'required');
  $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
  if($this->form_validation->run()){
    if($this->queries->updateQualification($user_id)){
    $this->session->set_flashdata('success','Employee Qualification Successfully Added');
    }else{
      $this->session->set_flashdata('error','Failed to add employee Qualification');
    }
return redirect('dashboard');
  }else{
    $this->empQualificationDetail($user_id);
  }
}

function deleteEmployee(){
 foreach($_POST['user_id'] as $userid){
$this->queries->deleteEmployee($userid);
}
 return redirect('dashboard');
} 


}


?>
