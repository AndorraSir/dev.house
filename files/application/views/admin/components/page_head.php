<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title><?php echo lang('app_name')?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!-- Stylesheets -->
  <link href="<?php echo base_url('assets/style/bootstrap.css')?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/style/font-awesome.css')?>">
  <link href="<?php echo base_url('assets/style/css/style.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/style/custom.css')?>" rel="stylesheet">
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="<?php echo base_url('admin/js/html5shim.js')?>"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url('admin/img/favicon/favicon.png')?>">
  
  

<?php if($is_rtl):?>
<link href="<?php echo base_url('assets/style/style_rtl.css')?>" rel="stylesheet">
<?php endif;?>
  
</head>