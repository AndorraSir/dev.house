    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">     

        <!-- Links -->
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">            
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <?php if($this->session->userdata('profile_image') != ''):?><img src="<?php echo base_url($this->session->userdata('profile_image'));?>" alt="" class="nav-user-pic img-responsive" /> <?php endif;?><?php echo $this->session->userdata('name_surname')?> <b class="caret"></b>              
            </a>
            
            <!-- Dropdown menu -->
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url('admin/user/edit/'.$this->session->userdata('id'))?>"><i class="icon-user"></i> <?php echo lang_check('Profile');?></a></li>
              <?php if(check_acl('settings')):?><li><a href="<?php echo site_url('admin/settings')?>"><i class="icon-cogs"></i> <?php echo lang_check('Settings');?></a></li><?php endif;?>
              <?php if(config_db_item('frontend_disabled') === FALSE): ?>
              <li><a target="_blank" href="<?php echo site_url(''); ?>"><i class="icon-globe"></i> <?php echo lang_check('Website link');?></a></li>
              <?php endif; ?>
              <li><a href="<?php echo site_url('admin/user/logout')?>"><i class="icon-off"></i> <?php echo lang_check('Logout');?></a></li>
            </ul>
          </li>
          
        </ul>

        <!-- Notifications -->
        <ul class="nav navbar-nav navbar-right">
            
            <?php if(check_acl('enquire') && config_db_item('frontend_disabled') === FALSE):?>
            <!-- Message button with number of latest messages count-->
            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="icon-envelope-alt"></i> <?php echo lang_check('Enquires');?> <span class="badge badge-important"><?php echo $this->enquire_m->total_unreaded();?></span> 
              </a>

                <ul class="dropdown-menu">
                  <li>
                    <!-- Heading - h5 -->
                    <h5><i class="icon-envelope-alt"></i> <?php echo lang_check('Enquires');?></h5>
                    <!-- Use hr tag to add border -->
                    <hr />
                  </li>
                    <?php foreach($enquire_3 as $enquire):?>
                  <li>
                    <!-- List item heading h6 -->
                    <a href="<?php echo site_url('admin/enquire/edit/'.$enquire->id)?>"><?php echo $enquire->name_surname?></a>
                    <!-- List item para -->
                    <p><?php echo word_limiter(strip_tags($enquire->message), 9);?></p>
                    <hr />
                  </li>
                    <?php endforeach;?>    
                  <li>
                    <div class="drop-foot">
                      <a href="<?php echo site_url('admin/enquire')?>"><?php echo lang_check('View All');?></a>
                    </div>
                  </li>                                    
                </ul>
            </li>
            <?php endif;?>
            
            <?php if(check_acl('user')):?>
            <!-- Members button with number of latest members count -->
            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="icon-user"></i> <?php echo lang_check('Users');?> <span   class="badge badge-warning"><?php echo $this->user_m->total_unactivated();?></span> 
              </a>

                <ul class="dropdown-menu">
                  <li>
                    <!-- Heading - h5 -->
                    <h5><i class="icon-user"></i> <?php echo lang_check('Users');?></h5>
                    <!-- Use hr tag to add border -->
                    <hr />
                  </li>
                    <?php foreach($users_3 as $user):?>
                  <li>
                    <!-- List item heading h6-->
                    <a href="<?php echo site_url('admin/user/edit/'.$user->id)?>"><?php echo $user->name_surname?></a> 
                    <span class="label label-<?php echo isset($this->user_m->user_type_color[$user->type])?$this->user_m->user_type_color[$user->type]:'';?> pull-right"><?php echo isset($this->user_m->user_types[$user->type])?$this->user_m->user_types[$user->type]:'';?></span>
                    <div class="clearfix"></div>
                    <hr />
                  </li>
                    <?php endforeach;?>               
                  <li>
                    <div class="drop-foot">
                      <a href="<?php echo site_url('admin/user')?>"><?php echo lang_check('View All');?></a>
                    </div>
                  </li>                                    
                </ul>
            </li>
            <?php endif;?>

        </ul>
		</nav>