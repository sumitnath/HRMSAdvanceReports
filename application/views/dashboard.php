<?php include('header.php') ?>

<div class="container">
<div class="text-center">
<h4 > Admin Dashboard</h4>
</div>

<?php if($success = $this->session->flashdata('success')) :?>
  <div class="alert alert-dismissible alert-success">  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><a href="#" class="alert-link">  <?php echo $success; ?></a> </strong> 
</div>
<?php endif ?>
<?php if($error = $this->session->flashdata('error')) :?>
  <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><a href="#" class="alert-link">  <?php echo $error; ?></a> </strong> 
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
<?= form_open("dashboard/index",['class'=>'navbar-form navbar-right" role="search']); ?>

<div class="form-group">
<?= form_input(['name'=>'query','class'=>'form-control','placeholder'=>'Search','value'=>$this->input->post('query')]);?>
</div>
<?= form_submit(['class'=>'btn btn-primary','value'=>'Search']) ?>
<?php echo form_close() ?>
</div>
</div>

<hr>
<?php echo form_open('Employee/deleteEmployee')?>
<div class="row">

<?php echo form_submit(['class'=>'btn btn-danger','value'=>'Delete Employee']) ?>
     
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
    </tr>
  </thead>
  <tbody>
  <?php if(count($emp_info) > 0):?>
    <?php foreach($emp_info as $emp) : ?>
    <tr>
    <?php if($emp->user_role_id == 1) :?>
   <td></td>
      <?php else :?>
        <td><?=form_checkbox(['name'=>"user_id[]",'value'=>$emp->user_id,'class'=>'checkbox']) ?> </td>
   <?php endif ?>

   <?php if($emp->user_role_id == 1) :?>
    <td>  <?= $emp->name; ?> </td>
   
      <?php else :?> 
     <td>   <?= anchor("employee/empPersonalDetail/{$emp->user_id}", $emp->name); ?> </td>
   <?php endif ?>
   
      <td><?= $emp->username; ?> </td>
      <td><?= $emp->user_id; ?> </td>
      <td><?= $emp->role_name; ?> </td>
    
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

<?php echo form_close()?>

</div>
<?php include('footer.php') ?>
