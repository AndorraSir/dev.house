<?php $this->load->view('admin/components/page_head_main')?>
<body>
<div class="container-fluid">

<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="containerk">
      <!-- Menu button for smallar screens -->
  		<div class="navbar-header">
  		  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
  			<span class="sr-only">Toggle navigation</span>
  			<span class="icon-bar"></span>
  			<span class="icon-bar"></span>
  			<span class="icon-bar"></span>
  		  </button>
  		  <a href="<?php echo site_url('admin/dashboard')?>" class="navbar-brand"><img width="150px" src="<?php echo base_url('admin-assets/img/logos/house-logo.png');?>" />&nbsp;</a>
  		</div>
        <!-- Site name for smallar screens -->

        <!-- Navigation starts HEllo -->
        <?php $this->load->view('admin/components/admin_navigation')?>

      </div>

</div>
  
<div class="row">

  <!-- Main content starts HAA-->
  <div class="content col-3">

    <?php $this->load->view('admin/components/sidebar_admin')?>

  </div>
    <!-- Main bar -->
  <div class="mainbar col-8">
      <?php $this->load->view($subview)?>
  </div>

  <!-- Content ends -->
  <?php $this->load->view('admin/components/page_tail_main')?>

</div>
</div>
