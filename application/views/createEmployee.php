<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('header.php')?>

<div class="container">
<?php if($success = $this->session->flashdata('success')) :?>
  <div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>

  <strong><a href="#" class="alert-link">  <?php echo $success; ?></a> </strong> 
</div>

<?php endif ?>
<?= form_open('employee/insertEmployee',['class'=>'form-horizontal'])?>

  <fieldset>
    <legend class="text-center">Add Employee </legend>
    <div class="row">
    <div class="col-lg-8">
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-6">
      <?= form_input(['name'=>'name','class'=>'form-control','placeholder'=>'Name','value'=>set_value('name')]) ?>
       </div>    
    </div>
    </div>
    <?php echo form_error('name'); ?>
    </div>
    <div class="row">
    <div class="col-lg-8">
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-6">
      <?= form_input(['name'=>'username','class'=>'form-control','placeholder'=>'Username','value'=>set_value('username')]) ?>
       </div>    
    </div>
    </div>
    <?php echo form_error('username'); ?>
    </div>

    <div class="row">
    <div class="col-lg-8">
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-6">
      <?= form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password']) ?>
       </div>  
    </div>
      </div>
      <?php echo form_error('password'); ?>
    </div>

    <div class="row">
    <div class="col-lg-8">
    <div class="form-group">
      <label for="Role" class="col-lg-2 control-label">Role</label>
      <div class="col-lg-6">
      <select name="user_role_id" class='form-control'>
 
      <?php foreach(array_reverse($role) as $rol) :?>
    <option value=<?php echo $rol->id?>><?= $rol->role_name ?></option>
    <?php endforeach ?>
    </select>
 
       </div>  
    </div>
      </div>
      <?php echo form_error('role'); ?>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      
        <?= form_reset(['class'=>'btn btn-default','value'=>'Cancel']) ?>
        <?= form_submit(['class'=>'btn btn-primary','value'=>'Submit']) ?>
        <?= anchor('employee/updateEmployee','Update Submit',['class'=>'btn btn-primary']) ?>
     
      </div>
    </div>
  </fieldset>
  <?php form_close()?>


</div>

  <?php include('footer.php')?>
