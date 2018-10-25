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
    <div class="custom_card hoverable f_<?php echo _ch($item['is_featured']); ?>">
      <div class="">
      <h3 class="card-title" style="display:none"><?php echo _ch($item['option_10']); ?>&nbsp;</h3>
      <img alt="300x200" data-src="holder.js/300x200" src="<?php echo _simg($item['thumbnail_url'], '300x200'); ?>"  alt=""/>
      <?php if(!empty($item['option_4'])):?>
      <div class="purpose-badget fea_<?php echo _ch($item['is_featured']); ?>" style="display: none;"><?php echo _ch($item['option_4']); ?></div>
      <?php endif; ?>
      <img class="featured" alt="Featured" src="" style="display:none;"/>
      <a href="<?php echo _ch($item['url']); ?>" class="ove"> </a>
      <div class="card-body">
        <p class="prop-details">

         <?php if(!empty($item['option_36'])):?>
        <span class="price"><?php _che($options_prefix_36); ?> <?php echo _ch($item['option_36']); ?><?php _che($options_suffix_36, ''); ?></span>
        <?php endif;?>
         <?php if(!empty($item['option_37'])):?>
          <span class="price"><?php _che($options_prefix_37); ?> <?php echo _ch($item['option_37']); ?><?php _che($options_suffix_37, ''); ?>&nbsp;</span>
          <?php endif;?>
        </p>
        <p class="bottom-border"><span class="f_<?php echo _ch($item['is_featured']); ?>"><?php echo _ch($item['address']); ?></span></p>
        <p class="prop-description "><i><?php echo _ch($item['option_chlimit_8']); ?></i></p>
        <div class="row">
        <p class="bottom-border col-sm-4"><?php echo _ch($options_name_2); ?> <br><span><?php echo _ch($item['option_2']); ?></span></p>
        <p class="bottom-border col-sm-4"><?php echo _ch($options_name_3); ?> <br><span><?php echo _ch($item['option_3']); ?></span></p>
        <p class="bottom-border col-sm-4"><?php echo _ch($options_name_19); ?> <br><span><?php echo _ch($item['option_19']); ?></span></p>
        <?php if(!empty($item['icons'])):?>
        <p class="prop-icons" style="display: none">
            <?php 
                foreach ($item['icons'] as $icon) {
                    echo $icon['icon'];
                }
            ?>
        </p>
      </div>
        <?php endif;?>
        
        <p class="prop-details">
          <a class="btn btn-info col-sm-12" href="<?php echo _ch($item['url']); ?>">
          {lang_Details}
          </a>
        </p>
      </div>
    </div>
    </div>
  </li>