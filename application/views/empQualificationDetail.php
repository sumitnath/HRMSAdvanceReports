<?php include('header.php')?>

<div class="container">

<?= form_open("employee/addQualification/{$emp->user_id}") ?>
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
<legend>Qualification Details</legend>

<div class="row">
  <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Ssic</label>
          <div class="col-lg-7">
          <?php if(isset($qualification)) :?>
            <?= form_input(['name'=>'ssic','class'=>'form-control','placeholder'=>'Ssic','value'=> set_value('ssic',$qualification->ssic)]) ?>
          <?php else :?>
            <?= form_input(['name'=>'ssic','class'=>'form-control','placeholder'=>'ssic','value'=> set_value('ssic')]) ?>
      
            <?php endif ?>
          </div>    
       </div>
    </div>
    <?php echo form_error('ssic'); ?>
</div> 
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Puc</label>
        <div class="col-lg-7">
        <?php if(isset($qualification)) :?>
            <?= form_input(['name'=>'puc','class'=>'form-control','placeholder'=>'puc','value'=> set_value('puc',$qualification->puc)]) ?>
            <?php else :?>
              <?= form_input(['name'=>'puc','class'=>'form-control','placeholder'=>'puc','value'=> set_value('puc')]) ?>
              <?php endif ?>
          </div>    
       </div>
    </div>
    <?php echo form_error('puc'); ?>
</div>
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">Graduation</label>
          <div class="col-lg-7">
          <?php if(isset($qualification)) :?>
            <?= form_input(['name'=>'graduation','class'=>'form-control','placeholder'=>'graduation','value'=>set_value('graduation',$qualification->graduation) ]) ?>
            <?php else :?>
                 <?= form_input(['name'=>'graduation','class'=>'form-control','placeholder'=>'graduation','value'=>set_value('graduation') ]) ?>
                 <?php endif ?>
          </div>    
       </div>
    </div>
    <?php echo form_error('graduation'); ?>
</div>
<div class="row">
    <div class="col-lg-9">
       <div class="form-group">
       <label for="inputEmail" class="col-lg-3 control-label">Post Graduation</label>
           <div class="col-lg-7">
           <?php if(isset($qualification)) :?>
          <?= form_input(['name'=>'postgraduation','class'=>'form-control','placeholder'=>'postgraduation Name','value'=> set_value('postgraduation',$qualification->postgraduation)]) ?>
          <?php else :?>
                 <?= form_input(['name'=>'postgraduation','class'=>'form-control','placeholder'=>'postgraduation','value'=>set_value('postgraduation') ]) ?>
                 <?php endif ?>
          </div>    
       </div>
    </div> 					
    <?php echo form_error('postgraduation'); ?>
</div>




	

<br>
<?php if(isset($qualification)){
  

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




