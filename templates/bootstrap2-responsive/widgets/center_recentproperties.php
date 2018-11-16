<div class="results-properties-list with-sidebar">
    <h2 class="text-center mb-5"> <span class="main-title">Destacados</span></h2>
    <h2 class="text-center main-title mb-5" style="display:none;">{lang_Realestates}: <?php echo $total_rows; ?> Destacados</h2>
    <div class="options" style="display: none;">
    <!--     <a class="view-type active hidden-phone" ref="grid" href="#"><img src="assets/img/glyphicons/glyphicons_156_show_thumbnails.png" /></a>
        <a class="view-type hidden-phone" ref="list" href="#"><img src="assets/img/glyphicons/glyphicons_157_show_thumbnails_with_lines.png" /></a> -->

        <select class="col-3 selectpicker-small pull-left hide" placeholder="{lang_OrderBy}" style="display:none !important;">
            <option value="id ASC" {order_dateASC_selected}>{lang_DateASC}</option>
            <option value="id DESC" {order_dateDESC_selected}>{lang_DateDESC}</option>
            <option value="price ASC" {order_priceASC_selected}>{lang_PriceASC}</option>
            <option value="price DESC" {order_priceDESC_selected}>{lang_PriceDESC}</option>
        </select>
        <span class="pull-left hide" style="padding-top: 5px;">{lang_OrderBy}&nbsp;&nbsp;&nbsp;</span>
    </div>
<br style="clear:both;">
    <div class="row">
        {has_no_results}
        <ul class="thumbnails">
        <li class="col-12">
        <div class="alert alert-success">
        {lang_Noestates}
        </div>
        </li>
        </ul>
        {/has_no_results}

        <?php foreach($results as $key=>$item): ?>
        <?php
           if($key==0)echo '<ul class="cards row">';
        ?>
            <?php _generate_results_item(array('key'=>$key, 'item'=>$item)); ?>
        <?php
           if( ($key+1)%3==0 )
            {
                echo '</ul><ul class="cards row">';
            }
            if( ($key+1)==count($results) ) echo '</ul>';
            endforeach;
        ?>
        
      </div>
      <div class="pagination properties">
      {pagination_links}
      </div>

      
</div>