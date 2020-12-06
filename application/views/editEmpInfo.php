<?php include('header.php')?>

<div class="container">

<?= form_open_multipart("employee/updateEmpInfo/{$record->user_id}") ?>
<?= form_hidden(['user_id'=>$record->user_id]); ?>
<?= form_hidden(['user_role_id'=>$record->emp_role_id]); ?>
<div class="row">
<div class="col-md-3">
<legend>Employee Detail</legend>
<div class="list-group">
<a href="" class="list-group-item"> 
<?php if(!isset($record->avatar)) :?>
      <img src="<?php echo base_url()?>/assets/image/blank.png" alt="" style="width:230px; height:230px;"/>
         <?php else :?>
     <img src="<?= $record->avatar ;?>" alt="" style="width:230px; height:230px;"/>
      </a>
      <?php endif ?>
      <br>
      <input type="hidden" name="old" value="  <?= $record->avatar ?>">
      <?= form_upload(['name'=>'avtar', 'class'=>'form-control']);?>
      <?php if(isset($upload_error)) {
      echo $upload_error;
  } ?>

    
 <br>
<ul class="nav nav-pills nav-stacked"> 
      <li class="active"><a href='<?= base_url("employee/empPersonalDetail/{$record->user_id}") ?>'>Personal Details</a></li>
      <li class="nav-item active">
      <a class="nav-link" href='<?= base_url("employee/empContactDetail/{$record->user_id}") ?>'>Contact Details</a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href='<?= base_url("employee/empQualificationDetail/{$record->user_id}") ?>'> Qualification Details</a>
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
            <?= form_input(['name'=>'firstname','class'=>'form-control','placeholder'=>'First Name','value'=> $record->firstname]) ?>
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
            <?= form_input(['name'=>'middlename','class'=>'form-control','placeholder'=>'Middle Name','value'=> $record->middlename ]) ?>
          </div>    
       </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Last Name</label>
          <div class="col-lg-7">
            <?= form_input(['name'=>'lastname','class'=>'form-control','placeholder'=>'Last Name','value'=> $record->lastname ]) ?>
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
          <?= form_input(['name'=>'username','class'=>'form-control','placeholder'=>'User Name','value'=> $record->username ]) ?>
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
          <?php
           $options = array('male' =>'Male',
           'female'=>'Female','other'=>'Other'
         );?>
            <?= form_dropdown('gender', $options,$record->gender, ['class'=>'form-control']) ?>
          </div>    
       </div>
    </div>
  
</div>
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Nationlity</label>
          <div class="col-lg-7">
            <?= form_input(['name'=>'nationlity','class'=>'form-control','placeholder'=>'Nationlity','value'=> $record->nationlity ]) ?>
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
          <?php
     $options = array('married'=>'Married',
     'unmarried'=>'Unmarried', 'other'=> 'Single');
        echo form_dropdown('maritalStat', $options, $record->marital_status,['class'=>'form-control']);
        ?>
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
            <?= form_input(['name'=>'dob', 'id'=>'datepicker','class'=>'form-control','placeholder'=>'Date of Birth','value'=>$record->dob]) ?>
          </div>    
       </div>
    </div>
    <?php echo form_error('dob'); ?>
</div>
<br>
<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <?= form_reset(['class'=>'btn btn-default','value'=>'Cancel']) ?>
        <?= form_submit(['class'=>'btn btn-primary','value'=>'Update']) ?>
      </div>
  </div>

</div>

 
</div>

<?php form_close() ?>
</div>



<?php include('footer.php')?>




