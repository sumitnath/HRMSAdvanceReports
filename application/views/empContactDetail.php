<?php include('header.php')?>

<div class="container">

<?= form_open("employee/addContactDetail/{$emp->user_id}") ?>
<?= form_hidden(['user_id'=>$emp->user_id]); ?>

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
<legend>Contact Details</legend>

<div class="row">
  <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Address1</label>
          <div class="col-lg-7">
          <?php if(isset($contact)) :?>
            <?= form_input(['name'=>'address1','class'=>'form-control','placeholder'=>'Address1','value'=> set_value('address1',$contact->address1)]) ?>
          <?php else :?>
            <?= form_input(['name'=>'address1','class'=>'form-control','placeholder'=>'Address1','value'=> set_value('address1')]) ?>
      
            <?php endif ?>
          </div>    
       </div>
    </div>
    <?php echo form_error('address1'); ?>
</div> 
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Address2</label>
        <div class="col-lg-7">
        <?php if(isset($contact)) :?>
            <?= form_input(['name'=>'address2','class'=>'form-control','placeholder'=>'address2','value'=> set_value('address2',$contact->address2)]) ?>
            <?php else :?>
              <?= form_input(['name'=>'address2','class'=>'form-control','placeholder'=>'address2','value'=> set_value('address2')]) ?>
              <?php endif ?>
          </div>    
       </div>
       <?php echo form_error('address2'); ?>
    </div>
    
</div>
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">City</label>
          <div class="col-lg-7">
          <?php if(isset($contact)) :?>
            <?= form_input(['name'=>'city','class'=>'form-control','placeholder'=>'city','value'=>set_value('city',$contact->city) ]) ?>
            <?php else :?>
                 <?= form_input(['name'=>'city','class'=>'form-control','placeholder'=>'city','value'=>set_value('city') ]) ?>
                 <?php endif ?>
          </div>    
       </div>
    </div>
    <?php echo form_error('city'); ?>
</div>
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
       <label for="inputEmail" class="col-lg-3 control-label">State</label>
           <div class="col-lg-7">
           <?php if(isset($contact)) :?>
          <?= form_input(['name'=>'state','class'=>'form-control','placeholder'=>'state Name','value'=> set_value('state',$contact->state)]) ?>
          <?php else :?>
                 <?= form_input(['name'=>'state','class'=>'form-control','placeholder'=>'state','value'=>set_value('state') ]) ?>
                 <?php endif ?>
          </div>    
       </div>
    </div> 					
    <?php echo form_error('state'); ?>
</div>

<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Zip_code</label>
          <div class="col-lg-7">
          <?php if(isset($contact)) :?>
            <?= form_input(['name'=>'zip_code','class'=>'form-control','placeholder'=>'Zip_code','value'=> set_value('zip_code',$contact->zip_code) ]) ?>
          <?php else :?>
              <?= form_input(['name'=>'zip_code','class'=>'form-control','placeholder'=>'zip_code','value'=>set_value('zip_code') ]) ?>
              <?php endif ?>
        </div>    
       </div>
    </div>
    <?php echo form_error('zip_code'); ?>
</div>

<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Country</label>
          <div class="col-lg-7">
          <?php if(isset($contact)) :?>
            <?= form_input(['name'=>'country','class'=>'form-control','placeholder'=>'Country','value'=>set_value('country',$contact->country) ]) ?>
            <?php else :?>
              <?= form_input(['name'=>'country','class'=>'form-control','placeholder'=>'country','value'=>set_value('country') ]) ?>
              <?php endif ?>
          </div>    
       </div>
    </div>
    <?php echo form_error('country'); ?>
</div>
	
  <div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Mobile</label>
          <div class="col-lg-7">
          <?php if(isset($contact)) :?>
            <?= form_input(['name'=>'mobile','class'=>'form-control','placeholder'=>'Mobile','value'=>set_value('mobile',$contact->mobile) ]) ?>
            <?php else :?>
              <?= form_input(['name'=>'mobile','class'=>'form-control','placeholder'=>'mobile','value'=>set_value('mobile') ]) ?>
              <?php endif ?>
          </div>    
       </div>
    </div>
    <?php echo form_error('mobile'); ?>
</div>
<br>
<?php if(isset($contact)){
  

}else{ ?>
<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <?= form_reset(['class'=>'btn btn-default','value'=>'Cancel']) ?>
        <?= form_submit(['class'=>'btn btn-primary','value'=>'Submit']) ?>
      </div>
  </div>
<?php } ?>


</div>

 
</div>

<?php form_close() ?>
</div>



<?php include('footer.php')?>




