<?php
$icon=true;
if(isset($icons) && $icons==false) {
    $icon=false;
}

/* view counter */
$counter=true;
if(isset($view_counter) && $view_counter==false) {
    $counter=false;
}

/* column */
$col_sm = '3';
if(isset($columns) && $columns == 3)
{
    $col_sm = '3';
}
?>


<li class="col-sm-4">
    <div class="p-0 custom_card hoverable f_<?php echo _ch($item['is_featured']); ?>">
      <h3 class="card-title" style="display:none"><?php echo _ch($item['option_10']); ?>&nbsp;</h3>
      <img alt="300x200" data-src="holder.js/300x200" src="<?php echo _simg($item['thumbnail_url'], '300x200'); ?>"  alt=""/>
      <?php if(!empty($item['option_4'])):?>
      <div class="purpose-badget fea_<?php echo _ch($item['is_featured']); ?>" style="display: none;"><?php echo _ch($item['option_4']); ?></div>
      <?php endif; ?>
      <img class="featured" alt="Featured" src="" style="display:none;"/>
      <a href="<?php echo _ch($item['url']); ?>" class="ove"> </a>
      <div class="card-body">
        <div class="prop-details row mb-2">
         <?php if(!empty($item['option_36'])):?>
            <div class="col-sm-6"><span style="text-transform:uppercase"><?php echo _ch($item['option_4']); ?></span></div>
              <div class="col-sm-6 text-right">
                <span class="price"><?php _che($options_prefix_36); ?> <?php echo _ch($item['option_36']); ?><?php _che($options_suffix_36, ''); ?></span>
              </div>
        
        <?php endif;?>
         <?php if(!empty($item['option_37'])):?>
          <span class="price"><?php _che($options_prefix_37); ?> <?php echo _ch($item['option_37']); ?><?php _che($options_suffix_37, ''); ?>&nbsp;</span>
          <?php endif;?>
        </div>
        <div class="prop-address hide"><span>{lang_Address}</span><?php echo _ch($item['address']); ?></span></div>
        <div class="prop-description mb-3"><?php echo _ch($item['option_chlimit_8']); ?></div>

        <?php if(!empty($item['icons'])):?>
          <p class="prop-icons" style="display: none">
              <?php 
                  foreach ($item['icons'] as $icon) {
                      echo $icon['icon'];



                  }
              ?>
          </p>
          <?php endif;?>


        <div class="row details mb-3">
            <div class="col-sm-4"><span><?php echo _ch($options_name_20); ?></span><span><?php echo _ch($item['option_20']); ?></span></div>
            <div class="col-sm-4"><span><?php echo _ch($options_name_19); ?> </span><span><?php echo _ch($item['option_19']); ?></span></div>

            <div class="col-sm-4"><span>m2</span><span><?php echo _ch($item['option_57']); ?></span></div>      
        </div>
        
        <div class="prop-details">
          <a class="btn btn-info col-sm-12" href="<?php echo _ch($item['url']); ?>">
          {lang_Details}
          </a>
        </div>
      </div>
    </div>
  </li>