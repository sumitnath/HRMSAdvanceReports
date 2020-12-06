<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/date/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/date/css/style.css">
    <!-- js  -->

      <script src="<?= base_url()?>/assets/js/jquery.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script>
      <script src="<?= base_url()?>assets/date/js/jquery-1.12.4.js" ></script>
      <script src="<?= base_url()?>assets/date/js/jquery-ui.js" ></script>
      <script src="<?= base_url()?>/assets/js/bootstrap.min.js"></script>

        <script>
        $( function() {
        $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true
        });
        } );
        </script>

  </head>
  <body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Employee Management System</a>
     
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">

      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>

        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <?php if($this->session->userdata('id')) : ?>
            <li><a href="#">Change Password</a></li>
            <li class="divider"></li>
            <li><a href="#"> <?php echo $this->session->userdata('username') ?></a></li> 
    
            <li><a href="<?= base_url('login/logout')?>">Logout</a></li>
            <?php endif ?>
          </ul>
        </li>

      </ul>
      <?php if($this->session->userdata('id')) : ?>
      <ul class="nav navbar-nav ">
      <li class="divider"></li>      
      <li><a href="#">Welcome  <?php echo strtoupper($this->session->userdata('name')) ?></a></li> 
      </ul>
     <?php  endif ?>
    </div>
  </div>
</nav>
<?php if($this->session->userdata('id')) : ?>
<?php  $host = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>
<ol class="breadcrumb">
<?php if(($host == 'http://'.$_SERVER['SERVER_NAME'].'/codeigniter/HRMSAdvanceReports/dashboard' ) || ($host =='http://'.$_SERVER['SERVER_NAME'].'codeigniter/HRMSAdvanceReports/index.php/dashboard') ) :?>


 <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Home</a></li>
 <?php else:?>
  <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] ?>">Employee</a></li>

  <?php endif ?>
<?php endif ?>

</ol>


