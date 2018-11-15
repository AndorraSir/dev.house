<div class="head-wrapper">
    <div class="container">
        <div class="row">
            <nav class="navbar sticky-top navbar-expand-lg navbar-light col-sm-12">
                <a class="navbar-brand logo" href="{homepage_url_lang}"><img src="<?php echo $website_logo_url; ?>" alt="<?php _l('Logo'); ?>"  class="img-fluid"/></a>  
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu_buttons" aria-controls="menu_buttons" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                <div class="d-flex col-sm-10 pr-0">                   
                  <div class="collapse navbar-collapse justify-content-end" id="menu_buttons">
                    {print_menu}
                    <?php if(config_db_item('dropdown_menu_enabled') === TRUE): ?>
                  <div class="lang_menu_wrapper">
                     <div class="btn-group">
                         <?php
                              $lang_array = $this->language_m->get_array_by(array('is_frontend'=>1));
                              if(count($lang_array) > 1):
                          ?>
                          <a class=""><?php   
                            $flag_icon = '';
                            if(file_exists(FCPATH.'templates/'.$settings_template.'/assets/img/flags/'.$this->data['lang_code'].'.png'))
                            {
                                $flag_icon = '&nbsp; <img src="'.'assets/img/flags/'.$this->data['lang_code'].'.png" alt="" />';
                            }
                            echo $this->data['lang_code'].' '.$flag_icon;

                            ?></a>
                          <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
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
                  </div>
                 
                <div class="simple-languages">
                    {print_lang_menu}
                </div>
                <?php endif; ?>
            </nav>  
          </div> 
        </div> 
    </div>  
</div>