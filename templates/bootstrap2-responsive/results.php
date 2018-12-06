<h2>{lang_Results}: <?php echo $total_rows; ?></h2>
<div class="options">
    <a class="view-type {view_grid_selected}" ref="grid" href="#"><img src="assets/img/glyphicons/glyphicons_156_show_thumbnails.png" /></a>
    <a class="view-type {view_list_selected}" ref="list" href="#"><img src="assets/img/glyphicons/glyphicons_157_show_thumbnails_with_lines.png" /></a>

    <select class="col-3 selectpicker-small pull-right" placeholder="{lang_Sort}">
        <option value="id ASC" {order_dateASC_selected}>{lang_DateASC}</option>
        <option value="id DESC" {order_dateDESC_selected}>{lang_DateDESC}</option>
        <option value="price ASC" {order_priceASC_selected}>{lang_PriceASC}</option>
        <option value="price DESC" {order_priceDESC_selected}>{lang_PriceDESC}</option>
    </select>
    <span class="pull-right" style="padding-top: 5px;">{lang_OrderBy}&nbsp;&nbsp;&nbsp;</span>
</div>
<br style="clear:both;" />

<div class="container">
    
    {has_no_results}
    <ul class="thumbnails">
    <li class="col-xs-12">
    <div class="alert alert-success">
    {lang_Noestates}
    </div>
    </li>
    </ul>
    {/has_no_results}
    {has_view_grid}
        <?php foreach($results as $key=>$item): ?>
        <?php
           if($key==0)echo '<ul class="thumbnails">';
        ?>
            <?php _generate_results_item(array('key'=>$key, 'item'=>$item)); ?>
        <?php
           if( ($key+1)%4==0 )
            {
                echo '</ul><ul class="thumbnails">';
            }
            if( ($key+1)==count($results) ) echo '</ul>';
            endforeach;
        ?>
    {/has_view_grid}
    {has_view_list}
    <ul class="pl-0">
    <?php foreach($results as $key=>$item): ?>
      <li class="row list-results hoverable">
        <div class="col-sm-4 pl-0 f_<?php echo _ch($item['is_featured']); ?>">
           <img alt="" data-src=""  class="img-fluid" src="<?php echo _simg($item['thumbnail_url']); ?>" />
            <?php if(!empty($item['option_4'])):?>
            <div style="display:none;" class="purpose-badget fea_<?php echo _ch($item['is_featured']); ?>"><?php echo _ch($item['option_4']); ?></div>
            <?php endif; ?>
            <?php if(!empty($item['option_54'])):?>
            <div style="display:none;" class="ownership-badget fea_<?php echo _ch($item['is_featured']); ?>"><?php echo _ch($item['option_54']); ?></div>
            <?php endif;?>
          <img class="featured-icon" alt="Featured" src="assets/img/featured-icon.png" style="display:none;"/>
        </div>
          <div class="caption col-sm-8">
            <div class="row mb-2">
               <div class="col-sm-8"> 
                <h3><?php echo _ch($item['option_10']); ?>&nbsp;</h3></div>
               <div class="col-sm-4"> <?php if(!empty($item['option_36'])):?>
                <span class="price"><?php echo _ch($options_prefix_36); ?> <?php echo _ch($item['option_36']); ?><?php echo _ch($options_suffix_36, ''); ?></span>
                <?php endif;?></div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-12 prop-description"><i><?php echo _ch($item['option_chlimit_8']); ?></i></div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-12"><?php echo _ch($item['address']); ?></div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-12"><span><?php echo _ch($item['option_2']); ?></span></div>
            </div>
            <div class="row detalles mb-2">
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6"><strong><?php echo _ch($options_name_3); ?></strong> <br><span><?php echo _ch($item['option_3']); ?></span>
                        </div>
                        <div class="col-sm-6">
                        <strong> <?php echo _ch($options_name_19); ?></strong> <span><?php echo _ch($item['option_19']); ?></span>
                        </div>
                    </div>
                </div>
                 <div class="col-sm-4">  
                    <a class="btn btn-info float-right col-sm-12" href="<?php echo _ch($item['url']); ?>">
                        {lang_Details}
                    </a>
                </div>
            </div>
          

            <?php if(!empty($item['icons'])):?>
            <p class="prop-icons" style="display:none">
                <?php 
                    foreach ($item['icons'] as $icon) {
                        echo $icon['icon'];
                    }
                ?>
            </p>
            <?php endif;?>
            <p class="prop-button-container">
           
            <?php if(!empty($item['option_37'])):?>
            <span class="price"><?php echo _ch($options_prefix_37); ?> <?php echo _ch($item['option_37']); ?><?php echo _ch($options_suffix_37, ''); ?></span>
            <?php endif;?>

            <?php if(!empty($counter)): ?>
            <span class="res_counter">{lang_ViewsCounter}: <?php echo _ch($item['counter_views']); ?></span>
            <?php endif;?>
            </p>
          </div>
      </li>
    <?php endforeach;?>
    {/has_view_list}
    </ul>
  </div>
  <div class="pagination properties">
  {pagination_links}
  </div>



