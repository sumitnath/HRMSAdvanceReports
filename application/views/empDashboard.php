<?php include('header.php') ?>

<div class="container">
<div class="text-center">
<h5 > Employee Dashboard</h5>
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
</div>
<hr>

<div class="container">
<?= form_open_multipart("employee/addEmpPersonalDetail/{$emp->user_id}") ?>
<?= form_hidden(['user_id'=>$emp->user_id]); ?>
<?= form_hidden(['user_role_id'=>$emp->user_role_id]); ?>
<div class="row">
<div class="col-md-3"> 
<legend>Welcome <?php echo $emp->name; ?></legend>
<div class="list-group">
<a href="" class="list-group-item"> 
<?php if(empty($record)){ ?>
      <img src="<?php echo base_url()?>/assets/image/blank.png" alt="" style="width:230px; height:230px;"/>
      </a>
      <br>
      <?= form_upload(['name'=>'avtar','class'=>'form-control']);?>
      <?php if(isset($upload_error)) {
      echo $upload_error;
  } ?>
<?php }else{ ?>
      <img src="<?= $record->avatar ;?>" alt="" style="width:230px; height:230px;"/>
      </a>
      <br>
<?php }?>


<ul class="nav nav-pills nav-stacked"> 
      <li class="active"><a href='<?= base_url("employee/empPersonalDetail/{$emp->user_id}") ?>'>Personal Details</a></li>
      <li class="nav-item active">
      <a class="nav-link" href='<?= base_url("employee/empContactDetail/{$emp->user_id}") ?>'>Contact Details</a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href='<?= base_url("employee/empQualificationDetail/{$emp->user_id}") ?>'> Qualification Details</a>
      </li>
  </ul>
</div>
</div>
<div class="col-md-9">
<legend>Personal Details</legend>

<div class="row">
  <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">First Name</label>
          <div class="col-lg-7">
          <?php if(empty($record)){ ?>
          <?= form_input(['name'=>'firstname','class'=>'form-control','placeholder'=>'First Name','value'=>set_value('firstname')]) ?>
          <?php }else{ ?>
            <?= form_input(['name'=>'firstname','class'=>'form-control','placeholder'=>'First Name','value'=> $record->firstname ]) ?>
            <?php }?>
          </div>    
       </div>
    </div>
    <?php echo form_error('firstname'); ?>
</div> 
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Middle Name</label>
        <div class="col-lg-7">
        <?php if(empty($record)){ ?>
          <?= form_input(['name'=>'middlename','class'=>'form-control','placeholder'=>'Middle Name','value'=>set_value('middlename')]) ?>
          <?php }else{ ?>
            <?= form_input(['name'=>'middlename','class'=>'form-control','placeholder'=>'Middle Name','value'=> $record->middlename ]) ?>
            <?php }?>
          </div>    
       </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Last Name</label>
          <div class="col-lg-7">
          <?php if(empty($record)){ ?>
          <?= form_input(['name'=>'lastname','class'=>'form-control','placeholder'=>'Last Name','value'=>set_value('lastname')]) ?>
          <?php }else{ ?>
            <?= form_input(['name'=>'lastname','class'=>'form-control','placeholder'=>'Last Name','value'=> $record->lastname ]) ?>
            <?php }?>
          </div>    
       </div>
    </div>
    <?php echo form_error('lastname'); ?>
</div>
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
       <label for="inputEmail" class="col-lg-3 control-label">User Name</label>
           <div class="col-lg-7">
          <?= form_input(['name'=>'username','class'=>'form-control','placeholder'=>'User Name','value'=> $emp->username ]) ?>
          </div>    
       </div>
    </div>
    <?php echo form_error('username'); ?>
</div>
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Gender</label>
          <div class="col-lg-7">
          <?php if(empty($record)){ ?>
        <?php
          $options = array('male' =>'Male',
        'female'=>'Female','other'=>'Other'
      );
        echo form_dropdown('gender', $options, 'male',['class'=>'form-control']);
        ?>
        <?php }else{ ?>
          <?php
           $options = array('male' =>'Male',
           'female'=>'Female','other'=>'Other'
         );?>
            <?= form_dropdown('gender', $options,$record->gender, ['class'=>'form-control']) ?>
            <?php }?>
          </div>    
       </div>
    </div>
  
</div>
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Nationlity</label>
          <div class="col-lg-7">
          <?php if(empty($record)){ ?>
          <?= form_input(['name'=>'nationlity','class'=>'form-control','placeholder'=>'Nationlity','value'=>set_value('nationlity')]) ?>
          <?php }else{ ?>
            <?= form_input(['name'=>'nationlity','class'=>'form-control','placeholder'=>'Nationlity','value'=> $record->nationlity ]) ?>
            <?php }?>
          </div>    
       </div>
    </div>
    <?php echo form_error('nationlity'); ?>
</div>
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Marital Status</label>
          <div class="col-lg-7">
          <?php if(empty($record)){ ?>
        <?php 
        $options = array('married'=>'Married',
        'unmarried'=>'Unmarried', 'other'=> 'Single');
        echo form_dropdown('maritalStat', $options, 'unmarried',['class'=>'form-control']);
        ?>
        <?php }else{ ?>
          <?php
     $options = array('married'=>'Married',
     'unmarried'=>'Unmarried', 'other'=> 'Single');
        echo form_dropdown('maritalStat', $options, $record->marital_status,['class'=>'form-control']);
        ?>
        <?php } ?>
          </div>    
       </div>
    </div>
    <?php echo form_error('maritalStat'); ?>
</div>
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Date of Birth</label>
          <div class="col-lg-7">
          <?php if(empty($record)){ ?>
          <?= form_input(['name'=>'dob', 'id'=>'datepicker','class'=>'form-control','placeholder'=>'Date of Birth','value'=>set_value('dob')]) ?>
          <?php }else{ ?>
            <?= form_input(['name'=>'dob', 'id'=>'datepicker','class'=>'form-control','placeholder'=>'Date of Birth','value'=>$record->dob]) ?>
          <?php } ?>
          </div>    
       </div>
    </div>
    <?php echo form_error('dob'); ?>
</div>
<br>
<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      <?php if(empty($record)){ ?>
        <?= form_reset(['class'=>'btn btn-default','value'=>'Cancel']) ?>
        <?= form_submit(['class'=>'btn btn-primary','value'=>'Submit']) ?>

        <?php } ?>
      </div>
  </div>

</div>

 
</div>

<?php form_close() ?>



</div>
<?php include('footer.php') ?>
