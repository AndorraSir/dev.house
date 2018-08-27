<div class="head-wrapper">
    <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light col-12 pull-right">
                <a class="navbar-brand logo pull-left" href="{homepage_url_lang}"><img src="<?php echo $website_logo_url; ?>" alt="<?php _l('Logo'); ?>" /></a>
                <a class="navbar-brand logo-over pull-left" href="{homepage_url_lang}"><img src="assets/img/logo-over.png" alt="<?php _l('Logo'); ?>" /></a>    
                <div class="pull-left">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#main-top-menu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                
                    {print_menu}
                </div><!-- /.navbar -->
                 <?php if(config_db_item('dropdown_menu_enabled') === TRUE): ?>
                <div class="pull-right">
                  <div class="lang_menu_wrapper">
                     <div class="btn-group">
                         <?php
                              $lang_array = $this->language_m->get_array_by(array('is_frontend'=>1));
                              if(count($lang_array) > 1):
                          ?>
                          <a type="button" class=""><?php   
                            $flag_icon = '';
                            if(file_exists(FCPATH.'templates/'.$settings_template.'/assets/img/flags/'.$this->data['lang_code'].'.png'))
                            {
                                $flag_icon = '&nbsp; <img src="'.'assets/img/flags/'.$this->data['lang_code'].'.png" alt="" />';
                            }
                            echo $this->data['lang_code'].' '.$flag_icon;

                            ?></a>
                          <a type="button" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </a>
                          <?php
                            echo get_lang_menu($this->language_m->get_array_by(array('is_frontend'=>1)), $this->data['lang_code'], 'class="dropdown-menu lang_menu_top" role="menu"');
                          ?>
                          <?php endif;?>
                      </div>
                  </div>
                </div>
                <?php else: ?>
                <div class="simple-languages">
                    {print_lang_menu}
                </div>
                <?php endif; ?>
            </nav>  
          </div> 
        </div> 
    </div>  
</div>