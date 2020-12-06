<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class queries extends CI_Model {

 function userLogin_m(){
 $data['username'] = $this->input->post('email');
 $data['password'] = $this->input->post('password');
$query = $this->db->where($data);
$query = $this->db->get('users');

if($query ->num_rows()> 0){
  return $query->row();
 }
}

function gt_role(){
$user_role= $this->db->get('user_role');
if($user_role->num_rows() > 0){
return $user_role->result();
}
}
function insertEmployee_m(){
  $data = $this->input->post();
  return $this->db->insert('users',$data);
}

function lastEmployee_m(){
  $this->db->order_by('user_id', 'DESC');
  $this->db->limit(1);
  return $this->db->get('users')->row(); 
}

function getData($limit,$offset){
$query = $this->input->post('query');
  if($query){
    $this->db->like(['name'=>$query]);
    $this->db->or_like(['username'=>$query]);
  }
$this->db->select(['users.user_id','users.name','users.username','user_role.role_name','users.user_role_id']);
$this->db->from('users');
$this->db->join('user_role','users.user_role_id=user_role.id');
$this->db->limit($limit,$offset);
return $this->db->get()->result();
}

function getTotalNoData(){
  $query = $this->input->post('query');
  if($query){
    $this->db->like(['name'=>$query]);
    $this->db->or_like(['username'=>$query]);
  }
return $this->db->get('users')->num_rows();
//echo $this->db->count_all('users'); 
}

function getEmpData($limit,$offset){
 $query = $this->input->post('query');
if($query){
  $this->db->like(['name'=>$query]);
  $this->db->or_like(['username'=>$query]);
}
$this->db->select(['users.user_id','users.name','users.username','user_role.role_name','users.user_role_id']);
  $this->db->from('users');
  $this->db->join('user_role','users.user_role_id=user_role.id');
  $this->db->limit($limit,$offset);
  $this->db->where(['users.user_role_id' => '2']);
  return $this->db->get()->result();
  }

function empPersonalDetail_m($user_id){
 $this->db->where(['user_id'=>$user_id]);
 $q = $this->db->get('users');
 if($q->num_rows() > 0){
 return $q->row();
 }
}

 function empPersonalRecord_m($user_id){
 $qt =$this->db->get_where('emp_personal_details',['user_id'=>$user_id]);
 if($qt->num_rows() > 0){
  return $qt->row();
  }
 }


  
 function addEmpPersonalDetail_m($image_path){
 $data['user_id'] = $this->input->post('user_id');
 $data['emp_role_id'] = $this->input->post('user_role_id');
 $data['firstname'] = $this->input->post('firstname');
 $data['middlename'] = $this->input->post('middlename');
 $data['lastname'] = $this->input->post('lastname');
 $data['username'] = $this->input->post('username');
 $data['gender'] = $this->input->post('gender');
 $data['nationlity'] = $this->input->post('nationlity');
 $data['marital_status'] = $this->input->post('maritalStat');
// date('Y-m-d', strtotime('dd/mm/yyyy'));
 $data['dob'] =  date('Y-m-d', strtotime($this->input->post('dob')));
 $data['avatar'] = $image_path;
  return $this->db->insert('emp_personal_details',$data);
 }

 function updatePersonalDetail_m($image_path,$user_id){
  $data['emp_role_id'] = $this->input->post('user_role_id');
  $data['firstname'] = $this->input->post('firstname');
  $data['middlename'] = $this->input->post('middlename');
  $data['lastname'] = $this->input->post('lastname');
  $data['username'] = $this->input->post('username');
  $data['gender'] = $this->input->post('gender');
  $data['nationlity'] = $this->input->post('nationlity');
  $data['marital_status'] = $this->input->post('maritalStat');
 // date('Y-m-d', strtotime('dd/mm/yyyy'));
  $data['dob'] =  date('Y-m-d', strtotime($this->input->post('dob')));
  $data['avatar'] = $image_path;
  $this->db->where('user_id', $user_id);
  return $this->db->update('emp_personal_details', $data);
 }


  function addContactDetail_m($user_id){
  $data = $this->input->post();
  return $this->db->insert('emp_contact_details',$data);
  }
 
  function empContactRecord_m($user_id){
     $qt =$this->db->get_where('emp_contact_details',['user_id'=>$user_id]);
     if($qt->num_rows() > 0){
      return $qt->row();
      }
     }

function UpdateContact_m($user_id){
 $data= $this->input->post();
 $this->db->where('user_id',$user_id);
  return $this->db->update('emp_contact_details', $data);
}

function addQualification($user_id){
$data = $this->input->post();
return $this->db->insert('emp_qualifiction',$data);
}


function qualification($user_id){
  $qt =$this->db->get_where('emp_qualifiction',['user_id'=>$user_id]);
  if($qt->num_rows() > 0){
   return $qt->row();
   }
  }

 function updateQualification($user_id){
  $data= $this->input->post();
  $this->db->where('user_id',$user_id);
   return $this->db->update('emp_qualifiction', $data);
  }

  function deleteEmployee($userid){

  $this->db->delete('users',['user_id'=>$userid]);
  $this->db->delete('emp_contact_details',['user_id'=>$userid]);
  $this->db->delete('emp_personal_details',['user_id'=>$userid]);
  $this->db->delete('emp_qualifiction',['user_id'=>$userid]);
  }


  
    }




   

    

  








