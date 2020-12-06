<?php include('header.php')?>
<div class="container">
<?php if($error = $this->session->flashdata('error')) :?>
  <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>

  <strong>Oh snap!</strong> <a href="#" class="alert-link">  <?php echo $error; ?>Change a few things up </a> and try submitting again.
</div>

<?php endif ?>
<?= form_open('login/userLogin',['class'=>'form-horizontal'])?>

  <fieldset>
    <legend>Login </legend>
    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
      <?= form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email','value'=>set_value('email')]) ?>
       </div>    
    </div>
    </div>
    <?php echo form_error('email'); ?>
    </div>
    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
      <?= form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password']) ?>
       </div>
     
    </div>
      </div>
      <?php echo form_error('password'); ?>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      
        <?= form_reset(['class'=>'btn btn-default','value'=>'Cancel']) ?>
        <?= form_submit(['class'=>'btn btn-primary','value'=>'Submit']) ?>
     
      </div>
    </div>
  </fieldset>
  <?php form_close()?>


</div>

<?php include('footer.php')?>
