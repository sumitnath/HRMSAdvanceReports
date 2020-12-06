<?php include('header.php') ?>

<div class="container">
<div class="text-center">
<h4 > Emplooyee List</h4>
</div>

<?php if($success = $this->session->flashdata('success')) :?>
  <div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><a href="#" class="alert-link">  <?php echo $success; ?></a> </strong> 
</div>

<?php endif ?>
<div class="row">
<div class="col-lg-4">
<ul class="nav nav-pills nav-stacked">
  <li class="active"><a href="#">Employee Management</a></li>

  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
    Action <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="<?= base_url('employee/createEmployee')  ?>">Create Employee</a></li>
      <li class="divider"></li>
      <li><a href="<?= base_url('employee/viewEmployee')  ?>">View Employee</a></li>
    </ul>
  </li>
</ul>
</div>
<div class="container">


<div class="col-lg-8">

<?= form_open("employee/viewEmployee",['class'=>'navbar-form navbar-right" role="search']); ?>
<div class="form-group">
<?= form_input(['name'=>'query','class'=>'form-control','placeholder'=>'Search', 'value'=>$this->input->post('query')]);?>
</div>
<?= form_submit(['class'=>'btn btn-primary','value'=>'Search']) ?>
</div>
</div>

<hr>
<div class="row">
<?= anchor('employee/deleteEmployee','Delete Employee',['class'=>'btn btn-danger']) ?>
</div>
<div class="row">
<table class="table table-striped table-hover ">
  <thead>
    <tr>
    <th></th>
      <th>First Name</th>
      <th>User Name</th>
      <th>Designation</th>
      <th>User Role</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php if(count($emp_info) > 0):?>
    <?php foreach($emp_info as $emp) : ?>
    <tr>
    <?php if($emp->user_role_id == 1) :?>
   <td></td>
      <?php else :?>
        <td><?=form_checkbox('employee', 'accept', FALSE) ?> </td>
   <?php endif ?>

   <?php if($emp->user_role_id == 1) :?>
    <td>  <?= $emp->name; ?> </td>
   
      <?php else :?> 
     <td>   <?= anchor("employee/empPersonalDetail/{$emp->user_id}", $emp->name); ?>
     
      </td>
   <?php endif ?>
   
      <td><?= $emp->username; ?> </td>
      <td><?= $emp->user_id; ?> </td>
      <td><?= $emp->role_name; ?> </td>
    <td> 
  <div class="btn-group" role="group" aria-label="Basic example"> 
  <a href='<?php echo base_url("employee/editEmpPersonalDetail/{$emp->user_id}") ?>'>
  <button type="button" class="btn btn-primary">Edit Personal Details</button> </a>
   <a href='<?php echo base_url("employee/editContact/{$emp->user_id}") ?>'>
  <button type="button" class="btn btn-secondary">Edit Contact</button> </a>
   <a href='<?php echo base_url("employee/editQualification/{$emp->user_id}") ?>'>
  <button type="button" class="btn btn-secondary">Edit Qualification</button> </a>
</div>    
  
    </td>
      <?php endforeach ?>
  <?php else :?>
    <br>
    <div class="card text-white bg-primary mb-3" style="max-width: 40rem;">
  <div class="card-header text-center"> <?php echo "No record found";?></div>
</div>
  <?php endif ?>
    </tr> 
  </tbody>
</table> 
<?php echo $this->pagination->create_links(); ?>
</div>



</div>
<?php include('footer.php') ?>
