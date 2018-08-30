<div class="wrap-map" id="wrap-map-1">
    {template_searchcenter}

    <div id="myCarousel" class="carousel slide search-senter">
    <ol class="carousel-indicators">
    {slideshow_images}
    <li data-target="#myCarousel" data-slide-to="{num}" class="{first_active}"></li>
    {/slideshow_images}
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
        <?php foreach ($slideshow_images as $key => $item):?>
            <div class="item <?php _che($item['first_active']);?>">
            <div class="cont">
                <img alt="" src="<?php _che($item['url']);?>" />
                <?php if(config_item('property_slider_enabled')===TRUE&&!empty($item['property_details'])):?>
                    <div class="slider-info">
                        <div class='container'>
                             <span style="display:none;" class="title c-white text-uppercase strong-700"><?php _che($item['property_details']['title']);?>ENCUENTRA TU INMUEBLE CON HOUSE</span>
                              <span class="title c-white text-uppercase">ENCUENTRA TU INMUEBLE CON HOUSE</span>
                             <span class="subtitle-sm"><?php _che($item['property_details']['option_chlimit_8']);?></span>
                         </div>
                    </div> 
                <?php elseif(!empty($item['title'])): ?>
                    <div class="slider-info">
                        <div class='container'>
                           <span style="display:none;" class="title c-white text-uppercase strong-700"><?php _che($item['property_details']['title']);?>ENCUENTRA TU INMUEBLE CON HOUSE</span>
                              <span class="title c-white text-uppercase">ENCUENTRA TU INMUEBLE CON HOUSE</span>
                            <span class="subtitle-sm"><?php _che($item['description']);?></span>
                             <?php if(!empty($item['link'])):?>
                          
                            <?php endif; ?>
                         </div>
                    </div>                     
                <?php endif; ?>
            </div>
            </div>
        <?php endforeach;?>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
    
</div>