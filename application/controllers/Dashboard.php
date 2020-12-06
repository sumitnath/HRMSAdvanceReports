<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  function __construct(){
    parent::__construct();
   
    $this->load->model('queries');
  }
function index(){
   if(!$this->session->userdata('id')){
      return redirect('Login');
    }else{
if ($this->session->userdata('id') == 1){
$this->load->library('pagination');
$config =[
'base_url'=> base_url('dashboard/index'),
'per_page'=>5 ,
'total_rows'=>$this->queries->getTotalNoData(),
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

  $data['emp_info'] = $this->queries->getData($config['per_page'],$this->uri->segment(3));
  $this->load->view('dashboard',$data);
  }else{
 $user_id= $this->session->userdata('user_id');
    $data['emp']=$this->queries->empPersonalDetail_m($user_id);
    $data['record']=$this->queries->empPersonalRecord_m($user_id);
$this->load->view('empDashboard',$data);
  }

}

}
}


